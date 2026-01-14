<form
    id="teaching-edit-form"
    method="POST"
    action="{{ route('lecturer.teaching.edit', $teaching->id) }}"
>
    @csrf
    @method('PUT')


    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Course Name (Read-only) --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Course Name</span>
            </label>
            <input
                type="text"
                class="input input-bordered w-full bg-base-200 cursor-not-allowed"
                value="{{ $teaching->course_name }}"
                disabled
            >
        </div>

        {{-- Study Program --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Study Program</span>
            </label>
            <input
                type="text"
                name="study_program"
                class="input input-bordered w-full"
                value="{{ old('study_program', $teaching->study_program) }}"
            >
        </div>

        {{-- Semester --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Semester</span>
            </label>
            <input
                type="text"
                name="semester"
                class="input input-bordered w-full"
                value="{{ old('semester', $teaching->semester) }}"
            >
        </div>

        {{-- Credits --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Credits</span>
            </label>
            <input
                type="number"
                name="credits"
                class="input input-bordered w-full"
                value="{{ old('credits', $teaching->credits) }}"
            >
        </div>

        {{-- Total Meetings --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Total Meetings</span>
            </label>
            <input
                type="number"
                name="meetings_total"
                class="input input-bordered w-full"
                value="{{ old('meetings_total', $teaching->meetings_total) }}"
            >
        </div>

        {{-- Year --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Year</span>
            </label>
            <input
                type="year"
                name="year"
                class="input input-bordered w-full"
                value="{{ old('year', $teaching->year) }}"
            >
        </div>

        {{-- Start Date --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Start Date</span>
            </label>
            <input
                type="date"
                name="start_date"
                class="input input-bordered w-full"
                value="{{ old('start_date', $teaching->start_date) }}"
            >
        </div>

        {{-- End Date --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">End Date</span>
            </label>
            <input
                type="date"
                name="end_date"
                class="input input-bordered w-full"
                value="{{ old('end_date', $teaching->end_date) }}"
            >
        </div>

        

    </div>
</form>
