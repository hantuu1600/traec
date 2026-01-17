<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class VerifiedDocumentsController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $category = $request->get('category', 'all');

        // Get all verified activities from all tables
        $teaching = DB::table('teaching_activities')
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
            ->where('status', 'VERIFIED')
            ->whereNull('deleted_at');

        $research = DB::table('research_activities')
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
            ->where('status', 'VERIFIED')
            ->whereNull('deleted_at');

        $community = DB::table('community_service_activities')
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
            ->where('status', 'VERIFIED')
            ->whereNull('deleted_at');

        $support = DB::table('support_activities')
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
            ->where('status', 'VERIFIED')
            ->whereNull('deleted_at');

        // Apply category filter
        if ($category !== 'all') {
            if ($category !== 'teaching')
                $teaching->whereRaw('1 = 0');
            if ($category !== 'research')
                $research->whereRaw('1 = 0');
            if ($category !== 'community')
                $community->whereRaw('1 = 0');
            if ($category !== 'support')
                $support->whereRaw('1 = 0');
        }

        $activities = $teaching
            ->union($research)
            ->union($community)
            ->union($support)
            ->orderBy('updated_at', 'desc')
            ->paginate(15)
            ->withQueryString()
            ->through(function ($item) {
                return [
                    'id' => $item->id,
                    'category' => $item->category,
                    'title' => $item->title,
                    'period' => $item->period,
                    'date' => Carbon::parse($item->created_at)->format('d M Y'),
                    'updated' => Carbon::parse($item->updated_at)->diffForHumans(),
                ];
            });

        // Count by category
        $stats = [
            'total' => DB::table('teaching_activities')->where('user_id', $userId)->where('status', 'VERIFIED')->whereNull('deleted_at')->count() +
                DB::table('research_activities')->where('user_id', $userId)->where('status', 'VERIFIED')->whereNull('deleted_at')->count() +
                DB::table('community_service_activities')->where('user_id', $userId)->where('status', 'VERIFIED')->whereNull('deleted_at')->count() +
                DB::table('support_activities')->where('user_id', $userId)->where('status', 'VERIFIED')->whereNull('deleted_at')->count(),
            'teaching' => DB::table('teaching_activities')->where('user_id', $userId)->where('status', 'VERIFIED')->whereNull('deleted_at')->count(),
            'research' => DB::table('research_activities')->where('user_id', $userId)->where('status', 'VERIFIED')->whereNull('deleted_at')->count(),
            'community' => DB::table('community_service_activities')->where('user_id', $userId)->where('status', 'VERIFIED')->whereNull('deleted_at')->count(),
            'support' => DB::table('support_activities')->where('user_id', $userId)->where('status', 'VERIFIED')->whereNull('deleted_at')->count(),
        ];

        return view('pages.lecturer.verified-documents.index', [
            'title' => 'Verified Documents',
            'activities' => $activities,
            'stats' => $stats,
            'currentCategory' => $category,
        ]);
    }
}
