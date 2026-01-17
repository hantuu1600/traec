@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="w-full max-w-7xl mx-auto space-y-6 p-6">

        {{-- Header --}}
        <div class="flex items-start justify-between gap-4">
            <x-lecturer-page-header title="Detail Penelitian" description="Lihat detail lengkap data penelitian Anda." />
            <div class="flex gap-2">
                <a href="{{ route('lecturer.research.index') }}" class="btn btn-ghost">
                    Back
                </a>
                @if(in_array(strtoupper($research->status), ['DRAFT', 'REJECTED']))
                    <a href="{{ route('lecturer.research.edit', $research->id) }}" class="btn btn-outline btn-warning">
                        Edit Data
                    </a>
                @elseif(strtoupper($research->status) == 'VERIFIED')
                    <a href="{{ route('lecturer.research.request.edit', $research->id) }}" class="btn btn-outline btn-sm">
                        Request Edit
                    </a>
                @endif
            </div>
        </div>

        {{-- Main Info Card --}}
        <div class="card bg-base-100 shadow-sm border border-base-300">
            <div class="card-body">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="md:col-span-2">
                        <div class="text-sm opacity-60">Research Title</div>
                        <div class="font-semibold text-lg">{{ $research->title }}</div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Jenis Penelitian</div>
                        <div class="font-semibold">{{ $research->type_id }}</div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Tingkat / Rank</div>
                        <div class="font-semibold">{{ $research->rank_id }}</div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Peran</div>
                        <div class="font-semibold">{{ $research->role }}</div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Penerbit</div>
                        <div class="font-semibold">{{ $research->publisher ?? '-' }}</div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Tahun</div>
                        <div class="font-semibold">{{ $research->year }}</div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">DOI</div>
                        <div class="font-semibold">{{ $research->doi ?? '-' }}</div>
                    </div>

                    <div class="md:col-span-2">
                        <div class="text-sm opacity-60">Link Publikasi</div>
                        @if($research->link)
                            <a href="{{ $research->link }}" target="_blank"
                                class="link link-primary no-underline hover:underline truncate block">
                                {{ $research->link }}
                            </a>
                        @else
                            <div class="font-semibold">-</div>
                        @endif
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Status</div>
                        <div class="mt-1">
                            @php
                                $status = strtoupper($research->status);
                                $badge = match ($status) {
                                    'DRAFT' => 'badge-ghost',
                                    'SUBMITTED' => 'badge-info',
                                    'VERIFIED' => 'badge-success',
                                    'REJECTED' => 'badge-error',
                                    default => 'badge-ghost'
                                };
                            @endphp
                            <span class="badge {{ $badge }} badge-lg">{{ $research->status }}</span>
                        </div>
                    </div>

                </div>

                {{-- Members Section --}}
                <div class="mt-8 border-t border-base-200 pt-6">
                    <h3 class="font-bold text-md mb-4">Anggota Peneliti</h3>
                    <div class="overflow-x-auto border rounded-lg border-base-200">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Anggota</th>
                                    <th>Peran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($members as $index => $member)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->role }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-base-content/60">
                                            Tidak ada anggota tambahan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
                        <p class="text-sm opacity-70">Unggah dokumen pendukung (Jurnal, Sertifikat, dll).</p>
                    </div>
                    @if(in_array(strtoupper($research->status), ['DRAFT', 'REJECTED']))
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
                                        @if(in_array(strtoupper($research->status), ['DRAFT', 'REJECTED']))
                                            <form
                                                action="{{ route('lecturer.research.evidence.delete', ['id' => $research->id, 'evidenceId' => $evidence->id]) }}"
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
                @if(in_array(strtoupper($research->status), ['DRAFT', 'REJECTED']))
                    <div class="pt-4 border-t border-base-200 flex justify-end">
                        <form action="{{ route('lecturer.research.submit', $research->id) }}" method="POST"
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

            <form action="{{ route('lecturer.research.evidence.upload', $research->id) }}" method="POST"
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
                    <input type="text" name="description" placeholder="Contoh: File Jurnal PDF"
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