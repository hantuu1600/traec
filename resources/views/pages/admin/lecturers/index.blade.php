@extends('layouts.dashboard-admin-layout')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manage Lecturers</h1>
            <p class="text-gray-500 text-sm">Validate, add, and manage all lecturer data.</p>
        </div>
        <a href="{{ route('admin.lecturers.create') }}" class="btn btn-primary text-white">
            + Add Lecturer
        </a>
    </div>

    {{-- Search --}}
    <div class="mb-4">
        <form action="{{ route('admin.lecturers.index') }}" method="GET" class="flex gap-2">
            <input type="text" name="q" placeholder="Search by name, NIDN, or study program..." value="{{ request('q') }}"
                class="input input-bordered w-full max-w-sm" />
            <button type="submit" class="btn">Search</button>
        </form>
    </div>

    {{-- Table --}}
    <div class="card bg-base-100 shadow-sm border border-base-200">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr class="bg-base-200">
                        <th class="w-12">No</th>
                        <th>NIDN</th>
                        <th>Lecturer's Name</th>
                        <th>Study Program</th>
                        <th>Email</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lecturers as $lecturer)
                        <tr class="hover:bg-base-50">
                            <th>{{ $loop->iteration + $lecturers->firstItem() - 1 }}</th>
                            <td class="font-mono text-sm">{{ $lecturer->nidn }}</td>
                            <td class="font-bold">{{ $lecturer->name }}</td>
                            <td>{{ $lecturer->prodi }}</td>
                            <td class="text-sm opacity-75">{{ $lecturer->email }}</td>
                            <td class="text-right flex justify-end gap-2">
                                <a href="{{ route('admin.lecturers.edit', $lecturer->id) }}"
                                    class="btn btn-xs btn-outline btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('admin.lecturers.destroy', $lecturer->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this lecturer? The data will be soft-deleted.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-outline btn-error">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-8 text-gray-500">
                                No lecturer data found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="p-4 border-t border-base-200">
            {{ $lecturers->links() }}
        </div>
    </div>
@endsection