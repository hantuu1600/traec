@extends('layouts.dashboard-lecturer-layout')

@section('content')
    @php
        $q = $filters['q'] ?? request('q', '');
        $semester = $filters['semester'] ?? request('semester', '');
        $status = $filters['status'] ?? request('status', '');
    @endphp

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">

        <div class="flex flex-col gap-3 lg:flex-row lg:items-end lg:justify-between">
            <div class="space-y-1">
                <h1 class="text-2xl font-semibold text-secondary">Teaching Schedule</h1>
                <p class="text-sm text-base-content/60">
                    Manage and review your teaching schedules for each semester.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('lecturer.teaching.create') }}" class="btn btn-primary btn-sm">
                    Add Teaching
                </a>
            </div>
        </div>

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-4 lg:p-6 space-y-4">

                <form method="GET" class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">

                    <div class="join w-full lg:w-auto">
                        <input type="text" name="q" value="{{ $q }}"
                            class="input input-bordered join-item w-full lg:w-80"
                            placeholder="Search course, program, semester, year..." />
                        <button class="btn join-item" type="submit">Search</button>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                        <select name="semester" class="select select-bordered w-full sm:w-60" onchange="this.form.submit()">
                            <option value="" {{ $semester === '' ? 'selected' : '' }}>All Semester</option>
                            <option value="2025/2026 Ganjil" {{ $semester === '2025/2026 Ganjil' ? 'selected' : '' }}>
                                2025/2026 Ganjil
                            </option>
                            <option value="2025/2026 Genap" {{ $semester === '2025/2026 Genap' ? 'selected' : '' }}>
                                2025/2026 Genap
                            </option>
                        </select>

                        <select name="status" class="select select-bordered w-full sm:w-44" onchange="this.form.submit()">
                            <option value="" {{ $status === '' ? 'selected' : '' }}>All Status</option>
                            <option value="Draft" {{ $status === 'Draft' ? 'selected' : '' }}>Draft</option>
                            <option value="Submitted" {{ $status === 'Submitted' ? 'selected' : '' }}>Submitted</option>
                            <option value="Returned" {{ $status === 'Returned' ? 'selected' : '' }}>Returned</option>
                            <option value="Verified" {{ $status === 'Verified' ? 'selected' : '' }}>Verified</option>
                        </select>

                        @if ($q || $semester || $status)
                            <a href="{{ route('lecturer.teaching.index') }}" class="btn btn-ghost">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>

                @if ($teachings->count() > 0)
                    <div class="overflow-x-auto rounded-box border border-base-300">
                        <table class="table table-zebra bg-base-100">
                            <thead>
                                <tr>
                                    <th class="w-[36%]">Course</th>
                                    <th>Semester</th>
                                    <th>Year</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($teachings as $teaching)
                                    <tr>
                                        <td>
                                            <div class="font-medium">{{ $teaching->course_name }}</div>
                                            <div class="text-sm text-base-content/60 line-clamp-1">
                                                {{ $teaching->study_program }}
                                            </div>
                                        </td>
                                        <td>{{ $teaching->semester }}</td>
                                        <td>{{ $teaching->year }}</td>
                                        <td>
                                            <x-status-badge :status="$teaching->status" />
                                        </td>
                                        <td class="text-right">
                                            <div class="inline-flex items-center gap-2">
                                                <a href="{{ route('lecturer.teaching.show', $teaching->id) }}"
                                                    class="btn btn-ghost btn-xs">
                                                    Detail
                                                </a>

                                                @if (strtolower($teaching->status) !== 'verified')
                                                    <a href="{{ route('lecturer.teaching.request.edit', $teaching->id) }}"
                                                        class="btn btn-outline btn-xs">
                                                        Request Update
                                                    </a>
                                                @else
                                                    <button class="btn btn-ghost btn-xs" disabled
                                                        title="Verified items are locked">
                                                        Locked
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="flex items-center justify-end">
                        {{ $teachings->links() }}
                    </div>
                @else
                    <div class="rounded-box border border-base-300 bg-base-100 p-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div class="space-y-1">
                                <div class="text-lg font-semibold text-secondary">No teaching schedules found</div>
                                <div class="text-sm text-base-content/60">
                                    Try adjusting your search/filter, or add a new teaching schedule.
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <a href="{{ route('lecturer.teaching.index') }}" class="btn btn-ghost">Reset</a>
                                <a href="{{ route('lecturer.teaching.create') }}" class="btn btn-primary">Add Teaching</a>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>

    </div>
@endsection
