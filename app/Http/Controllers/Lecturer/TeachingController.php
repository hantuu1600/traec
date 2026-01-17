<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeachingController extends Controller
{
    private const TABLE = 'teaching_activities';

    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $semester = trim((string) $request->query('semester', ''));
        $status = trim((string) $request->query('status', ''));

        $query = DB::table(self::TABLE)
            ->select([
                'id',
                'course_name',
                'study_program',
                'semester',
                'credits',
                'meetings_total',
                'start_date',
                'end_date',
                'year',
                'status',
                'created_at',
            ])
            ->where('user_id', \Illuminate\Support\Facades\Auth::id())
            ->whereNull('deleted_at');

        if ($q !== '') {
            $query->where(function ($w) use ($q) {
                $w->where('course_name', 'like', "%{$q}%")
                    ->orWhere('study_program', 'like', "%{$q}%")
                    ->orWhere('semester', 'like', "%{$q}%")
                    ->orWhere('year', 'like', "%{$q}%");
            });
        }

        if ($semester !== '')
            $query->where('semester', $semester);
        if ($status !== '')
            $query->where('status', $status);

        $teachings = $query->orderByDesc('created_at')->paginate(10)->withQueryString();

        return view('pages.lecturer.teaching.index', [
            'title' => 'Teaching Activity',
            'teachings' => $teachings,
            'filters' => compact('q', 'semester', 'status'),
        ]);
    }

    public function create()
    {
        return view('pages.lecturer.teaching.create', ['title' => 'Add Teaching Activity']);
    }

    public function store(Request $request)
    {
        $validated = $this->validatePayload($request);

        $periodId = DB::table('periods')->where('is_active', true)->value('id');

        DB::table(self::TABLE)->insert([
            ...$validated,
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'period_id' => $periodId,
            'status' => 'Draft',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('lecturer.teaching.index')->with('success', 'Teaching activity created.');
    }

    public function show(int $id)
    {
        $teaching = $this->findOrFail($id);

        $evidences = DB::table('activity_evidence')
            ->where('category', 'TEACHING')
            ->where('activity_id', $id)
            ->whereNull('deleted_at')
            ->get();

        return view('pages.lecturer.teaching.show', [
            'title' => 'Detail Pengajaran',
            'teaching' => $teaching,
            'evidences' => $evidences,
        ]);
    }

    public function uploadEvidence(Request $request, int $id)
    {
        $teaching = $this->findOrFail($id);

        if (!in_array(strtoupper($teaching->status), ['DRAFT', 'REJECTED'])) {
            return back()->with('error', 'Tidak dapat mengunggah bukti pada status ini.');
        }

        $request->validate([
            'evidence_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'description' => 'nullable|string|max:255',
        ]);

        $file = $request->file('evidence_file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('evidences', $filename, 'public');

        DB::table('activity_evidence')->insert([
            'category' => 'TEACHING',
            'activity_id' => $id,
            'file_path' => $path,
            'file_name' => $filename,
            'description' => $request->input('description'),
            'uploaded_by' => \Illuminate\Support\Facades\Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Bukti kegiatan berhasil diunggah.');
    }

    public function deleteEvidence(int $id, int $evidenceId)
    {
        $teaching = $this->findOrFail($id);

        if (!in_array(strtoupper($teaching->status), ['DRAFT', 'REJECTED'])) {
            return back()->with('error', 'Tidak dapat menghapus bukti pada status ini.');
        }

        $evidence = DB::table('activity_evidence')->where('id', $evidenceId)->first();
        if ($evidence) {
            DB::table('activity_evidence')->where('id', $evidenceId)->update(['deleted_at' => now()]);
        }

        return back()->with('success', 'Bukti kegiatan berhasil dihapus.');
    }

    public function submit(int $id)
    {
        $teaching = $this->findOrFail($id);

        $evidenceCount = DB::table('activity_evidence')
            ->where('category', 'TEACHING')
            ->where('activity_id', $id)
            ->whereNull('deleted_at')
            ->count();

        if ($evidenceCount === 0) {
            return back()->with('error', 'Harap unggah minimal satu bukti kegiatan sebelum mengirim.');
        }

        DB::transaction(function () use ($id) {
            DB::table(self::TABLE)->where('id', $id)->update([
                'status' => 'SUBMITTED',
                'updated_at' => now(),
            ]);

            DB::table('activity_logs')->insert([
                'user_id' => \Illuminate\Support\Facades\Auth::id(),
                'action' => 'SUBMIT_TEACHING',
                'entity_type' => 'Teaching',
                'entity_id' => $id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        return redirect()->route('lecturer.teaching.index')->with('success', 'Kegiatan berhasil dikirim untuk verifikasi.');
    }

    public function edit(int $id)
    {
        $teaching = $this->findOrFail($id);

        return view('pages.lecturer.teaching.edit', [
            'title' => 'Edit Pengajaran',
            'teaching' => $teaching,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $this->findOrFail($id);

        $validated = $this->validatePayload($request);

        DB::table(self::TABLE)->where('id', $id)->update([
            ...$validated,
            'updated_at' => now(),
        ]);

        return redirect()->route('lecturer.teaching.show', $id)->with('success', 'Data pengajaran berhasil diperbarui.');
    }



    private function findOrFail(int $id): object
    {
        $row = DB::table(self::TABLE)
            ->where('id', $id)
            ->where('user_id', \Illuminate\Support\Facades\Auth::id())
            ->whereNull('deleted_at')
            ->first();

        abort_if(!$row, 404);
        return $row;
    }

    private function validatePayload(Request $request): array
    {
        return $request->validate([
            'course_name' => 'required|string|max:150',
            'study_program' => 'required|string|max:150',
            'semester' => 'required|string|max:50',
            'credits' => 'required|integer|min:1',
            'meetings_total' => 'required|integer|min:1',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'year' => 'required|integer|min:1900|max:2100',
        ]);
    }
}
