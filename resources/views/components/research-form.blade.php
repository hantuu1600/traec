@props(['research'])

<form
    id="research-edit-form"
    method="POST"
    action="{{ route('lecturer.research.edit', $research->id) }}"
    class="space-y-6"
>
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Title --}}
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Title</span>
            </label>
            <input
                type="text"
                name="title"
                class="input input-bordered w-full"
                value="{{ old('title', $research->title) }}"
                required
            >
        </div>

        {{-- Type ID --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Type</span>
            </label>
            <input
                type="number"
                name="type_id"
                class="input input-bordered w-full"
                value="{{ old('type_id', $research->type_id) }}"
            >
        </div>

        {{-- Rank ID --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Rank</span>
            </label>
            <input
                type="number"
                name="rank_id"
                class="input input-bordered w-full"
                value="{{ old('rank_id', $research->rank_id) }}"
            >
        </div>

        {{-- Role --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Role</span>
            </label>
            <input
                type="text"
                name="role"
                class="input input-bordered w-full"
                value="{{ old('role', $research->role) }}"
                placeholder="Author / Co-Author"
            >
        </div>

        {{-- Publisher --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Publisher</span>
            </label>
            <input
                type="text"
                name="publisher"
                class="input input-bordered w-full"
                value="{{ old('publisher', $research->publisher) }}"
            >
        </div>

        {{-- Year --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Year</span>
            </label>
            <input
                type="number"
                name="year"
                class="input input-bordered w-full"
                value="{{ old('year', $research->year) }}"
            >
        </div>

        {{-- DOI --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">DOI</span>
            </label>
            <input
                type="text"
                name="doi"
                class="input input-bordered w-full"
                value="{{ old('doi', $research->doi) }}"
            >
        </div>

        {{-- Link --}}
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Publication Link</span>
            </label>
            <input
                type="url"
                name="link"
                class="input input-bordered w-full"
                value="{{ old('link', $research->link) }}"
            >
        </div>
    </div>
</form>
