@extends('layouts.dashboard-admin-layout')

@section('content')
    <div class="w-full max-w-2xl mx-auto py-6">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.logs.index') }}" class="btn btn-circle btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5" />
                    <path d="M12 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold">Detail Log #{{ $log->id }}</h1>
        </div>

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body">
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="text-xs font-bold uppercase opacity-50">Waktu</label>
                        <p class="font-mono">{{ \Carbon\Carbon::parse($log->created_at)->format('d F Y, H:i:s') }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold uppercase opacity-50">User</label>
                        <p class="font-bold">{{ $log->user_name }}</p>
                        <p class="text-sm opacity-60">{{ $log->user_email }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold uppercase opacity-50">Action</label>
                        <p><span class="badge badge-primary">{{ $log->action }}</span></p>
                    </div>
                    <div>
                        <label class="text-xs font-bold uppercase opacity-50">Description</label>
                        <div class="p-3 bg-base-200 rounded-lg font-mono text-sm whitespace-pre-wrap">
                            {{ $log->description }}</div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-bold uppercase opacity-50">IP Address</label>
                            <p class="font-mono">{{ $log->ip_address ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-xs font-bold uppercase opacity-50">User Agent</label>
                            <p class="text-xs break-all">{{ $log->user_agent ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection