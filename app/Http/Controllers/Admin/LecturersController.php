<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LecturersController extends Controller
{
    public function index(Request $request)
    {
        $q      = trim((string) $request->query('q', ''));
        $filter = trim((string) $request->query('filter', 'All'));

        $baseQuery = DB::table('users')
            ->select([
                'id',
                'name',
                'email',
                'nidn',
                'study_program',
                'faculty',
                'role',
                'updated_at',
            ])
            ->whereNull('deleted_at')
            ->where('role', 'LECTURER');

        if ($q !== '') {
            $baseQuery->where(function ($w) use ($q) {
                $w->where('name', 'like', "%{$q}%")
                    ->orWhere('nidn', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            });
        }

        if ($filter !== '' && strtolower($filter) !== 'all') {
            $baseQuery->where('study_program', $filter);
        }

        $rows = $baseQuery
            ->orderByDesc('updated_at')
            ->paginate(10)
            ->withQueryString();

        $filters = DB::table('users')
            ->where('role', 'LECTURER')
            ->whereNotNull('study_program')
            ->where('study_program')
            ->distinct()
            ->orderBy('study_program')
            ->pluck('study_program')
            ->values()
            ->toArray();

        array_unshift($filters, 'All');

        return view('pages.admin.lecturers', [
            'title'   => 'Lecturers',
            'rows'    => $rows,
            'filters' => $filters,
        ]);
    }
}
