@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">
        <x-lecturer-page-header title="Support Activity" description="Manage your academic support activities." />

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-0">
                <div class="p-4 border-b border-base-200 flex justify-between items-center bg-base-100 rounded-t-box">
                    <form method="GET" class="join">
                        <input type="text" name="search" class="input input-bordered join-item w-64"
                            placeholder="Cari kegiatan..." value="{{ request('search') }}">
                        <button class="btn btn-primary join-item">Search</button>
                    </form>
                    <a href="{{ route('lecturer.support.create') }}" class="btn btn-primary">+ Add Support Activity</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead>
                            <tr class="bg-base-200">
                                <th class="w-16 text-center">No</th>
                                <th>Types & Roles</th>
                                <th>Description</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center w-24">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($activities as $key => $item)
                                <tr class="hover">
                                    <td class="text-center font-medium opacity-60">{{ $activities->firstItem() + $key }}</td>
                                    <td>
                                        <div class="font-bold">{{ $item->type }}</div>
                                        <div class="text-xs opacity-60">{{ $item->role }}</div>
                                    </td>
                                    <td>
                                        <div class="truncate max-w-xs text-sm" title="{{ $item->description }}">
                                            {{ $item->description }}
                                        </div>
                                    </td>
                                    <td class="text-center text-sm">
                                        {{ \Carbon\Carbon::parse($item->activity_date)->format('d M Y') }}
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="badge {{ $item->status == 'VERIFIED' ? 'badge-success' : ($item->status == 'REJECTED' ? 'badge-error' : ($item->status == 'SUBMITTED' ? 'badge-info' : 'badge-ghost')) }}">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="join">
                                            <a href="{{ route('lecturer.support.show', $item->id) }}"
                                                class="btn btn-xs btn-outline join-item">Detail</a>
                                            @if(in_array($item->status, ['DRAFT', 'REJECTED']))
                                                <a href="{{ route('lecturer.support.edit', $item->id) }}"
                                                    class="btn btn-xs btn-ghost join-item text-warning">Edit</a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-8 opacity-50">There is no data on supporting activities yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-base-200">{{ $activities->links() }}</div>
            </div>
        </div>
    </div>
@endsection