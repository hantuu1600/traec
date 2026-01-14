@extends('layouts.dashboard-lecturer-layout')

@section('content')
<div class="w-full max-w-7xl mx-auto space-y-8">

    {{-- Page Header --}}
    <x-lecturer-page-header
        title="Edit Research Activity"
        description="Update your research or publication information."
    />

    {{-- Form Container --}}
    <div class="card bg-base-100 shadow-sm border border-base-300">
        <div class="card-body px-6 py-6 space-y-6">
            <x-research-form :research="$research" />
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="flex items-center justify-end gap-4 pt-2 pb-10">
        <a
            href="{{ route('lecturer.research.index') }}"
            class="btn btn-outline btn-secondary"
        >
            Cancel
        </a>

        <button
            form="research-edit-form"
            type="submit"
            class="btn btn-primary text-white font-semibold"
        >
            Save Changes
        </button>
    </div>

</div>
@endsection
