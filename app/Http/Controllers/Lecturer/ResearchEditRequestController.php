<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ResearchEditRequestController extends Controller
{
    public function create(int $id)
    {
        $research = DB::table('research_activities')
            ->where('id', $id)
            ->whereNull('deleted_at')
            ->first();

        abort_if(!$research, 404);

        if ($research->status !== 'VERIFIED') {
            return back()->with('error', 'Hanya kegiatan yang sudah diverifikasi yang dapat diajukan perbaikan.');
        }

        return view('pages.lecturer.research.request-edit', [
            'title' => 'Ajukan Perbaikan Data',
            'research' => $research,
        ]);
    }

    public function store(Request $request, int $id)
    {
        $request->validate([
            'reason' => 'required|string|max:500',
        ]);

        $research = DB::table('research_activities')->where('id', $id)->first();
        if (!$research)
            abort(404);

        // Log the request
        DB::table('activity_logs')->insert([
            'user_id' => Auth::id(),
            'action' => 'REQUEST_EDIT',
            'description' => "Request Edit Research Activity #{$id}: {$research->title}. Reason: {$request->reason}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('lecturer.research.show', $id)
            ->with('success', 'Permintaan edit telah dikirim ke admin. Mohon tunggu persetujuan.');
    }
}
