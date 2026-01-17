@extends('layouts.dashboard-admin-layout', ['title' => $title ?? 'Lecturers'])

@section('content')
    <div class="space-y-6">

        <x-search-dashboard :filters="$filters" placeholder="Search by name / NIDN / email"
            action="{{ route('admin.lecturers.index') }}" method="GET" filterName="filter" queryName="q" />

        <x-table-lecturers :rows="$rows" title="Lecturers" subtitle="Data from users table (role = LECTURER)" addUrl="#"
            filterName="filter" queryName="q" />

        <div class="flex justify-end">
            {{ $rows->links() }}
        </div>

    </div>
@endsection