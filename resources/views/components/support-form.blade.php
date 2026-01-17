@props(['activity'])

<form id="support-form" method="POST"
    action="{{ $activity->id ? route('lecturer.support.update', $activity->id) : route('lecturer.support.store') }}"
    class="space-y-6">
    @csrf
    @if ($activity->id)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Type --}}
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Jenis Kegiatan</span>
            </label>
            <input type="text" name="type" class="input input-bordered w-full"
                value="{{ old('type', $activity->type) }}" required
                placeholder="Contoh: Panitia Seminar, Pengurus Organisasi Profesi">
        </div>

        {{-- Role --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Peran / Jabatan</span>
            </label>
            <input type="text" name="role" class="input input-bordered w-full"
                value="{{ old('role', $activity->role) }}" required placeholder="Contoh: Anggota, Ketua">
        </div>

        {{-- Date --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Tanggal Pelaksanaan</span>
            </label>
            <input type="date" name="activity_date" class="input input-bordered w-full"
                value="{{ old('activity_date', $activity->activity_date) }}" required>
        </div>

        {{-- Description --}}
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Deskripsi Kegiatan</span>
            </label>
            <textarea name="description" class="textarea textarea-bordered h-24" required
                placeholder="Jelaskan detail kegiatan...">{{ old('description', $activity->description) }}</textarea>
        </div>
    </div>
</form>