<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeachingController extends Controller
{
    public function index()
    {
        $teachings = DB::table('teaching_activities')
            ->select(
                'id',
                'course_name',
                'study_program',
                'semester',
                'credits',
                'meetings_total',
                'start_date',
                'end_date',
                'year',
                'status'
            )
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.lecturer.teaching', [
            'teachings' => $teachings,
        ]);
    }

public function edit(Request $request, int $id)
{
    // AMBIL DATA
    $teaching = DB::table('teaching_activities')
        ->where('id', $id)
        ->whereNull('deleted_at')
        ->first();

    if (! $teaching) {
        abort(404);
    }

    // JIKA PUT → UPDATE DATA
    if ($request->isMethod('put')) {

        $validated = $request->validate([
            'study_program'  => 'required|string|max:150',
            'semester'       => 'required|string|max:50',
            'credits'        => 'required|integer|min:1',
            'meetings_total' => 'required|integer|min:1',
            'start_date'     => 'nullable|date',
            'end_date'       => 'nullable|date|after_or_equal:start_date',
            'year'           => 'required|integer|min:1900|max:2100',
        ]);

        DB::table('teaching_activities')
            ->where('id', $id)
            ->update([
                'study_program'  => $validated['study_program'],
                'semester'       => $validated['semester'],
                'credits'        => $validated['credits'],
                'meetings_total' => $validated['meetings_total'],
                'start_date'     => $validated['start_date'],
                'end_date'       => $validated['end_date'],
                'year'           => $validated['year'],
                'updated_at'     => now(),
            ]);

        return redirect()
            ->route('lecturer.teaching.index')
            ->with('success', 'Teaching schedule updated successfully.');
    }

    // JIKA GET → TAMPILKAN FORM
    return view('pages.lecturer.teaching-edit', compact('teaching'));
}


    public function store(Request $request)
    {
        return redirect()
            ->back()
            ->with('success', 'Teaching schedule saved successfully.');
    }
}
