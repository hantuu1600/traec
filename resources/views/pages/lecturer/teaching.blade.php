@extends('layouts.dashboard-lecturer-layout')

@section('content')
<div class="w-full max-w-6xl mx-auto space-y-6">

    <x-lecturer-page-header
        title="Teaching Schedule"
        description="Manage and review your teaching schedules for each semester."
    />

    <x-teaching-card>

        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-bold text-secondary">
                    Schedule List
                </h2>
                <p class="text-sm text-secondary/60">
                    List of courses you are currently teaching.
                </p>
            </div>

            <a href="#" class="btn btn-primary btn-sm text-white">
                + Add Schedule
            </a>
        </div>

        <x-teaching-table>
            @foreach ($teachings as $teaching)
                <x-teaching-row
                    :id="$teaching['id']"
                    :courseCode="$teaching['course_code']"
                    :courseName="$teaching['course_name']"
                    :class="$teaching['class']"
                    :day="$teaching['day']"
                    :time="$teaching['time']"
                    :room="$teaching['room']"
                />
            @endforeach
        </x-teaching-table>

    </x-teaching-card>

</div>
@endsection
