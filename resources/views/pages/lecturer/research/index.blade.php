@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">

        <div class="flex flex-col gap-3 lg:flex-row lg:items-end lg:justify-between">
            <x-lecturer-page-header title="Research Activities" description="Manage and review your researches." />

            <a href="{{ route('lecturer.research.create') }}" class="btn btn-primary btn-sm">
                + Add Research
            </a>
        </div>

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-4 lg:p-6 space-y-4">

                @if ($researchs->count() > 0)
                    <x-research-table>
                        @foreach ($researchs as $research)
                            <x-research-row :number="$loop->iteration" :id="$research->id" :title="$research->title" :typeId="$research->type_id"
                                :rankId="$research->rank_id" :role="$research->role" :publisher="$research->publisher" :year="$research->year" :doi="$research->doi"
                                :link="$research->link" :status="$research->status" />
                        @endforeach
                    </x-research-table>
                @else
                    <div class="rounded-box border border-base-300 bg-base-100 p-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div class="space-y-1">
                                <div class="text-lg font-semibold text-secondary">No research records yet</div>
                                <div class="text-sm text-base-content/60">
                                    Add your first research activity to start tracking progress.
                                </div>
                            </div>
                            <a href="{{ route('lecturer.research.create') }}" class="btn btn-primary">
                                + Add Research
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        </div>

        @foreach ($researchs as $research)
            <input type="checkbox" id="research-member-modal-{{ $research->id }}" class="modal-toggle" />

            <div class="modal">
                <div class="modal-box max-w-lg">
                    <h3 class="font-bold text-lg text-secondary">Research Members</h3>

                    <p class="text-sm text-base-content/60 mb-4">
                        {{ $research->title }}
                    </p>

                    <div class="overflow-x-auto rounded-box border border-base-300">
                        <table class="table table-sm bg-base-100">
                            <thead>
                                <tr>
                                    <th class="w-14">No</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($members[$research->id] ?? [] as $member)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="font-medium">{{ $member->name }}</td>
                                        <td class="text-base-content/70">{{ $member->role }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-base-content/60 py-6">
                                            No members added.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="modal-action">
                        <label for="research-member-modal-{{ $research->id }}" class="btn btn-sm">
                            Close
                        </label>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
