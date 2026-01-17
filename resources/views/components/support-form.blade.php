@props(['activity'])

<form id="support-form" method="POST"
    action="{{ $activity->id ? route('lecturer.support.update', $activity->id) : route('lecturer.support.store') }}"
    class="space-y-6">
    @csrf
    @if ($activity->id)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Organization --}}
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Organization / Institution</span>
            </label>
            <input type="text" name="organization" class="input input-bordered w-full"
                value="{{ old('organization', $activity->organization) }}"
                placeholder="Example: IEEE, ACM, University Committee">
        </div>

        {{-- Role --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Role / Position</span>
            </label>
            <input type="text" name="role" class="input input-bordered w-full"
                value="{{ old('role', $activity->role) }}" required
                placeholder="Example: Member, Chairperson, Coordinator">
        </div>

        {{-- Date --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Implementation date</span>
            </label>
            <input type="date" name="activity_date" class="input input-bordered w-full"
                value="{{ old('activity_date', $activity->activity_date) }}" required>
        </div>

        {{-- Description --}}
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Activity Description</span>
            </label>
            <textarea name="description" class="textarea textarea-bordered h-24" required
                placeholder="Describe the details of the activity...">{{ old('description', $activity->description) }}</textarea>
        </div>
    </div>
</form>