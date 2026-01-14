<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResearchController extends Controller
{
    public function index()
    {
        $researchs = DB::table('research_activities')
            ->select(
                'id',
                'title',
                'type_id',
                'rank_id',
                'role',
                'publisher',
                'year',
                'doi',
                'link',
                'status'
            )
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->get();
        
        $members = DB::table('research_activity_members')
        ->join('users', 'users.id', '=', 'research_activity_members.user_id')
        ->select(
            'research_activity_members.research_activity_id',
            'users.name',
            'research_activity_members.role'
        )
        ->get()
        ->groupBy('research_activity_id');

        return view('pages.lecturer.research', [
            'researchs' => $researchs,
            'members'   => $members,
        ]);
    }

    public function edit(Request $request, int $id)
    {
        $research = DB::table('research_activities')
            ->where('id', $id)
            ->whereNull('deleted_at')
            ->first();

        if (! $research) {
            abort(404);
        }

        // JIKA PUT → SIMPAN DATA
        if ($request->isMethod('put')) {

            $validated = $request->validate([
                'title'     => 'required|string|max:255',
                'type_id'   => 'required|integer',
                'rank_id'   => 'required|integer',
                'role'      => 'nullable|string|max:100',
                'publisher' => 'nullable|string|max:255',
                'year'      => 'nullable|integer',
                'doi'       => 'nullable|string|max:150',
                'link'      => 'nullable|string|max:255',
            ]);

            DB::table('research_activities')
                ->where('id', $id)
                ->update([
                    'title'      => $validated['title'],
                    'type_id'    => $validated['type_id'],
                    'rank_id'    => $validated['rank_id'],
                    'role'       => $validated['role'],
                    'publisher'  => $validated['publisher'],
                    'year'       => $validated['year'],
                    'doi'        => $validated['doi'],
                    'link'       => $validated['link'],
                    'updated_at' => now(),
                ]);

            return redirect()
                ->route('lecturer.research.index')
                ->with('success', 'Research updated successfully.');
        }

        // JIKA GET → TAMPILKAN FORM
        return view('pages.lecturer.research-edit', compact('research'));
    }


    public function create()
    {
        return view('pages.lecturer.research-create');
    }


    public function store(Request $request)
        {
            $validated = $request->validate([
                'title'      => 'required|string|max:255',
                'type_id'    => 'nullable|integer',
                'rank_id'    => 'nullable|integer',
                'role'       => 'required|string|max:100',
                'publisher'  => 'nullable|string|max:255',
                'year'       => 'nullable|integer',
                'doi'        => 'nullable|string|max:150',
                'link'       => 'nullable|string|max:255',

                // members
                'members'               => 'nullable|array',
                'members.*.user_id'     => 'required|integer',
                'members.*.role'        => 'nullable|string|max:100',
            ]);

            DB::transaction(function () use ($validated) {

                // 1️⃣ Insert research
                $researchId = DB::table('research_activities')->insertGetId([
                    'user_id'    => auth()->id() ?? 1,   // owner / ketua
                    'period_id'  => 1,                   // dummy sementara
                    'title'      => $validated['title'],
                    'type_id'    => $validated['type_id'] ?? null,
                    'rank_id'    => $validated['rank_id'] ?? null,
                    'role'       => $validated['role'] ?? null,
                    'publisher'  => $validated['publisher'] ?? null,
                    'year'       => $validated['year'] ?? null,
                    'doi'        => $validated['doi'] ?? null,
                    'link'       => $validated['link'] ?? null,
                    'status'     => 'DRAFT',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // 2️⃣ Insert members (jika ada)
                if (!empty($validated['members'])) {
                    $membersData = [];

                    foreach ($validated['members'] as $member) {
                        $membersData[] = [
                            'research_activity_id' => $researchId,
                            'user_id'              => $member['user_id'],
                            'role'                 => $member['role'] ?? null,
                            'created_at'           => now(),
                            'updated_at'           => now(),
                        ];
                    }

                    DB::table('research_activity_members')->insert($membersData);
                }
            });


        return redirect()
            ->route('lecturer.research.index')
            ->with('success', 'Research activity added successfully.');
    }

}
