@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 space-y-6">

        <x-lecturer-page-header title="Community Service"
            description="Manage community service activities (PKM)." />

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-0">
                <div class="p-4 border-b border-base-200 flex flex-col sm:flex-row gap-4 justify-between items-center">
                    <form method="GET" class="join w-full sm:w-auto">
                        <input type="text" name="search" class="input input-bordered join-item w-full sm:w-64"
                            placeholder="Search services..." value="{{ request('search') }}">
                        <select name="status" class="select select-bordered join-item" onchange="this.form.submit()">
                            <option value="ALL">All Status</option>
                            <option value="DRAFT" {{ request('status') == 'DRAFT' ? 'selected' : '' }}>Draft</option>
                            <option value="SUBMITTED" {{ request('status') == 'SUBMITTED' ? 'selected' : '' }}>Submitted
                            </option>
                            <option value="VERIFIED" {{ request('status') == 'VERIFIED' ? 'selected' : '' }}>Verified
                            </option>
                            <option value="REJECTED" {{ request('status') == 'REJECTED' ? 'selected' : '' }}>Rejected
                            </option>
                        </select>
                        <button class="btn btn-primary join-item">Cari</button>
                    </form>

                    <a href="{{ route('lecturer.community-service.create') }}" class="btn btn-primary">
                        + Add Community Service
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead>
                            <tr class="bg-base-200 text-base-content/70">
                                <th class="w-16 text-center">No</th>
                                <th>Activity Title</th>
                                <th>Partner & Location</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center w-24">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($activities as $key => $item)
                                <tr class="hover">
                                    <td class="text-center font-medium opacity-60">
                                        {{ $activities->firstItem() + $key }}
                                    </td>
                                    <td>
                                        <div class="font-bold truncate max-w-xs" title="{{ $item->title }}">
                                            {{ $item->title }}
                                        </div>
                                        <div class="text-xs text-base-content/60">{{ $item->role }}</div>
                                    </td>
                                    <td>
                                        <div class="text-sm">{{ $item->partner ?? '-' }}</div>
                                        <div class="text-xs text-base-content/60">{{ $item->location ?? '-' }}</div>
                                    </td>
                                    <td class="text-center text-sm">
                                        @if ($item->start_date)
                                            {{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $badges = [
                                                'DRAFT' => 'badge-ghost',
                                                'SUBMITTED' => 'badge-info',
                                                'VERIFIED' => 'badge-success',
                                                'REJECTED' => 'badge-error',
                                            ];
                                            $labels = [
                                                'DRAFT' => 'Draft',
                                                'SUBMITTED' => 'Submitted',
                                                'VERIFIED' => 'Verified',
                                                'REJECTED' => 'Rejected',
                                            ];
                                        @endphp
                                        <div class="badge {{ $badges[$item->status] ?? 'badge-ghost' }} gap-1">
                                            {{ $labels[$item->status] ?? $item->status }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="join">
                                            <a href="{{ route('lecturer.community-service.show', $item->id) }}"
                                                class="btn btn-xs btn-outline join-item">
                                                Detail
                                            </a>
                                            @if (in_array($item->status, ['DRAFT', 'REJECTED']))
                                                <a href="{{ route('lecturer.community-service.edit', $item->id) }}"
                                                    class="btn btn-xs btn-ghost join-item text-warning">
                                                    Edit
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-8 text-base-content/60">
                                        There is no community service data yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-base-200">
                    {{ $activities->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection