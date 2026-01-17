@extends('layouts.dashboard-admin-layout')

@section('content')
    <div class="w-full max-w-lg mx-auto py-6">
        <div class="card bg-base-100 border border-base-300">
            <div class="card-body">
                <h2 class="card-title mb-4">Edit Periode</h2>
                <x-period-form :period="$period" />
            </div>
        </div>
    </div>
@endsection