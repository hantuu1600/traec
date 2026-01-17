<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboardLecturerView()
    {
        $userId = \Illuminate\Support\Facades\Auth::id();

        $teaching = \Illuminate\Support\Facades\DB::table('teaching_activities')
            ->select('status', \Illuminate\Support\Facades\DB::raw("'Teaching' as type"))
            ->where('user_id', $userId)
            ->whereNull('deleted_at');

        $research = \Illuminate\Support\Facades\DB::table('research_activities')
            ->select('status', \Illuminate\Support\Facades\DB::raw("'Research' as type"))
            ->where('user_id', $userId)
            ->whereNull('deleted_at');

        $allActivities = $teaching->unionAll($research)->get();

        $total = $allActivities->count();
        $teachingCount = $allActivities->where('type', 'Teaching')->count();
        $researchCount = $allActivities->where('type', 'Research')->count();
        $verifiedCount = $allActivities->where('status', 'VERIFIED')->count();

        $stats = [
            ['label' => 'Total Activities', 'value' => $total, 'icon' => 'total'],
            ['label' => 'Teaching', 'value' => $teachingCount, 'icon' => 'teaching'],
            ['label' => 'Research', 'value' => $researchCount, 'icon' => 'research'],
            ['label' => 'Verified', 'value' => $verifiedCount, 'icon' => 'verified'],
        ];

        

        
        $recentTeaching = \Illuminate\Support\Facades\DB::table('teaching_activities')
            ->select([
                'id',
                'course_name as title',
                \Illuminate\Support\Facades\DB::raw("'Teaching' as category"),
                'status',
                'created_at',
                'updated_at',
                'semester as period',
            ])
            ->where('user_id', $userId)
            ->whereNull('deleted_at');

        $recentResearch = \Illuminate\Support\Facades\DB::table('research_activities')
            ->select([
                'id',
                'title',
                \Illuminate\Support\Facades\DB::raw("'Research' as category"),
                'status',
                'created_at',
                'updated_at',
                \Illuminate\Support\Facades\DB::raw("CAST(year AS CHAR) as period"),
            ])
            ->where('user_id', $userId)
            ->whereNull('deleted_at');

        $rows = $recentTeaching->union($recentResearch)
            ->orderBy('updated_at', 'desc')
            ->paginate(10)
            ->through(function ($item) {
                return [
                    'category' => $item->category,
                    'lecturer' => \Illuminate\Support\Facades\Auth::user()->name,
                    'title' => $item->title,
                    'period' => $item->period,
                    'date' => \Carbon\Carbon::parse($item->created_at)->format('d M Y'),
                    'status' => ucfirst(strtolower($item->status)),
                    'updated' => \Carbon\Carbon::parse($item->updated_at)->diffForHumans(),
                ];
            });

        return view('pages.lecturer.dashboard', [
            'title' => 'Dashboard Lecturer',
            'stats' => $stats,
            'rows' => $rows
        ]);
    }
}
