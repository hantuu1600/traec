<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('activity_logs')
            ->join('users', 'activity_logs.user_id', '=', 'users.id')
            ->select('activity_logs.*', 'users.name as user_name', 'users.email as user_email')
            ->orderByDesc('activity_logs.created_at');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('activity_logs.description', 'like', "%{$search}%")
                    ->orWhere('users.name', 'like', "%{$search}%");
            });
        }

        $logs = $query->paginate(20);

        return view('pages.admin.logs.index', [
            'title' => 'Log Aktivitas',
            'logs' => $logs
        ]);
    }

    public function show($id)
    {
        $log = DB::table('activity_logs')
            ->join('users', 'activity_logs.user_id', '=', 'users.id')
            ->select('activity_logs.*', 'users.name as user_name', 'users.email as user_email')
            ->where('activity_logs.id', $id)
            ->first();

        if (!$log)
            abort(404);

        return view('pages.admin.logs.show', [
            'title' => 'Detail Log',
            'log' => $log
        ]);
    }
}
