@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">

        <x-lecturer-page-header title="Edit Community Service" description="Update community service activity data." />

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-4 lg:p-6 space-y-6">
                <x-community-form :activity="$activity" />
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('lecturer.community-service.index') }}" class="btn btn-outline btn-secondary">
                Cancel
            </a>

            <button form="community-form" type="submit" class="btn btn-primary">
                Save Changes
            </button>
        </div>

    </div>
@endsection