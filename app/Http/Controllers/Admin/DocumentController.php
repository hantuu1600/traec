<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    private const EVIDENCE_TABLE = 'activity_evidence';
    private const LOG_TABLE = 'activity_logs';

    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $category = strtoupper(trim((string) $request->query('category', 'ALL')));
        $status = strtoupper(trim((string) $request->query('status', 'SUBMITTED')));

        $teaching = DB::table('teaching_activities')
            ->join('users', 'users.id', '=', 'teaching_activities.user_id')
            ->whereNull('teaching_activities.deleted_at')
            ->selectRaw("
                'TEACHING' as category,
                teaching_activities.id as id,
                users.name as lecturer,
                users.prodi as prodi,
                teaching_activities.course_name as title,
                teaching_activities.semester as period,
                teaching_activities.status as status,
                teaching_activities.updated_at as submitted_at,
                (
                    SELECT COUNT(*)
                    FROM " . self::EVIDENCE_TABLE . " ae
                    WHERE ae.category = 'TEACHING'
                      AND ae.activity_id = teaching_activities.id
                      AND ae.deleted_at IS NULL
                ) as evidence_count
            ");

        $research = DB::table('research_activities')
            ->join('users', 'users.id', '=', 'research_activities.user_id')
            ->whereNull('research_activities.deleted_at')
            ->selectRaw("
                'RESEARCH' as category,
                research_activities.id as id,
                users.name as lecturer,
                users.prodi as prodi,
                research_activities.title as title,
                COALESCE(CAST(research_activities.year AS CHAR), '-') as period,
                research_activities.status as status,
                research_activities.updated_at as submitted_at,
                (
                    SELECT COUNT(*)
                    FROM " . self::EVIDENCE_TABLE . " ae
                    WHERE ae.category = 'RESEARCH'
                      AND ae.activity_id = research_activities.id
                      AND ae.deleted_at IS NULL
                ) as evidence_count
            ");

        $union = $teaching->unionAll($research);

        $rows = DB::query()->fromSub($union, 'x');

        if ($q !== '') {
            $rows->where(function ($w) use ($q) {
                $w->where('lecturer', 'like', "%{$q}%")
                    ->orWhere('title', 'like', "%{$q}%")
                    ->orWhere('prodi', 'like', "%{$q}%");
            });
        }

        if ($category !== 'ALL') {
            $rows->where('category', $category);
        }

        if ($status !== 'ALL') {
            $rows->where('status', $status);
        }

        $rows = $rows->orderByDesc('submitted_at')->paginate(10)->withQueryString();

        return view('pages.admin.document-request', [
            'title' => 'Verifikasi Dokumen',
            'rows' => $rows,
            'filters' => [
                'q' => $q,
                'category' => $category,
                'status' => $status,
            ],
        ]);
    }

    public function show(string $category, int $id)
    {
        $category = strtoupper($category);

        [$table, $categoryEnum] = $this->resolveActivity($category);

        $activity = DB::table($table)
            ->join('users', 'users.id', '=', "{$table}.user_id")
            ->where("{$table}.id", $id)
            ->whereNull("{$table}.deleted_at")
            ->select([
                "{$table}.*",
                "users.name as lecturer_name",
                "users.prodi as lecturer_prodi",
                "users.nidn as lecturer_nidn"
            ])
            ->first();

        abort_if(!$activity, 404);

        $evidences = DB::table(self::EVIDENCE_TABLE)
            ->where('category', $categoryEnum)
            ->where('activity_id', $id)
            ->whereNull('deleted_at')
            ->orderByDesc('created_at')
            ->get();

        return view('pages.admin.document-request-show', [
            'title' => 'Detail Verifikasi',
            'category' => $category, // TEACHING / RESEARCH
            'activity' => $activity,
            'evidences' => $evidences,
        ]);
    }


    public function approve(Request $request, string $category, int $id)
    {
        $category = strtoupper($category);
        [$table, $categoryEnum] = $this->resolveActivity($category);

        DB::transaction(function () use ($table, $categoryEnum, $id) {
            DB::table($table)
                ->where('id', $id)
                ->whereNull('deleted_at')
                ->update([
                    'status' => 'VERIFIED',
                    'updated_at' => now(),
                ]);

            DB::table(self::LOG_TABLE)->insert([
                'user_id' => auth()->id() ?? 1,
                'action' => 'APPROVE_SUBMISSION',
                'entity_type' => $categoryEnum,
                'entity_id' => $id,
                'meta' => json_encode(['to' => 'VERIFIED']),
                'ip_address' => request()->ip(),
                'user_agent' => substr((string) request()->userAgent(), 0, 255),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        return redirect()
            ->route('admin.document-request.show', [$category, $id])
            ->with('success', 'Dokumen berhasil diverifikasi.');
    }

    public function reject(Request $request, string $category, int $id)
    {
        $request->validate([
            'reason' => 'required|string|max:500',
        ]);

        $category = strtoupper($category);
        [$table, $categoryEnum] = $this->resolveActivity($category);

        DB::transaction(function () use ($table, $categoryEnum, $id, $request) {
            DB::table($table)
                ->where('id', $id)
                ->whereNull('deleted_at')
                ->update([
                    'status' => 'REJECTED',
                    'updated_at' => now(),
                ]);

            DB::table(self::LOG_TABLE)->insert([
                'user_id' => auth()->id() ?? 1,
                'action' => 'REJECT_SUBMISSION',
                'entity_type' => $categoryEnum,
                'entity_id' => $id,
                'meta' => json_encode(['to' => 'REJECTED', 'reason' => $request->input('reason')]),
                'ip_address' => request()->ip(),
                'user_agent' => substr((string) request()->userAgent(), 0, 255),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        return redirect()
            ->route('admin.document-request.show', [$category, $id])
            ->with('success', 'Dokumen ditolak dan dikembalikan ke dosen.');
    }

    private function resolveActivity(string $category): array
    {
        return match ($category) {
            'TEACHING' => ['teaching_activities', 'TEACHING'],
            'RESEARCH' => ['research_activities', 'RESEARCH'],
            default => abort(404),
        };
    }
}
