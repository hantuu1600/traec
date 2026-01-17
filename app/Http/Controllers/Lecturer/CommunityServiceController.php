<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CommunityServiceController extends Controller
{
    const EVIDENCE_TABLE = 'activity_evidence';
    const ACTIVITY_TABLE = 'community_service_activities';
    const MEMBER_TABLE = 'community_service_members';
    const CATEGORY = 'COMMUNITY_SERVICE';

    public function index(Request $request)
    {
        $userId = Auth::id();
        $query = DB::table(self::ACTIVITY_TABLE)
            ->where('user_id', $userId)
            ->whereNull('deleted_at')
            ->orderByDesc('created_at');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }

        if ($request->has('status') && $request->status !== 'ALL') {
            $query->where('status', $request->status);
        }

        $activities = $query->paginate(10);

        return view('pages.lecturer.community-service.index', [
            'title' => 'Pengabdian Masyarakat',
            'activities' => $activities
        ]);
    }

    public function create()
    {
        $lecturers = DB::table('users')
            ->where('role', 'dosen')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        $activity = (object) [
            'id' => null,
            'title' => '',
            'scheme' => '',
            'location' => '',
            'start_date' => '',
            'end_date' => '',
            'role' => '',
            'status' => ''
        ];

        return view('pages.lecturer.community-service.create', [
            'title' => 'Tambah Pengabdian',
            'lecturers' => $lecturers,
            'activity' => $activity,
            'members' => []
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'scheme' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'role' => 'nullable|string|max:100',
            'members' => 'nullable|array',
            'members.*.user_id' => 'nullable|exists:users,id',
            'members.*.name' => 'nullable|string|max:255',
            'members.*.role' => 'nullable|string|max:100',
        ]);

        $period = DB::table('periods')->where('is_active', true)->first();
        $periodId = $period ? $period->id : null;

        DB::beginTransaction();
        try {
            $id = DB::table(self::ACTIVITY_TABLE)->insertGetId([
                'user_id' => Auth::id(),
                'period_id' => $periodId,
                'title' => $request->title,
                'scheme' => $request->scheme,
                'location' => $request->location,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'role' => $request->role,
                'status' => 'DRAFT',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($request->has('members')) {
                $addedMembers = []; // Track added user_ids to prevent duplicates

                foreach ($request->members as $member) {
                    $userId = $member['user_id'] ?? null;
                    $name = $member['name'] ?? null;

                    if ($userId || $name) {
                        // Check for duplicate internal members
                        if ($userId && in_array($userId, $addedMembers)) {
                            continue; // Skip duplicate
                        }

                        DB::table(self::MEMBER_TABLE)->insert([
                            'community_service_activity_id' => $id,
                            'user_id' => $userId,
                            'name' => $name,
                            'role' => $member['role'] ?? 'Member',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);

                        if ($userId) {
                            $addedMembers[] = $userId;
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->route('lecturer.community-service.index')->with('success', 'Data pengabdian berhasil ditambahkan.');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            \Log::error('Community service creation failed', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            if (str_contains($e->getMessage(), 'Duplicate entry')) {
                return back()->with('error', 'Data pengabdian sudah ada atau anggota duplikat terdeteksi.')->withInput();
            }

            return back()->with('error', 'Gagal menyimpan data. Silakan periksa kembali inputan Anda.')->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Unexpected error in community service creation', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);
            return back()->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi atau hubungi administrator.')->withInput();
        }
    }

    public function show(int $id)
    {
        $activity = $this->findOrFail($id);

        $members = DB::table(self::MEMBER_TABLE)
            ->where('community_service_activity_id', $id)
            ->get();

        foreach ($members as $member) {
            if ($member->user_id) {
                $user = DB::table('users')->where('id', $member->user_id)->first();
                $member->name_display = $user ? $user->name : 'Unknown User';
                $member->type_display = 'Internal';
            } else {
                $member->name_display = $member->name;
                $member->type_display = 'Eksternal';
            }
        }

        $evidences = DB::table(self::EVIDENCE_TABLE)
            ->where('category', self::CATEGORY)
            ->where('activity_id', $id)
            ->whereNull('deleted_at')
            ->get();

        return view('pages.lecturer.community-service.show', [
            'title' => 'Detail Pengabdian',
            'activity' => $activity,
            'members' => $members,
            'evidences' => $evidences
        ]);
    }

    public function edit(int $id)
    {
        $activity = $this->findOrFail($id);

        if (!in_array(strtoupper($activity->status), ['DRAFT', 'REJECTED'])) {
            return redirect()->route('lecturer.community-service.index')->with('error', 'Data tidak dapat diedit.');
        }

        $lecturers = DB::table('users')
            ->where('role', 'dosen')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        $members = DB::table(self::MEMBER_TABLE)
            ->where('community_service_activity_id', $id)
            ->get();

        return view('pages.lecturer.community-service.edit', [
            'title' => 'Edit Pengabdian',
            'activity' => $activity,
            'lecturers' => $lecturers,
            'members' => $members
        ]);
    }

    public function update(Request $request, int $id)
    {
        $activity = $this->findOrFail($id);

        if (!in_array(strtoupper($activity->status), ['DRAFT', 'REJECTED'])) {
            return back()->with('error', 'Data tidak dapat diedit karena status sudah ' . $activity->status);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'scheme' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'role' => 'nullable|string|max:100',
            'members' => 'nullable|array',
        ]);

        DB::beginTransaction();
        try {
            DB::table(self::ACTIVITY_TABLE)->where('id', $id)->update([
                'title' => $request->title,
                'scheme' => $request->scheme,
                'location' => $request->location,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'role' => $request->role,
                'updated_at' => now(),
            ]);

            DB::table(self::MEMBER_TABLE)->where('community_service_activity_id', $id)->delete();

            if ($request->has('members')) {
                foreach ($request->members as $member) {
                    $userId = $member['user_id'] ?? null;
                    $name = $member['name'] ?? null;

                    if ($userId || $name) {
                        DB::table(self::MEMBER_TABLE)->insert([
                            'community_service_activity_id' => $id,
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
            return redirect()->route('lecturer.community-service.index')->with('success', 'Perubahan berhasil disimpan.');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            \Log::error('Community service update failed', [
                'user_id' => Auth::id(),
                'activity_id' => $id,
                'error' => $e->getMessage()
            ]);
            return back()->with('error', 'Gagal menyimpan perubahan. Silakan periksa kembali inputan Anda.')->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Unexpected error in community service update', [
                'user_id' => Auth::id(),
                'activity_id' => $id,
                'error' => $e->getMessage()
            ]);
            return back()->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi atau hubungi administrator.')->withInput();
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
        $path = $file->storeAs('evidence/community', $fileName, 'public');

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
            return back()->with('error', 'Kegiatan tidak dapat diajukan (Status: ' . $activity->status . ').');
        }

        // check availability of evidence
        $evidenceCount = DB::table(self::EVIDENCE_TABLE)
            ->where('category', self::CATEGORY)
            ->where('activity_id', $id)
            ->whereNull('deleted_at')
            ->count();

        if ($evidenceCount == 0) {
            return back()->with('error', 'Wajib mengunggah minimal 1 bukti sebelum mengajukan.');
        }

        DB::table(self::ACTIVITY_TABLE)->where('id', $id)->update([
            'status' => 'SUBMITTED',
            'updated_at' => now(),
        ]);

        // Optional: Log submission later

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
            abort(404, 'Data pengabdian tidak ditemukan.');
        }
        return $activity;
    }
}
