@props(['activity'])

<form id="community-form" method="POST"
    action="{{ $activity->id ? route('lecturer.community-service.update', $activity->id) : route('lecturer.community-service.store') }}"
    class="space-y-6">
    @csrf
    @if ($activity->id)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Title --}}
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Judul Kegiatan</span>
            </label>
            <input type="text" name="title" class="input input-bordered w-full"
                value="{{ old('title', $activity->title) }}" required placeholder="Nama kegiatan pengabdian">
        </div>

        {{-- Partner --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Mitra Sasaran</span>
            </label>
            <input type="text" name="partner" class="input input-bordered w-full"
                value="{{ old('partner', $activity->partner) }}" placeholder="Nama mitra / kelompok sasaran">
        </div>

        {{-- Location --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Lokasi</span>
            </label>
            <input type="text" name="location" class="input input-bordered w-full"
                value="{{ old('location', $activity->location) }}" placeholder="Tempat pelaksanaan">
        </div>

        {{-- Date Start --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Tanggal Mulai</span>
            </label>
            <input type="date" name="start_date" class="input input-bordered w-full"
                value="{{ old('start_date', $activity->start_date) }}">
        </div>

        {{-- Date End --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Tanggal Selesai</span>
            </label>
            <input type="date" name="end_date" class="input input-bordered w-full"
                value="{{ old('end_date', $activity->end_date) }}">
        </div>

        {{-- Role --}}
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Peran</span>
            </label>
            <input type="text" name="role" class="input input-bordered w-full"
                value="{{ old('role', $activity->role) }}" placeholder="Ketua / Anggota / Narasumber">
        </div>

        {{-- Members Section --}}
        <div class="md:col-span-2 space-y-3 pt-4 border-t border-base-200">
            <div class="flex items-center justify-between gap-3">
                <h3 class="text-md font-semibold text-secondary">Anggota Tim</h3>

                <button type="button" id="add-member-btn" class="btn btn-sm btn-outline btn-primary">
                    + Tambah Anggota
                </button>
            </div>

            <div class="overflow-x-auto rounded-box border border-base-300">
                <table class="table table-sm bg-base-100">
                    <thead>
                        <tr>
                            <th class="w-32">Tipe</th>
                            <th>Nama Anggota</th>
                            <th>Peran</th>
                            <th class="text-center w-20">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="members-table-body"></tbody>
                </table>
            </div>
            <p class="text-sm text-base-content/60">
                Tambahkan dosen (Internal) atau mahasiswa/pihak luar (Eksternal).
            </p>
        </div>
    </div>
</form>