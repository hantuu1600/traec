@extends('layouts.dashboard-admin-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-base-content">Activity Logs</h1>
                <p class="text-sm text-base-content/60">Pantau aktivitas pengguna sistem.</p>
            </div>
        </div>

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-0">
                <div class="p-4 border-b border-base-200">
                    <form method="GET">
                        <input type="text" name="search" class="input input-bordered w-full max-w-xs"
                            placeholder="Cari user atau aktivitas..." value="{{ request('search') }}">
                    </form>
                </div>
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full text-sm">
                        <thead>
                            <tr class="bg-base-200">
                                <th>Waktu</th>
                                <th>User</th>
                                <th>Aksi</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($logs as $log)
                                <tr>
                                    <td class="whitespace-nowrap text-base-content/60">
                                        {{ \Carbon\Carbon::parse($log->created_at)->format('Y-m-d H:i:s') }}
                                    </td>
                                    <td>
                                        <div class="font-bold">{{ $log->user_name }}</div>
                                        <div class="text-xs opacity-60">{{ $log->user_email }}</div>
                                    </td>
                                    <td><span class="badge badge-outline">{{ $log->action ?? 'LOG' }}</span></td>
                                    <td>
                                        <div class="truncate max-w-xs" title="{{ $log->description }}">
                                            {{ $log->description }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.logs.show', $log->id) }}"
                                            class="btn btn-xs btn-ghost">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 opacity-50">Tidak ada log.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4">{{ $logs->links() }}</div>
            </div>
        </div>
    </div>
@endsection