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
        $filter = $request->get('filter');

        $userId = \Illuminate\Support\Facades\Auth::id();

        $teaching = \Illuminate\Support\Facades\DB::table('teaching_activities')
            ->select('status', \Illuminate\Support\Facades\DB::raw("'Teaching' as type"))
            ->where('user_id', $userId)
            ->whereNull('deleted_at');

        $research = \Illuminate\Support\Facades\DB::table('research_activities')
            ->select('status', \Illuminate\Support\Facades\DB::raw("'Research' as type"))
            ->where('user_id', $userId)
            ->whereNull('deleted_at');

        $community = \Illuminate\Support\Facades\DB::table('community_service_activities')
            ->select('status', \Illuminate\Support\Facades\DB::raw("'Community Service' as type"))
            ->where('user_id', $userId)
            ->whereNull('deleted_at');

        $support = \Illuminate\Support\Facades\DB::table('support_activities')
            ->select('status', \Illuminate\Support\Facades\DB::raw("'Support' as type"))
            ->where('user_id', $userId)
            ->whereNull('deleted_at');

        $allActivities = $teaching
            ->unionAll($research)
            ->unionAll($community)
            ->unionAll($support)
            ->get();

        $total = $allActivities->count();
        $teachingCount = $allActivities->where('type', 'Teaching')->count();
        $researchCount = $allActivities->where('type', 'Research')->count();
        $communityCount = $allActivities->where('type', 'Community Service')->count();
        $supportCount = $allActivities->where('type', 'Support')->count();
        $verifiedCount = $allActivities->where('status', 'VERIFIED')->count();

        $stats = [
            ['label' => 'Total Activities', 'value' => $total, 'icon' => 'total'],
            ['label' => 'Teaching', 'value' => $teachingCount, 'icon' => 'teaching'],
            ['label' => 'Research', 'value' => $researchCount, 'icon' => 'research'],
            ['label' => 'Community Service', 'value' => $communityCount, 'icon' => 'community'],
            ['label' => 'Support', 'value' => $supportCount, 'icon' => 'support'],
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

        $recentCommunity = DB::table('community_service_activities')
            ->select([
                'id',
                'title',
                DB::raw("'Community Service' as category"),
                'status',
                'created_at',
                'updated_at',
                DB::raw("'-' as period"),
            ])
            ->where('user_id', $userId)
            ->whereNull('deleted_at');

        if ($keyword) {
            $recentCommunity->where('title', 'LIKE', "%{$keyword}%");
        }

        $recentSupport = DB::table('support_activities')
            ->select([
                'id',
                'description as title',
                DB::raw("'Support' as category"),
                'status',
                'created_at',
                'updated_at',
                DB::raw("'-' as period"),
            ])
            ->where('user_id', $userId)
            ->whereNull('deleted_at');

        if ($keyword) {
            $recentSupport->where('description', 'LIKE', "%{$keyword}%");
        }

        if ($filter && $filter !== 'all') {
            if ($filter === 'teaching') {
                $recentResearch->whereRaw('1 = 0');
                $recentCommunity->whereRaw('1 = 0');
                $recentSupport->whereRaw('1 = 0');
            }

            if ($filter === 'research') {
                $recentTeaching->whereRaw('1 = 0');
                $recentCommunity->whereRaw('1 = 0');
                $recentSupport->whereRaw('1 = 0');
            }

            if ($filter === 'community service') {
                $recentTeaching->whereRaw('1 = 0');
                $recentResearch->whereRaw('1 = 0');
                $recentSupport->whereRaw('1 = 0');
            }

            if ($filter === 'support') {
                $recentTeaching->whereRaw('1 = 0');
                $recentResearch->whereRaw('1 = 0');
                $recentCommunity->whereRaw('1 = 0');
            }
        }

        $rows = $recentTeaching
            ->union($recentResearch)
            ->union($recentCommunity)
            ->union($recentSupport)
            ->orderBy('updated_at', 'desc')
            ->paginate(10)
            ->withQueryString()
            ->through(function ($item) {
                return [
                    'id' => $item->id,
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
