@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-8">

        {{-- Header Status --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-base-content">{{ $activity->title }}</h1>
                <div class="flex flex-wrap items-center gap-2 mt-2">
                    <span class="badge badge-lg {{ $activity->status == 'VERIFIED' ? 'badge-success' : ($activity->status == 'REJECTED' ? 'badge-error' : ($activity->status == 'SUBMITTED' ? 'badge-info' : 'badge-ghost')) }}">
                        {{ $activity->status }}
                    </span>
                    <span class="text-sm text-base-content/60 border-l border-base-300 pl-2 ml-1">
                        Dibuat: {{ \Carbon\Carbon::parse($activity->created_at)->format('d M Y') }}
                    </span>
                </div>
            </div>

            @if(in_array($activity->status, ['DRAFT', 'REJECTED']))
                <a href="{{ route('lecturer.community-service.edit', $activity->id) }}" class="btn btn-outline btn-warning">
                    Edit Data
                </a>
            @endif
        </div>

        {{-- Details Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Main Info --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="card bg-base-100 border border-base-300">
                    <div class="card-body">
                        <h2 class="card-title text-lg border-b border-base-200 pb-2 mb-4">Informasi Kegiatan</h2>
                        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-4">
                            <div>
                                <dt class="text-xs text-base-content/60 uppercase font-semibold">Mitra Sasaran</dt>
                                <dd class="font-medium mt-1">{{ $activity->partner ?? '-' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs text-base-content/60 uppercase font-semibold">Lokasi</dt>
                                <dd class="font-medium mt-1">{{ $activity->location ?? '-' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs text-base-content/60 uppercase font-semibold">Tanggal Mulai</dt>
                                <dd class="font-medium mt-1">{{ $activity->start_date ? \Carbon\Carbon::parse($activity->start_date)->format('d M Y') : '-' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs text-base-content/60 uppercase font-semibold">Tanggal Selesai</dt>
                                <dd class="font-medium mt-1">{{ $activity->end_date ? \Carbon\Carbon::parse($activity->end_date)->format('d M Y') : '-' }}</dd>
                            </div>
                            <div class="sm:col-span-2">
                                <dt class="text-xs text-base-content/60 uppercase font-semibold">Peran Anda</dt>
                                <dd class="font-medium mt-1">{{ $activity->role ?? '-' }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                {{-- Members --}}
                <div class="card bg-base-100 border border-base-300">
                    <div class="card-body">
                        <h2 class="card-title text-lg border-b border-base-200 pb-2 mb-4">Anggota Tim</h2>
                        <div class="overflow-x-auto">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Peran</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($members as $member)
                                    <tr>
                                        <td class="font-medium">{{ $member->name_display }}</td>
                                        <td>{{ $member->role }}</td>
                                        <td><span class="badge badge-sm badge-ghost">{{ $member->type_display }}</span></td>
                                    </tr>
                                    @endforeach
                                    @if($members->isEmpty())
                                        <tr><td colspan="3" class="text-center text-base-content/50">Tidak ada anggota tim.</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar Evidence --}}
            <div class="space-y-6">
                 <div class="card bg-base-100 border border-base-300">
                    <div class="card-body">
                        <h2 class="card-title text-lg mb-4">Bukti Pendukung</h2>
                        
                        {{-- List Evidence --}}
                        <div class="space-y-3 mb-6">
                            @forelse($evidences as $ev)
                                <div class="flex items-start justify-between p-3 bg-base-200/50 rounded-lg group">
                                    <div class="overflow-hidden">
                                        <a href="{{ Storage::url($ev->file_path) }}" target="_blank" class="link link-primary font-medium truncate block">
                                            {{ $ev->file_name }}
                                        </a>
                                        @if($ev->description)
                                            <p class="text-xs text-base-content/60 mt-1 truncate">{{ $ev->description }}</p>
                                        @endif
                                        <div class="text-[10px] text-base-content/40 mt-1 uppercase">
                                            {{ $ev->created_at }}
                                        </div>
                                    </div>
                                    @if(in_array($activity->status, ['DRAFT', 'REJECTED']))
                                        <form action="{{ route('lecturer.community-service.evidence.delete', ['id' => $activity->id, 'evidenceId' => $ev->id]) }}" method="POST" onsubmit="return confirm('Hapus bukti ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-square btn-xs btn-ghost text-error opacity-0 group-hover:opacity-100 transition-opacity">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path></svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            @empty
                                <div class="text-center py-6 text-sm text-base-content/50 border-2 border-dashed border-base-200 rounded-box">
                                    Belum ada bukti diunggah.
                                </div>
                            @endforelse
                        </div>

                        {{-- Upload Form --}}
                        @if(in_array($activity->status, ['DRAFT', 'REJECTED']))
                            <button onclick="upload_modal.showModal()" class="btn btn-outline btn-sm w-full gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                Unggah Bukti
                            </button>
                        @endif
                    </div>
                </div>

                {{-- Action Card --}}
                <div class="card bg-base-100 border border-base-300">
                    <div class="card-body">
                         <h2 class="card-title text-lg mb-2">Aksi</h2>
                         
                         @if($activity->status == 'DRAFT')
                             <p class="text-sm text-base-content/60 mb-4">Pastikan data dan bukti sudah lengkap sebelum mengajukan verifikasi.</p>
                             <form action="{{ route('lecturer.community-service.submit', $activity->id) }}" method="POST">
                                 @csrf
                                 <button type="submit" class="btn btn-primary w-full" {{ $evidences->isEmpty() ? 'disabled' : '' }}>
                                     Ajukan Verifikasi
                                 </button>
                             </form>
                         @elseif($activity->status == 'REJECTED')
                             <div class="alert alert-error text-xs mb-4">
                                 <span>Ditolak. Silakan perbaiki dan ajukan ulang.</span>
                             </div>
                             <form action="{{ route('lecturer.community-service.submit', $activity->id) }}" method="POST">
                                 @csrf
                                 <button type="submit" class="btn btn-primary w-full" {{ $evidences->isEmpty() ? 'disabled' : '' }}>
                                     Ajukan Ulang
                                 </button>
                             </form>
                         @elseif($activity->status == 'SUBMITTED')
                             <div class="alert alert-info text-xs">
                                 <span>Menunggu verifikasi admin.</span>
                             </div>
                         @elseif($activity->status == 'VERIFIED')
                              <div class="alert alert-success text-xs">
                                 <span>Data telah diverifikasi.</span>
                             </div>
                         @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Upload Modal --}}
    <dialog id="upload_modal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Unggah Bukti Kegiatan</h3>
            <p class="py-2 text-sm text-base-content/70">Format: PDF, JPG, PNG (Max 2MB)</p>
            
            <form action="{{ route('lecturer.community-service.evidence.upload', $activity->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 mt-4">
                @csrf
                <div class="form-control">
                    <input type="file" name="evidence_file" class="file-input file-input-bordered w-full" required />
                </div>
                <div class="form-control">
                    <label class="label"><span class="label-text">Keterangan (Opsional)</span></label>
                    <input type="text" name="description" class="input input-bordered w-full" placeholder="Contoh: Laporan Akhir" />
                </div>
                <div class="modal-action">
                    <button type="button" class="btn" onclick="upload_modal.close()">Batal</button>
                    <button type="submit" class="btn btn-primary">Unggah</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

@endsection
