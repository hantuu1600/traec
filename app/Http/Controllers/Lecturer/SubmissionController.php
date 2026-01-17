<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SubmissionController extends Controller
{
    /**
     * Tampilkan halaman riwayat pengajuan (Gabungan Teaching & Research).
     * 
     * @return View
     */
    public function index(): View
    {
        $userId = Auth::id();

        // Ambil data Teaching Activities
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

        // Ambil data Research Activities
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

        // Gabung dua table ini jadi satu, urutkan dari yang paling baru
        $submissions = $teaching->union($research)
            ->orderBy('created_at', 'desc')
            ->get();

        // Logic buat ambil alasan penolakan kalau statusnya REJECTED
        $rejectionReasons = [];
        $rejectedItems = $submissions->where('status', 'REJECTED');

        if ($rejectedItems->isNotEmpty()) {

            // Biar query nya ga nembak database berkali-kali (N+1 prob), 
            // kita kumpulkan dulu item yang butuh dicek log nya.
            $conditions = [];
            foreach ($rejectedItems as $item) {
                // Query builder raw where condition
                $conditions[] = " (subject_type = '{$item->log_type}' AND subject_id = {$item->id}) ";
            }

            if (!empty($conditions)) {
                $whereRaw = implode(' OR ', $conditions);

                // Ambil log rejection terakhir dari item-item tersebut
                $logs = DB::table('activity_logs')
                    ->where('action', 'rejected')
                    ->whereRaw("($whereRaw)")
                    ->orderBy('created_at', 'desc')
                    ->get();

                // Map hasil query log ke array biar gampang dipanggil di view
                foreach ($logs as $log) {
                    $key = $log->subject_type . '_' . $log->subject_id;

                    // Cek if exist, karena log user bisa > 1 kali rejected, kita cuma butuh yang paling baru (first found)
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
