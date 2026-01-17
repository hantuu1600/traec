@props(['period'])

<form action="{{ $period->id ? route('admin.periods.update', $period->id) : route('admin.periods.store') }}"
    method="POST" class="space-y-4">
    @csrf
    @if($period->id)
        @method('PUT')
    @endif

    <div class="form-control">
        <label class="label"><span class="label-text">Nama Periode</span></label>
        <input type="text" name="name" value="{{ old('name', $period->name) }}" class="input input-bordered"
            placeholder="Contoh: Ganjil 2025/2026" required>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div class="form-control">
            <label class="label"><span class="label-text">Tanggal Mulai</span></label>
            <input type="date" name="start_date" value="{{ old('start_date', $period->start_date) }}"
                class="input input-bordered" required>
        </div>
        <div class="form-control">
            <label class="label"><span class="label-text">Tanggal Selesai</span></label>
            <input type="date" name="end_date" value="{{ old('end_date', $period->end_date) }}"
                class="input input-bordered" required>
        </div>
    </div>

    @if(!$period->id)
        <div class="form-control">
            <label class="label cursor-pointer justify-start gap-4">
                <input type="checkbox" name="is_active" class="checkbox checkbox-primary" value="1" {{ old('is_active') ? 'checked' : '' }} />
                <span class="label-text">Set sebagai Periode Aktif</span>
            </label>
        </div>
    @endif

    <div class="flex justify-end gap-2 mt-4">
        <a href="{{ route('admin.periods.index') }}" class="btn">Batal</a>
        <button class="btn btn-primary">Simpan</button>
    </div>
</form>