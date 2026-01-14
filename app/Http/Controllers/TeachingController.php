<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeachingController extends Controller
{
    public function index()
    {
        $teachings = [
            [
                'id' => 1,
                'course_code' => 'IF204',
                'course_name' => 'Software Engineering',
                'class' => 'A',
                'day' => 'Monday',
                'time' => '08:00 - 09:40',
                'room' => 'Lab 301',
            ],
            [
                'id' => 2,
                'course_code' => 'IF305',
                'course_name' => 'Database Systems',
                'class' => 'B',
                'day' => 'Wednesday',
                'time' => '10:00 - 11:40',
                'room' => 'Room 204',
            ],
        ];

        return view('pages.lecturer.teaching', [
            'teachings' => $teachings,
        ]);
    }

    public function edit(int $id)
    {

        $teaching = [
            'id' => $id,
            'course_code' => 'IF204',
            'course_name' => 'Software Engineering',
            'class' => 'A',
            'day' => 'Tuesday',
            'time' => '08:00 - 09:40',
            'room' => 'Lab 301',
        ];

        return view('pages.lecturer.teaching-edit', [
            'teaching' => $teaching,
        ]);
    }

    public function store(Request $request)
    {
        return redirect()
            ->back()
            ->with('success', 'Teaching schedule saved successfully.');
    }
}
