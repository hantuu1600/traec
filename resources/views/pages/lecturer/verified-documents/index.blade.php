@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">

        {{-- Header --}}
        <div>
            <h1 class="text-3xl font-bold text-base-content">✅ Verified Documents</h1>
            <p class="text-base-content/60 mt-1">Semua aktivitas yang telah diverifikasi oleh admin</p>
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div class="card bg-base-100 border border-base-300">
                <div class="card-body p-4">
                    <div class="text-sm text-base-content/60">Total Verified</div>
                    <div class="text-2xl font-bold text-success">{{ $stats['total'] }}</div>
                </div>
            </div>
            <div class="card bg-base-100 border border-base-300">
                <div class="card-body p-4">
                    <div class="text-sm text-base-content/60">Teaching</div>
                    <div class="text-2xl font-bold">{{ $stats['teaching'] }}</div>
                </div>
            </div>
            <div class="card bg-base-100 border border-base-300">
                <div class="card-body p-4">
                    <div class="text-sm text-base-content/60">Research</div>
                    <div class="text-2xl font-bold">{{ $stats['research'] }}</div>
                </div>
            </div>
            <div class="card bg-base-100 border border-base-300">
                <div class="card-body p-4">
                    <div class="text-sm text-base-content/60">Community</div>
                    <div class="text-2xl font-bold">{{ $stats['community'] }}</div>
                </div>
            </div>
            <div class="card bg-base-100 border border-base-300">
                <div class="card-body p-4">
                    <div class="text-sm text-base-content/60">Support</div>
                    <div class="text-2xl font-bold">{{ $stats['support'] }}</div>
                </div>
            </div>
        </div>

        {{-- Filter Tabs --}}
        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-4">
                <div class="tabs tabs-boxed bg-base-200">
                    <a href="{{ route('lecturer.verified-documents.index', ['category' => 'all']) }}"
                        class="tab {{ $currentCategory == 'all' ? 'tab-active' : '' }}">All</a>
                    <a href="{{ route('lecturer.verified-documents.index', ['category' => 'teaching']) }}"
                        class="tab {{ $currentCategory == 'teaching' ? 'tab-active' : '' }}">Teaching</a>
                    <a href="{{ route('lecturer.verified-documents.index', ['category' => 'research']) }}"
                        class="tab {{ $currentCategory == 'research' ? 'tab-active' : '' }}">Research</a>
                    <a href="{{ route('lecturer.verified-documents.index', ['category' => 'community']) }}"
                        class="tab {{ $currentCategory == 'community' ? 'tab-active' : '' }}">Community Service</a>
                    <a href="{{ route('lecturer.verified-documents.index', ['category' => 'support']) }}"
                        class="tab {{ $currentCategory == 'support' ? 'tab-active' : '' }}">Support</a>
                </div>
            </div>
        </div>

        {{-- Activities Table --}}
        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-0">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr class="text-base-content/70">
                                <th>Category</th>
                                <th>Activity Title</th>
                                <th>Period</th>
                                <th>Verified Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($activities as $activity)
                                <tr class="hover">
                                    <td>
                                        <span class="badge badge-success badge-outline">
                                            {{ $activity['category'] }}
                                        </span>
                                    </td>
                                    <td class="font-semibold">
                                        <div class="max-w-md truncate">{{ $activity['title'] }}</div>
                                    </td>
                                    <td class="text-base-content/80">{{ $activity['period'] }}</td>
                                    <td class="text-base-content/70">{{ $activity['date'] }}</td>
                                    <td>
                                        @php
                                            $viewRoute = match ($activity['category']) {
                                                'Teaching' => route('lecturer.teaching.show', $activity['id']),
                                                'Research' => route('lecturer.research.show', $activity['id']),
                                                'Community Service' => route('lecturer.community-service.show', $activity['id']),
                                                'Support' => route('lecturer.support.show', $activity['id']),
                                                default => '#'
                                            };
                                        @endphp
                                        <a href="{{ $viewRoute }}" class="btn btn-sm btn-ghost">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-10 text-base-content/60">
                                        Belum ada dokumen yang diverifikasi.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if($activities->hasPages())
                    <div class="p-4 border-t border-base-300">
                        {{ $activities->links() }}
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection