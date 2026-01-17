<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboardLecturerView(Request $request)
    {
        $keyword = $request->get('q');
        $filter  = $request->get('filter');

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

        

        
        $recentTeaching = DB::table('teaching_activities')
            ->select([
                'id',
                'course_name as title',
                DB::raw("'Teaching' as category"),
                'status',
                'created_at',
                'updated_at',
                'semester as period',
            ])
            ->where('user_id', $userId)
            ->whereNull('deleted_at');

        if ($keyword) {
            $recentTeaching->where('course_name', 'LIKE', "%{$keyword}%");
        }

        $recentResearch = DB::table('research_activities')
            ->select([
                'id',
                'title',
                DB::raw("'Research' as category"),
                'status',
                'created_at',
                'updated_at',
                DB::raw("CAST(year AS CHAR) as period"),
            ])
            ->where('user_id', $userId)
            ->whereNull('deleted_at');

        if ($keyword) {
            $recentResearch->where('title', 'LIKE', "%{$keyword}%");
        }

        if ($filter && $filter !== 'all') {
            if ($filter === 'teaching') {
                $recentResearch->whereRaw('1 = 0');
            }

            if ($filter === 'research') {
                $recentTeaching->whereRaw('1 = 0');
            }
        }

        $rows = $recentTeaching
            ->union($recentResearch)
            ->orderBy('updated_at', 'desc')
            ->paginate(10)
            ->withQueryString()
            ->through(function ($item) {
                return [
                    'category' => $item->category,
                    'lecturer' => Auth::user()->name,
                    'title' => $item->title,
                    'period' => $item->period,
                    'date' => Carbon::parse($item->created_at)->format('d M Y'),
                    'status' => strtoupper($item->status),
                    'updated' => Carbon::parse($item->updated_at)->diffForHumans(),
                ];
            });

        return view('pages.lecturer.dashboard', [
            'title' => 'Dashboard Lecturer',
            'stats' => $stats,
            'rows' => $rows
        ]);
    }
}
