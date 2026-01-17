@extends('layouts.dashboard-admin-layout', ['title' => $title ?? 'Documents'])

@section('content')
    <div class="space-y-6">

        <div class="flex flex-col gap-1">
            <h1 class="text-2xl font-semibold text-secondary">Document Requests</h1>
            <p class="text-sm text-base-content/60">Review submissions from lecturers and verify documents.</p>
        </div>

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-4 lg:p-6 space-y-4">
                <x-request-activity-table :rows="$rows" />

                <div class="flex justify-end">
                    {{ $rows->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
