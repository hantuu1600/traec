@props(['teaching' => null])

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Course Name --}}
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">Mata Kuliah</span>
        </label>
        <input type="text" name="course_name" class="input input-bordered w-full"
            value="{{ old('course_name', $teaching->course_name ?? '') }}" placeholder="Contoh: Algoritma Pemrograman"
            required>
    </div>

    {{-- Study Program --}}
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">Program Studi</span>
        </label>
        <input type="text" name="study_program" class="input input-bordered w-full"
            value="{{ old('study_program', $teaching->study_program ?? '') }}" placeholder="Contoh: Informatika"
            required>
    </div>

    {{-- Semester --}}
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">Semester</span>
        </label>
        <input type="text" name="semester" class="input input-bordered w-full"
            value="{{ old('semester', $teaching->semester ?? '') }}" placeholder="Contoh: Ganjil 2024/2025" required>
    </div>

    {{-- Credits --}}
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">SKS</span>
        </label>
        <input type="number" name="credits" class="input input-bordered w-full"
            value="{{ old('credits', $teaching->credits ?? '') }}" min="1" required>
    </div>

    {{-- Total Meetings --}}
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">Total Pertemuan</span>
        </label>
        <input type="number" name="meetings_total" class="input input-bordered w-full"
            value="{{ old('meetings_total', $teaching->meetings_total ?? '') }}" min="1" required>
    </div>

    {{-- Year --}}
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">Tahun Akademik</span>
        </label>
        <input type="number" name="year" class="input input-bordered w-full"
            value="{{ old('year', $teaching->year ?? date('Y')) }}" min="1900" max="2100" required>
    </div>

    {{-- Start Date --}}
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">Tanggal Mulai</span>
        </label>
        <input type="date" name="start_date" class="input input-bordered w-full"
            value="{{ old('start_date', $teaching->start_date ?? '') }}">
    </div>

    {{-- End Date --}}
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">Tanggal Selesai</span>
        </label>
        <input type="date" name="end_date" class="input input-bordered w-full"
            value="{{ old('end_date', $teaching->end_date ?? '') }}">
    </div>

</div>