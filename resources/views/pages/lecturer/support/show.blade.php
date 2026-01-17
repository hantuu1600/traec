@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-8">
        {{-- Header Status --}}
        <div class="flex justify-between items-start">
            <div>
                <h1 class="text-3xl font-bold text-base-content">{{ $activity->type }}</h1>
                <div class="flex items-center gap-2 mt-2">
                    <span
                        class="badge badge-lg {{ $activity->status == 'VERIFIED' ? 'badge-success' : ($activity->status == 'REJECTED' ? 'badge-error' : ($activity->status == 'SUBMITTED' ? 'badge-info' : 'badge-ghost')) }}">
                        {{ $activity->status }}
                    </span>
                    <span class="text-sm opacity-60 pl-2 border-l border-base-300">Created:
                        {{ \Carbon\Carbon::parse($activity->created_at)->format('d M Y') }}</span>
                </div>
            </div>
            @if(in_array($activity->status, ['DRAFT', 'REJECTED']))
                <a href="{{ route('lecturer.support.edit', $activity->id) }}" class="btn btn-warning btn-outline">Edit</a>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Info --}}
            <div class="md:col-span-2 card bg-base-100 border border-base-300">
                <div class="card-body">
                    <h3 class="font-bold text-lg mb-4 border-b pb-2">Informasi Detail</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs uppercase font-bold opacity-50">Peran</label>
                            <p class="font-medium text-lg">{{ $activity->role }}</p>
                        </div>
                        <div>
                            <label class="text-xs uppercase font-bold opacity-50">Tanggal Pelaksanaan</label>
                            <p class="font-medium text-lg">
                                {{ \Carbon\Carbon::parse($activity->activity_date)->format('d M Y') }}</p>
                        </div>
                        <div class="sm:col-span-2">
                            <label class="text-xs uppercase font-bold opacity-50">Deskripsi</label>
                            <p class="mt-1 leading-relaxed">{{ $activity->description }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Evidence --}}
            <div class="space-y-6">
                <div class="card bg-base-100 border border-base-300">
                    <div class="card-body">
                        <h3 class="font-bold text-lg mb-4">Bukti</h3>
                        <div class="space-y-3">
                            @forelse($evidences as $ev)
                                <div class="flex justify-between items-center p-2 bg-base-200 rounded">
                                    <a href="{{ Storage::url($ev->file_path) }}" target="_blank"
                                        class="link link-primary text-sm truncate w-40">{{ $ev->file_name }}</a>
                                    @if(in_array($activity->status, ['DRAFT', 'REJECTED']))
                                        <form
                                            action="{{ route('lecturer.support.evidence.delete', ['id' => $activity->id, 'evidenceId' => $ev->id]) }}"
                                            method="POST" onsubmit="return confirm('Hapus?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-xs btn-square btn-ghost text-error">X</button>
                                        </form>
                                    @endif
                                </div>
                            @empty
                                <div class="text-center text-sm opacity-50 py-4">Belum ada bukti</div>
                            @endforelse
                        </div>
                        @if(in_array($activity->status, ['DRAFT', 'REJECTED']))
                            <button onclick="upload_modal.showModal()" class="btn btn-sm btn-outline w-full mt-4">Unggah
                                Bukti</button>
                        @endif
                    </div>
                </div>

                {{-- Submit Action --}}
                <div class="card bg-base-100 border border-base-300">
                    <div class="card-body">
                        <h3 class="font-bold text-lg mb-2">Aksi</h3>
                        @if ($activity->status == 'DRAFT' || $activity->status == 'REJECTED')
                            <form action="{{ route('lecturer.support.submit', $activity->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-primary w-full" {{ $evidences->isEmpty() ? 'disabled' : '' }}>Ajukan
                                    Verifikasi</button>
                            </form>
                        @else
                            <div class="alert alert-info text-xs">Status: {{ $activity->status }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Upload Modal --}}
    <dialog id="upload_modal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Unggah Bukti</h3>
            <form action="{{ route('lecturer.support.evidence.upload', $activity->id) }}" method="POST"
                enctype="multipart/form-data" class="space-y-4 mt-4">
                @csrf
                <input type="file" name="evidence_file" class="file-input file-input-bordered w-full" required />
                <input type="text" name="description" class="input input-bordered w-full"
                    placeholder="Keterangan (Opsional)" />
                <div class="modal-action">
                    <button type="button" class="btn" onclick="upload_modal.close()">Batal</button>
                    <button type="submit" class="btn btn-primary">Unggah</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop"><button>close</button></form>
    </dialog>
@endsection