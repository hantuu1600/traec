<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SubmissionController extends Controller
{
    public function index(): View
    {
        $userId = Auth::id();

        $teaching = DB::table('teaching_activities')
            ->select([
                'id',
                'course_name as title',
                DB::raw("'Teaching' as category"),
                'status',
                'created_at',
                DB::raw("'TEACHING' as log_type")
            ])
            ->where('user_id', $userId)
            ->whereNull('deleted_at');

        $research = DB::table('research_activities')
            ->select([
                'id',
                'title',
                DB::raw("'Research' as category"),
                'status',
                'created_at',
                DB::raw("'RESEARCH' as log_type")
            ])
            ->where('user_id', $userId)
            ->whereNull('deleted_at');

        // merge 2 table
        $submissions = $teaching->union($research)
            ->orderBy('created_at', 'desc')
            ->get();

        $rejectionReasons = [];
        $rejectedItems = $submissions->where('status', 'REJECTED');

        if ($rejectedItems->isNotEmpty()) {
            $conditions = [];
            foreach ($rejectedItems as $item) {
                $conditions[] = " (subject_type = '{$item->log_type}' AND subject_id = {$item->id}) ";
            }

            if (!empty($conditions)) {
                $whereRaw = implode(' OR ', $conditions);

                $logs = DB::table('activity_logs')
                    ->where('action', 'rejected')
                    ->whereRaw("($whereRaw)")
                    ->orderBy('created_at', 'desc')
                    ->get();

                foreach ($logs as $log) {
                    $key = $log->subject_type . '_' . $log->subject_id;

                    // check if exist
                    if (!isset($rejectionReasons[$key])) {
                        $meta = json_decode($log->meta ?? '{}', true);
                        $rejectionReasons[$key] = $meta['reason'] ?? 'Alasan tidak spesifik (hubungi admin).';
                    }
                }
            }
        }

        return view('pages.lecturer.submissions.index', [
            'submissions' => $submissions,
            'rejectionReasons' => $rejectionReasons,
            'title' => 'Riwayat Pengajuan'
        ]);
    }
}
