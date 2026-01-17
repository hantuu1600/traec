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
            $query->where('organization', 'like', "%{$search}%")
                ->orWhere('role', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        if ($request->has('status') && $request->status !== 'ALL') {
            $query->where('status', $request->status);
        }

        $activities = $query->paginate(10);

        return view('pages.lecturer.support.index', [
            'title' => 'Other Support Activities',
            'activities' => $activities
        ]);
    }

    public function create()
    {
        $activity = (object) [
            'id' => null,
            'type_id' => null,
            'organization' => '',
            'role' => '',
            'activity_date' => '',
            'description' => '',
            'status' => ''
        ];

        return view('pages.lecturer.support.create', [
            'title' => 'Add Support Activities',
            'activity' => $activity
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_id' => 'nullable|exists:ref_activity_types,id',
            'organization' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:100',
            'activity_date' => 'nullable|date',
            'description' => 'nullable|string|max:255',
        ]);

        $period = DB::table('periods')->where('is_active', true)->first();
        $periodId = $period ? $period->id : null;

        try {
            DB::table(self::ACTIVITY_TABLE)->insert([
                'user_id' => Auth::id(),
                'period_id' => $periodId,
                'type_id' => $request->type_id,
                'organization' => $request->organization,
                'role' => $request->role,
                'activity_date' => $request->activity_date,
                'description' => $request->description,
                'status' => 'DRAFT',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('lecturer.support.index')->with('success', 'Support activity has been successfully added.');
        } catch (\Illuminate\Database\QueryException $e) {
            \Log::error('Support activity creation failed', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);
            return back()->with('error', 'Gagal menyimpan data. Silakan periksa kembali inputan Anda.')->withInput();
        } catch (\Exception $e) {
            \Log::error('Unexpected error in support activity creation', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);
            return back()->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi atau hubungi administrator.')->withInput();
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
            'title' => 'Support Activity Details',
            'activity' => $activity,
            'evidences' => $evidences
        ]);
    }

    public function edit(int $id)
    {
        $activity = $this->findOrFail($id);

        if (!in_array(strtoupper($activity->status), ['DRAFT', 'REJECTED'])) {
            return redirect()->route('lecturer.support.index')->with('error', 'Data cannot be edited');
        }

        return view('pages.lecturer.support.edit', [
            'title' => 'Edit Support Activities',
            'activity' => $activity
        ]);
    }

    public function update(Request $request, int $id)
    {
        $activity = $this->findOrFail($id);

        if (!in_array(strtoupper($activity->status), ['DRAFT', 'REJECTED'])) {
            return back()->with('error', 'Data cannot be edited.');
        }

        $request->validate([
            'type_id' => 'nullable|exists:ref_activity_types,id',
            'organization' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:100',
            'activity_date' => 'nullable|date',
            'description' => 'nullable|string|max:255',
        ]);

        try {
            DB::table(self::ACTIVITY_TABLE)->where('id', $id)->update([
                'type_id' => $request->type_id,
                'organization' => $request->organization,
                'role' => $request->role,
                'activity_date' => $request->activity_date,
                'description' => $request->description,
                'updated_at' => now(),
            ]);

            return redirect()->route('lecturer.support.index')->with('success', 'Changes have been successfully saved.');
        } catch (\Illuminate\Database\QueryException $e) {
            \Log::error('Support activity update failed', [
                'user_id' => Auth::id(),
                'activity_id' => $id,
                'error' => $e->getMessage()
            ]);
            return back()->with('error', 'Gagal menyimpan perubahan. Silakan periksa kembali inputan Anda.')->withInput();
        } catch (\Exception $e) {
            \Log::error('Unexpected error in support activity update', [
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
            return back()->with('error', 'Cannot upload evidence in current status.');
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

        return back()->with('success', 'Evidence has been successfully uploaded.');
    }

    public function deleteEvidence(int $id, int $evidenceId)
    {
        $activity = $this->findOrFail($id);

        if (!in_array(strtoupper($activity->status), ['DRAFT', 'REJECTED'])) {
            return back()->with('error', 'Cannot delete evidence in current status.');
        }

        $evidence = DB::table(self::EVIDENCE_TABLE)
            ->where('id', $evidenceId)
            ->where('category', self::CATEGORY)
            ->where('activity_id', $id)
            ->first();

        if ($evidence) {
            Storage::disk('public')->delete($evidence->file_path);
            DB::table(self::EVIDENCE_TABLE)->where('id', $evidenceId)->delete();
            return back()->with('success', 'Evidence has been successfully deleted.');
        }

        return back()->with('error', 'Evidence not found.');
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
            return back()->with('error', 'At least one piece of evidence must be uploaded.');
        }

        DB::table(self::ACTIVITY_TABLE)->where('id', $id)->update([
            'status' => 'SUBMITTED',
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Activity has been successfully submitted for verification.');
    }

    private function findOrFail($id)
    {
        $activity = DB::table(self::ACTIVITY_TABLE)
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->whereNull('deleted_at')
            ->first();

        if (!$activity) {
            abort(404, 'Data not found.');
        }
        return $activity;
    }
}
