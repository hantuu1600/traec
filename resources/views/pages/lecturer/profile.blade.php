@extends('layouts.dashboard-lecturer-layout')

@section('content')
<div class="w-full max-w-6xl mx-auto space-y-6">

    <div>
        <h1 class="text-2xl md:text-3xl font-extrabold text-secondary mt-7">My Profile</h1>
        <p class="text-sm text-secondary/70">
            Complete your personal and academic information for verification purposes.
        </p>
    </div>

    <div class="space-y-6 pb-5">
        <x-lecturer-profile-card />
        <x-lecturer-profile />

        <div class="flex items-center gap-4 pb-10 justify-end">
            <a href="#" class="btn btn-outline btn-secondary">Cancel</a>
            <button form="lecturer-profile" type="submit" class="btn btn-primary text-white font-semibold">
                Save Changes
            </button>
        </div>
    </div>

</div>
@endsection
