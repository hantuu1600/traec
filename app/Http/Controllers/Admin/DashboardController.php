<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboardAdminView(Request $request)
    {
        $keyword = $request->get('q');
        $filter = $request->get('filter');

        //Count Statistic (All activity types combined)
        $teaching = \Illuminate\Support\Facades\DB::table('teaching_activities')
            ->select('status', \Illuminate\Support\Facades\DB::raw("'Teaching' as type"));

        $research = \Illuminate\Support\Facades\DB::table('research_activities')
            ->select('status', \Illuminate\Support\Facades\DB::raw("'Research' as type"));

        $communityService = \Illuminate\Support\Facades\DB::table('community_service_activities')
            ->select('status', \Illuminate\Support\Facades\DB::raw("'Community Service' as type"));

        $support = \Illuminate\Support\Facades\DB::table('support_activities')
            ->select('status', \Illuminate\Support\Facades\DB::raw("'Support' as type"));

        $allActivities = $teaching
            ->unionAll($research)
            ->unionAll($communityService)
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

        //take from Recent Activities
        $recentTeaching = \Illuminate\Support\Facades\DB::table('teaching_activities')
            ->join('users', 'teaching_activities.user_id', '=', 'users.id')
            ->select([
                'teaching_activities.id',
                'teaching_activities.course_name as title',
                \Illuminate\Support\Facades\DB::raw("'Teaching' as category"),
                'teaching_activities.status',
                'teaching_activities.created_at',
                'teaching_activities.updated_at',
                'users.name as lecturer',
                'teaching_activities.semester as period',
            ])
            ->whereNull('teaching_activities.deleted_at');

        if ($keyword) {
            $recentTeaching->where(function ($q) use ($keyword) {
                $q->where('teaching_activities.course_name', 'LIKE', "%{$keyword}%")
                    ->orWhere('users.name', 'LIKE', "%{$keyword}%");
            });
        }

        $recentResearch = \Illuminate\Support\Facades\DB::table('research_activities')
            ->join('users', 'research_activities.user_id', '=', 'users.id')
            ->select([
                'research_activities.id',
                'research_activities.title',
                \Illuminate\Support\Facades\DB::raw("'Research' as category"),
                'research_activities.status',
                'research_activities.created_at',
                'research_activities.updated_at',
                'users.name as lecturer',
                \Illuminate\Support\Facades\DB::raw("'-' as period"),
            ])
            ->whereNull('research_activities.deleted_at');
        if ($keyword) {
            $recentResearch->where(function ($q) use ($keyword) {
                $q->where('research_activities.title', 'LIKE', "%{$keyword}%")
                    ->orWhere('users.name', 'LIKE', "%{$keyword}%");
            });
        }

        $recentCommunity = \Illuminate\Support\Facades\DB::table('community_service_activities')
            ->join('users', 'community_service_activities.user_id', '=', 'users.id')
            ->select([
                'community_service_activities.id',
                'community_service_activities.title',
                \Illuminate\Support\Facades\DB::raw("'Community Service' as category"),
                'community_service_activities.status',
                'community_service_activities.created_at',
                'community_service_activities.updated_at',
                'users.name as lecturer',
                \Illuminate\Support\Facades\DB::raw("'-' as period"),
            ])
            ->whereNull('community_service_activities.deleted_at');
        if ($keyword) {
            $recentCommunity->where(function ($q) use ($keyword) {
                $q->where('community_service_activities.title', 'LIKE', "%{$keyword}%")
                    ->orWhere('users.name', 'LIKE', "%{$keyword}%");
            });
        }

        $recentSupport = \Illuminate\Support\Facades\DB::table('support_activities')
            ->join('users', 'support_activities.user_id', '=', 'users.id')
            ->select([
                'support_activities.id',
                'support_activities.description as title',
                \Illuminate\Support\Facades\DB::raw("'Support' as category"),
                'support_activities.status',
                'support_activities.created_at',
                'support_activities.updated_at',
                'users.name as lecturer',
                \Illuminate\Support\Facades\DB::raw("'-' as period"),
            ])
            ->whereNull('support_activities.deleted_at');
        if ($keyword) {
            $recentSupport->where(function ($q) use ($keyword) {
                $q->where('support_activities.description', 'LIKE', "%{$keyword}%")
                    ->orWhere('users.name', 'LIKE', "%{$keyword}%");
            });
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

            if ($filter === 'community') {
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
                    'category' => $item->category,
                    'lecturer' => $item->lecturer,
                    'title' => $item->title,
                    'period' => $item->period,
                    'date' => \Carbon\Carbon::parse($item->created_at)->format('d M Y'),
                    'status' => strtoupper($item->status),
                    'updated' => \Carbon\Carbon::parse($item->updated_at)->diffForHumans(),
                    'evidence' => 0,
                ];
            });

        return view('pages.admin.dashboard', [
            'title' => 'Dashboard Admin',
            'stats' => $stats,
            'rows' => $rows
        ]);
    }
}
