<form
    id="teaching-edit-form"
    method="POST"
    action="#"
    class="space-y-6"
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
                value="Software Engineering"
                disabled
            >
        </div>

        {{-- Class --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Class</span>
            </label>
            <input
                type="text"
                class="input input-bordered w-full"
                value="A"
                placeholder="e.g. A, B, C"
            >
        </div>

        {{-- Day --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Day</span>
            </label>
            <select class="select select-bordered w-full">
                <option disabled>Select day</option>
                <option>Monday</option>
                <option selected>Tuesday</option>
                <option>Wednesday</option>
                <option>Thursday</option>
                <option>Friday</option>
            </select>
        </div>

        {{-- Time --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Time</span>
            </label>
            <input
                type="text"
                class="input input-bordered w-full"
                value="08:00 - 09:40"
                placeholder="HH:MM - HH:MM"
            >
        </div>

        {{-- Room --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Room</span>
            </label>
            <input
                type="text"
                class="input input-bordered w-full"
                value="Lab 301"
                placeholder="Room / Lab name"
            >
        </div>


    </div>
</form>
