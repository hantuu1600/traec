@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto space-y-6 p-6">

        {{-- Header --}}
        <div class="flex items-start justify-between gap-4">
            <x-lecturer-page-header title="Detail Pengajaran" description="Lihat detail lengkap jadwal pengajaran Anda." />
            <div class="flex gap-2">
                <a href="{{ route('lecturer.teaching.index') }}" class="btn btn-ghost">
                    Kembali
                </a>
                @if(in_array($teaching->status, ['DRAFT', 'REJECTED']))
                    <a href="{{ route('lecturer.teaching.edit', $teaching->id) }}" class="btn btn-outline btn-warning">
                        Edit Data
                    </a>
                @elseif($teaching->status == 'VERIFIED')
                    <a href="{{ route('lecturer.teaching.request.edit', $teaching->id) }}" class="btn btn-outline btn-sm">
                        Request Edit
                    </a>
                @endif
            </div>
        </div>

        {{-- Main Info Card --}}
        <div class="card bg-base-100 shadow-sm border border-base-300">
            <div class="card-body">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <div class="text-sm opacity-60">Mata Kuliah</div>
                        <div class="font-semibold text-lg">{{ $teaching->course_name }}</div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Program Studi</div>
                        <div class="font-semibold">{{ $teaching->study_program }}</div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Semester</div>
                        <div class="font-semibold">{{ $teaching->semester }}</div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">SKS</div>
                        <div class="font-semibold">{{ $teaching->credits }}</div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Total Pertemuan</div>
                        <div class="font-semibold">{{ $teaching->meetings_total }}</div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Tahun Akademik</div>
                        <div class="font-semibold">{{ $teaching->year }}</div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Tanggal Mulai</div>
                        <div class="font-semibold">{{ $teaching->start_date ?? '-' }}</div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Tanggal Selesai</div>
                        <div class="font-semibold">{{ $teaching->end_date ?? '-' }}</div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Status</div>
                        <div class="mt-1">
                            @php
                                $status = strtoupper($teaching->status);
                                $badge = match ($status) {
                                    'DRAFT' => 'badge-ghost',
                                    'SUBMITTED' => 'badge-info',
                                    'VERIFIED' => 'badge-success',
                                    'REJECTED' => 'badge-error',
                                    default => 'badge-ghost'
                                };
                            @endphp
                            <span class="badge {{ $badge }} badge-lg">{{ $teaching->status }}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Evidence Section --}}
        <div class="card bg-base-100 shadow-sm border border-base-300">
            <div class="card-body space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="font-bold text-lg">Bukti Kegiatan</h3>
                        <p class="text-sm opacity-70">Unggah dokumen pendukung (SK, Absensi, Nilai, dll).</p>
                    </div>
                    @if(in_array(strtoupper($teaching->status), ['DRAFT', 'REJECTED']))
                        <button onclick="uploadModal.showModal()" class="btn btn-primary btn-sm text-white">
                            + Unggah Bukti
                        </button>
                    @endif
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead>
                            <tr>
                                <th class="w-12">#</th>
                                <th>Nama File</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($evidences as $index => $evidence)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $evidence->file_path) }}" target="_blank"
                                            class="link link-primary no-underline hover:underline font-medium">
                                            {{ $evidence->file_name }}
                                        </a>
                                    </td>
                                    <td>{{ $evidence->description ?? '-' }}</td>
                                    <td>
                                        @if(in_array(strtoupper($teaching->status), ['DRAFT', 'REJECTED']))
                                            <form
                                                action="{{ route('lecturer.teaching.evidence.delete', ['id' => $teaching->id, 'evidenceId' => $evidence->id]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus bukti ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-error btn-outline">Hapus</button>
                                            </form>
                                        @else
                                            <span class="text-xs text-base-content/50">Terkunci</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-6 text-base-content/60">
                                        Belum ada bukti yang diunggah.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Action Bar --}}
                @if(in_array(strtoupper($teaching->status), ['DRAFT', 'REJECTED']))
                    <div class="pt-4 border-t border-base-200 flex justify-end">
                        <form action="{{ route('lecturer.teaching.submit', $teaching->id) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin mengajukan data ini? Data tidak dapat diubah setelah diajukan.');">
                            @csrf
                            <button type="submit" class="btn btn-success text-white font-bold" {{ $evidences->isEmpty() ? 'disabled' : '' }}>
                                Ajukan Verifikasi
                            </button>
                        </form>
                    </div>
                    @if($evidences->isEmpty())
                        <p class="text-xs text-error text-right mt-1">* Harap unggah minimal 1 bukti untuk mengajukan.</p>
                    @endif
                @endif

            </div>
        </div>

    </div>

    {{-- Upload Modal --}}
    <dialog id="uploadModal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Unggah Bukti Kegiatan</h3>
            <p class="py-2 text-sm">Format: PDF, JPG, PNG. Maksimal 2MB.</p>

            <form action="{{ route('lecturer.teaching.evidence.upload', $teaching->id) }}" method="POST"
                enctype="multipart/form-data" class="space-y-4 mt-4">
                @csrf

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Pilih File</span>
                    </label>
                    <input type="file" name="evidence_file" class="file-input file-input-bordered w-full"
                        accept=".pdf,.jpg,.jpeg,.png" required />
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Keterangan (Opsional)</span>
                    </label>
                    <input type="text" name="description" placeholder="Contoh: SK Mengajar"
                        class="input input-bordered w-full" />
                </div>

                <div class="modal-action">
                    <button type="button" class="btn" onclick="uploadModal.close()">Batal</button>
                    <button type="submit" class="btn btn-primary text-white">Unggah</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
@endsection