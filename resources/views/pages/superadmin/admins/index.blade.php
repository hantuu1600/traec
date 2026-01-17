@extends('layouts.dashboard-admin-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-base-content">Kelola Admin</h1>
                <p class="text-sm text-base-content/60">Tambah atau hapus akses admin sistem.</p>
            </div>
            <a href="{{ route('superadmin.admins.create') }}" class="btn btn-primary">+ Tambah Admin</a>
        </div>

        <div class="card bg-base-100 border border-base-300">
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr class="bg-base-200">
                            <th>Nama</th>
                            <th>Email</th>
                            <th class="text-center">Terdaftar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($admins as $admin)
                            <tr>
                                <td class="font-bold">{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td class="text-center text-sm opacity-60">
                                    {{ $admin->created_at->format('d M Y') }}
                                </td>
                                <td class="text-center">
                                    <div class="join">
                                        <a href="{{ route('superadmin.admins.edit', $admin->id) }}"
                                            class="btn btn-xs join-item">Edit</a>
                                        <form action="{{ route('superadmin.admins.destroy', $admin->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus akses admin ini?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-xs btn-error join-item">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 opacity-50">Belum ada admin lain.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4">{{ $admins->links() }}</div>
        </div>
    </div>
@endsection