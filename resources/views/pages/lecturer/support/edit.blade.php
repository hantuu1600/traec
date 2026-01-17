@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">
        <x-lecturer-page-header title="Edit Penunjang" description="Perbarui data kegiatan penunjang." />

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-6">
                <x-support-form :activity="$activity" />
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('lecturer.support.index') }}" class="btn btn-outline btn-secondary">Cancel</a>
            <button form="support-form" type="submit" class="btn btn-primary">Save Change</button>
        </div>
    </div>
@endsection