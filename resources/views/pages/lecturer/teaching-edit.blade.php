@extends('layouts.dashboard-lecturer-layout')

@section('content')
<div class="w-full max-w-4xl mx-auto space-y-6">

    <x-lecturer-page-header
        title="Edit Teaching Schedule"
        description="Update your teaching schedule information."
    />

    <x-teaching-card>
        <x-teaching-form />
    </x-teaching-card>

    {{-- Action Buttons --}}
    <div class="flex justify-end gap-4 pb-10">
        <a
            href="{{ route('lecturer.teaching.index') }}"
            class="btn btn-outline btn-secondary"
        >
            Cancel
        </a>

        <button
            form="teaching-edit-form"
            type="submit"
            class="btn btn-primary text-white font-semibold"
        >
            Save Changes
        </button>
    </div>

</div>
@endsection
