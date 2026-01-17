@extends('layouts.dashboard-admin-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-base-content">Manage Period</h1>
                <p class="text-sm text-base-content/60">Manage active reporting periods.</p>
            </div>
            <a href="{{ route('admin.periods.create') }}" class="btn btn-primary">+ Add Period</a>
        </div>

        <div class="card bg-base-100 border border-base-300">
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr class="bg-base-200">
                            <th>Period Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($periods as $period)
                            <tr>
                                <td class="font-bold">{{ $period->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($period->start_date)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($period->end_date)->format('d M Y') }}</td>
                                <td class="text-center">
                                    @if($period->is_active)
                                        <span class="badge badge-success gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                            Aktif
                                        </span>
                                    @else
                                        <form action="{{ route('admin.periods.activate', $period->id) }}" method="POST">
                                            @csrf @method('PUT')
                                            <button class="btn btn-xs btn-outline">Activate</button>
                                        </form>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="join">
                                        <a href="{{ route('admin.periods.edit', $period->id) }}"
                                            class="btn btn-xs join-item">Edit</a>
                                        @if(!$period->is_active)
                                            <form action="{{ route('admin.periods.destroy', $period->id) }}" method="POST"
                                                onsubmit="return confirm('Delete this period?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-xs btn-error join-item">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 opacity-50">No period data available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4">{{ $periods->links() }}</div>
        </div>
    </div>
@endsection