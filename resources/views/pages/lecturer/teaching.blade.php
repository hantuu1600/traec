@extends('layouts.dashboard-lecturer-layout')

@section('content')
<div class="w-full max-w-7xl mx-auto space-y-6">

    <x-lecturer-page-header
        title="Teaching Schedule"
        description="Manage and review your teaching schedules for each semester."
    />

    <x-teaching-table>
        {{-- Table Header --}}
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-bold text-secondary">
                    Schedule List
                </h2>
                <p class="text-sm text-secondary/60">
                    List of courses you are currently teaching.
                </p>
            </div>
        </div>

        {{-- Table Rows --}}
        @foreach ($teachings as $teaching)
            <x-teaching-row
                :number="$loop->iteration"
                :id="$teaching->id"
                :courseName="$teaching->course_name"
                :studyProgram="$teaching->study_program"
                :semester="$teaching->semester"
                :credits="$teaching->credits"
                :meetingsTotal="$teaching->meetings_total"
                :startDate="$teaching->start_date"
                :endDate="$teaching->end_date"
                :year="$teaching->year"
                :status="$teaching->status"
            />
        @endforeach

    </x-teaching-table>

</div>
@endsection
