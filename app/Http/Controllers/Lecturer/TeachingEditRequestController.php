<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TeachingEditRequestController extends Controller
{
    public function create(int $id)
    {
        $teaching = DB::table('teaching_activities')
            ->where('id', $id)
            ->whereNull('deleted_at')
            ->first();

        abort_if(!$teaching, 404);

        if ($teaching->status !== 'VERIFIED') {
            return back()->with('error', 'Hanya kegiatan yang sudah diverifikasi yang dapat diajukan perbaikan.');
        }

        return view('pages.lecturer.teaching.request-edit', [
            'title' => 'Ajukan Perbaikan Data',
            'teaching' => $teaching,
        ]);
    }

    public function store(Request $request, int $id)
    {
        $request->validate([
            'reason' => 'required|string|max:500',
        ]);

        $teaching = DB::table('teaching_activities')->where('id', $id)->first();
        if (!$teaching)
            abort(404);

        // Log the request
        DB::table('activity_logs')->insert([
            'user_id' => Auth::id(),
            'action' => 'REQUEST_EDIT',
            'description' => "Request Edit Teaching Activity #{$id}: {$teaching->course_name}. Reason: {$request->reason}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('lecturer.teaching.show', $id)
            ->with('success', 'Permintaan edit telah dikirim ke admin. Mohon tunggu persetujuan.');
    }
}
