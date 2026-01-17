<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SupportController extends Controller
{
    const EVIDENCE_TABLE = 'activity_evidence';
    const ACTIVITY_TABLE = 'support_activities';
    const CATEGORY = 'SUPPORT';

    public function index(Request $request)
    {
        $userId = Auth::id();
        $query = DB::table(self::ACTIVITY_TABLE)
            ->where('user_id', $userId)
            ->whereNull('deleted_at')
            ->orderByDesc('created_at');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('type', 'like', "%{$search}%")
                ->orWhere('role', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        if ($request->has('status') && $request->status !== 'ALL') {
            $query->where('status', $request->status);
        }

        $activities = $query->paginate(10);

        return view('pages.lecturer.support.index', [
            'title' => 'Penunjang Lainnya',
            'activities' => $activities
        ]);
    }

    public function create()
    {
        $activity = (object) [
            'id' => null,
            'type' => '', // e.g. 'Panitia', 'Organisasi'
            'role' => '',
            'activity_date' => '',
            'description' => '',
            'status' => ''
        ];

        return view('pages.lecturer.support.create', [
            'title' => 'Tambah Kegiatan Penunjang',
            'activity' => $activity
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'activity_date' => 'required|date',
            'description' => 'required|string',
        ]);

        $period = DB::table('periods')->where('is_active', true)->first();
        $periodId = $period ? $period->id : null;

        try {
            DB::table(self::ACTIVITY_TABLE)->insert([
                'user_id' => Auth::id(),
                'period_id' => $periodId,
                'type' => $request->type,
                'role' => $request->role,
                'activity_date' => $request->activity_date,
                'description' => $request->description,
                'status' => 'DRAFT',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('lecturer.support.index')->with('success', 'Kegiatan penunjang berhasil ditambahkan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    public function show(int $id)
    {
        $activity = $this->findOrFail($id);

        $evidences = DB::table(self::EVIDENCE_TABLE)
            ->where('category', self::CATEGORY)
            ->where('activity_id', $id)
            ->whereNull('deleted_at')
            ->get();

        return view('pages.lecturer.support.show', [
            'title' => 'Detail Penunjang',
            'activity' => $activity,
            'evidences' => $evidences
        ]);
    }

    public function edit(int $id)
    {
        $activity = $this->findOrFail($id);

        if (!in_array(strtoupper($activity->status), ['DRAFT', 'REJECTED'])) {
            return redirect()->route('lecturer.support.index')->with('error', 'Data tidak dapat diedit.');
        }

        return view('pages.lecturer.support.edit', [
            'title' => 'Edit Penunjang',
            'activity' => $activity
        ]);
    }

    public function update(Request $request, int $id)
    {
        $activity = $this->findOrFail($id);

        if (!in_array(strtoupper($activity->status), ['DRAFT', 'REJECTED'])) {
            return back()->with('error', 'Data tidak dapat diedit.');
        }

        $request->validate([
            'type' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'activity_date' => 'required|date',
            'description' => 'required|string',
        ]);

        try {
            DB::table(self::ACTIVITY_TABLE)->where('id', $id)->update([
                'type' => $request->type,
                'role' => $request->role,
                'activity_date' => $request->activity_date,
                'description' => $request->description,
                'updated_at' => now(),
            ]);

            return redirect()->route('lecturer.support.index')->with('success', 'Perubahan berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyimpan perubahan: ' . $e->getMessage());
        }
    }

    public function uploadEvidence(Request $request, int $id)
    {
        $activity = $this->findOrFail($id);

        if (!in_array(strtoupper($activity->status), ['DRAFT', 'REJECTED'])) {
            return back()->with('error', 'Tidak dapat mengunggah bukti pada status ini.');
        }

        $request->validate([
            'evidence_file' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
            'description' => 'nullable|string|max:255',
        ]);

        $file = $request->file('evidence_file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('evidence/support', $fileName, 'public');

        DB::table(self::EVIDENCE_TABLE)->insert([
            'category' => self::CATEGORY,
            'activity_id' => $id,
            'file_name' => $fileName,
            'file_path' => $path,
            'description' => $request->description,
            'uploaded_by' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Bukti berhasil diunggah.');
    }

    public function deleteEvidence(int $id, int $evidenceId)
    {
        $activity = $this->findOrFail($id);

        if (!in_array(strtoupper($activity->status), ['DRAFT', 'REJECTED'])) {
            return back()->with('error', 'Tidak dapat menghapus bukti pada status ini.');
        }

        $evidence = DB::table(self::EVIDENCE_TABLE)
            ->where('id', $evidenceId)
            ->where('category', self::CATEGORY)
            ->where('activity_id', $id)
            ->first();

        if ($evidence) {
            Storage::disk('public')->delete($evidence->file_path);
            DB::table(self::EVIDENCE_TABLE)->where('id', $evidenceId)->delete();
            return back()->with('success', 'Bukti berhasil dihapus.');
        }

        return back()->with('error', 'Bukti tidak ditemukan.');
    }

    public function submit(int $id)
    {
        $activity = $this->findOrFail($id);

        if (!in_array(strtoupper($activity->status), ['DRAFT', 'REJECTED'])) {
            return back()->with('error', 'Cannot submit in current status.');
        }

        $evidenceCount = DB::table(self::EVIDENCE_TABLE)
            ->where('category', self::CATEGORY)
            ->where('activity_id', $id)
            ->whereNull('deleted_at')
            ->count();

        if ($evidenceCount == 0) {
            return back()->with('error', 'Wajib mengunggah minimal 1 bukti.');
        }

        DB::table(self::ACTIVITY_TABLE)->where('id', $id)->update([
            'status' => 'SUBMITTED',
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Kegiatan berhasil diajukan untuk verifikasi.');
    }

    private function findOrFail($id)
    {
        $activity = DB::table(self::ACTIVITY_TABLE)
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->whereNull('deleted_at')
            ->first();

        if (!$activity) {
            abort(404, 'Data tidak ditemukan.');
        }
        return $activity;
    }
}
