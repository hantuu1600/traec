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
                <span class="label-text font-medium">Service Activity Title</span>
            </label>
            <input type="text" name="title" class="input input-bordered w-full"
                value="{{ old('title', $activity->title) }}" required placeholder="Name of service activity">
        </div>

        {{-- Partner --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Target Partner</span>
            </label>
            <input type="text" name="partner" class="input input-bordered w-full"
                value="{{ old('partner', $activity->partner) }}" placeholder="Name of partner/target group">
        </div>

        {{-- Location --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Location</span>
            </label>
            <input type="text" name="location" class="input input-bordered w-full"
                value="{{ old('location', $activity->location) }}" placeholder="Place of implementation">
        </div>

        {{-- Date Start --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Start Date</span>
            </label>
            <input type="date" name="start_date" class="input input-bordered w-full"
                value="{{ old('start_date', $activity->start_date) }}">
        </div>

        {{-- Date End --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">End Date</span>
            </label>
            <input type="date" name="end_date" class="input input-bordered w-full"
                value="{{ old('end_date', $activity->end_date) }}">
        </div>

        {{-- Role --}}
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Role</span>
            </label>
            <input type="text" name="role" class="input input-bordered w-full"
                value="{{ old('role', $activity->role) }}" placeholder="Leader / Member / Speaker">
        </div>
    </div>
</form>