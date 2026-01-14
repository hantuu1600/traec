@extends('layouts.dashboard-lecturer-layout')

@section('content')
<div class="w-full max-w-7xl mx-auto space-y-6">

    {{-- Header --}}
    <div class="flex items-start justify-between gap-4">
        <x-lecturer-page-header
            title="Research Activities"
            description="Manage and review your researches."
        />

        <a
            href="{{ route('lecturer.research.create') }}"
            class="btn btn-primary btn-sm text-white mt-8"
        >
            + Add Research
        </a>
    </div>

    {{-- TABLE ONLY --}}
    <x-research-table>
        @foreach ($researchs as $research)
            <x-research-row
                :number="$loop->iteration"
                :id="$research->id"
                :title="$research->title"
                :typeId="$research->type_id"
                :rankId="$research->rank_id"
                :role="$research->role"
                :publisher="$research->publisher"
                :year="$research->year"
                :doi="$research->doi"
                :link="$research->link"
                :status="$research->status"
            />
        @endforeach
    </x-research-table>

    {{-- MODALS (OUTSIDE TABLE) --}}
    @foreach ($researchs as $research)

        <input
            type="checkbox"
            id="research-member-modal-{{ $research->id }}"
            class="modal-toggle"
        />

        <div class="modal">
            <div class="modal-box max-w-lg">

                <h3 class="font-bold text-lg">
                    Research Members
                </h3>

                <p class="text-sm text-secondary/70 mb-4">
                    {{ $research->title }}
                </p>

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($members[$research->id] ?? [] as $member)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->role }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-secondary/60">
                                    No members added.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="modal-action">
                    <label
                        for="research-member-modal-{{ $research->id }}"
                        class="btn btn-sm"
                    >
                        Close
                    </label>
                </div>

            </div>
        </div>

    @endforeach

</div>
@endsection
