<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResearchController extends Controller
{
    public function index()
    {
        $researchs = DB::table('research_activities')
            ->select('id', 'title', 'type_id', 'rank_id', 'role', 'publisher', 'year', 'doi', 'link', 'status')
            ->where('user_id', \Illuminate\Support\Facades\Auth::id())
            ->whereNull('deleted_at')
            ->orderByDesc('created_at')
            ->get();

        $members = DB::table('research_activity_members')
            ->join('users', 'users.id', '=', 'research_activity_members.user_id')
            ->select('research_activity_members.research_activity_id', 'users.name', 'research_activity_members.role')
            ->get()
            ->groupBy('research_activity_id');

        return view('pages.lecturer.research.index', [
            'title' => 'Research',
            'researchs' => $researchs,
            'members' => $members,
        ]);
    }

    public function create()
    {
        $lecturers = DB::table('users')
            ->where('role', 'dosen')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        // Mock object for the component
        $research = (object) [
            'id' => null,
            'title' => '',
            'type_id' => '',
            'rank_id' => '',
            'role' => '',
            'publisher' => '',
            'year' => '',
            'doi' => '',
            'link' => '',
            'status' => ''
        ];

        return view('pages.lecturer.research.create', [
            'title' => 'Create Research',
            'lecturers' => $lecturers,
            'research' => $research,
            'members' => []
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type_id' => 'required|integer',
            'rank_id' => 'required|integer',
            'role' => 'required|string|max:100',
            'publisher' => 'nullable|string|max:255',
            'year' => 'required|integer|min:1900|max:2100',
            'doi' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
        ]);

        DB::beginTransaction();

        try {
            $periodId = DB::table('periods')->where('is_active', true)->value('id');

            $id = DB::table('research_activities')->insertGetId([
                ...$validated,
                'user_id' => \Illuminate\Support\Facades\Auth::id(),
                'period_id' => $periodId,
                'link' => $validated['link'] ?? null,
                'status' => 'DRAFT',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($request->has('members')) {
                foreach ($request->members as $member) {
                    // Determine if Internal (by user_id) or External (by name)
                    $userId = !empty($member['user_id']) ? $member['user_id'] : null;
                    $name = !empty($member['name']) ? $member['name'] : null;

                    if ($userId || $name) {
                        DB::table('research_activity_members')->insert([
                            'research_activity_id' => $id,
                            'user_id' => $userId,
                            'name' => $name,
                            'role' => $member['role'] ?? 'Member',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('lecturer.research.index')->with('success', 'Data penelitian berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambahkan data penelitian: ' . $e->getMessage());
        }
    }

    public function edit(int $id)
    {
        $research = $this->findOrFail($id);

        if (!in_array(strtoupper($research->status), ['DRAFT', 'REJECTED'])) {
            return redirect()->route('lecturer.research.index')->with('error', 'Data tidak dapat diedit.');
        }

        $lecturers = DB::table('users')
            ->where('role', 'dosen')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        $members = DB::table('research_activity_members')
            ->where('research_activity_id', $id)
            ->get();

        return view('pages.lecturer.research.edit', [
            'title' => 'Edit Penelitian',
            'research' => $research,
            'lecturers' => $lecturers,
            'members' => $members,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $this->findOrFail($id);

        // Simple Validation
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'role' => 'required|string|max:100',
            'year' => 'required|integer|min:1900|max:2100',
            // Add other fields as needed based on your table
        ]);

        DB::table('research_activities')->where('id', $id)->update([
            ...$validated,
            'updated_at' => now(),
        ]);

        return redirect()->route('lecturer.research.show', $id)->with('success', 'Data penelitian berhasil diperbarui.');
    }

    public function show(int $id)
    {
        $research = $this->findOrFail($id);

        $members = DB::table('research_activity_members')
            ->join('users', 'users.id', '=', 'research_activity_members.user_id')
            ->select('users.name', 'research_activity_members.role')
            ->where('research_activity_members.research_activity_id', $id)
            ->get();

        $evidences = DB::table('activity_evidence')
            ->where('category', 'RESEARCH')
            ->where('activity_id', $id)
            ->whereNull('deleted_at')
            ->get();

        return view('pages.lecturer.research.show', [
            'title' => 'Detail Penelitian',
            'research' => $research,
            'members' => $members,
            'evidences' => $evidences,
        ]);
    }

    public function uploadEvidence(Request $request, int $id)
    {
        $research = $this->findOrFail($id);

        if (!in_array(strtoupper($research->status), ['DRAFT', 'REJECTED'])) {
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
            'category' => 'RESEARCH',
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
        $research = $this->findOrFail($id);

        if (!in_array(strtoupper($research->status), ['DRAFT', 'REJECTED'])) {
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
        $research = $this->findOrFail($id);

        $evidenceCount = DB::table('activity_evidence')
            ->where('category', 'RESEARCH')
            ->where('activity_id', $id)
            ->whereNull('deleted_at')
            ->count();

        if ($evidenceCount === 0) {
            return back()->with('error', 'Harap unggah minimal satu bukti kegiatan sebelum mengirim.');
        }

        DB::transaction(function () use ($id) {
            DB::table('research_activities')->where('id', $id)->update([
                'status' => 'SUBMITTED',
                'updated_at' => now(),
            ]);

            DB::table('activity_logs')->insert([
                'user_id' => \Illuminate\Support\Facades\Auth::id(),
                'action' => 'SUBMIT_RESEARCH',
                'entity_type' => 'Research',
                'entity_id' => $id,
                'description' => 'Mengirim kegiatan penelitian untuk verifikasi.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        return redirect()->route('lecturer.research.index')->with('success', 'Kegiatan berhasil dikirim untuk verifikasi.');
    }



    private function findOrFail(int $id): object
    {
        $row = DB::table('research_activities')
            ->where('id', $id)
            ->where('user_id', \Illuminate\Support\Facades\Auth::id())
            ->whereNull('deleted_at')
            ->first();

        abort_if(!$row, 404);
        return $row;
    }
}
