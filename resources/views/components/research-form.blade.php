@props(['research'])

<form id="research-form" method="POST"
    action="{{ $research->id ? route('lecturer.research.update', $research->id) : route('lecturer.research.store') }}"
    class="space-y-6">
    @csrf
    @if ($research->id)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Title --}}
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Research Title</span>
            </label>
            <input type="text" name="title" class="input input-bordered w-full"
                value="{{ old('title', $research->title) }}" required>
        </div>

        {{-- Type ID --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Research Type (ID)</span>
            </label>
            <input type="number" name="type_id" class="input input-bordered w-full"
                value="{{ old('type_id', $research->type_id) }}">
        </div>

        {{-- Rank ID --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Level / Rank (ID)</span>
            </label>
            <input type="number" name="rank_id" class="input input-bordered w-full"
                value="{{ old('rank_id', $research->rank_id) }}">
        </div>

        {{-- Role --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Role</span>
            </label>
            <input type="text" name="role" class="input input-bordered w-full"
                value="{{ old('role', $research->role) }}" placeholder="Author / Member">
        </div>

        {{-- Publisher --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Publisher</span>
            </label>
            <input type="text" name="publisher" class="input input-bordered w-full"
                value="{{ old('publisher', $research->publisher) }}">
        </div>

        {{-- Year --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Year</span>
            </label>
            <input type="number" name="year" class="input input-bordered w-full"
                value="{{ old('year', $research->year) }}">
        </div>

        {{-- DOI --}}
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">DOI</span>
            </label>
            <input type="text" name="doi" class="input input-bordered w-full" value="{{ old('doi', $research->doi) }}">
        </div>

        {{-- Link --}}
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Publication Link</span>
            </label>
            <input type="url" name="link" class="input input-bordered w-full"
                value="{{ old('link', $research->link) }}">
        </div>

        {{-- Members Section --}}
        <div class="md:col-span-2 space-y-3 pt-4 border-t border-base-200">
            <div class="flex items-center justify-between gap-3">
                <h3 class="text-md font-semibold text-secondary">Research Members</h3>

                <button type="button" id="add-member-btn" class="btn btn-sm btn-outline btn-primary">
                    + Add Member
                </button>
            </div>

            <div class="overflow-x-auto rounded-box border border-base-300">
                <table class="table table-sm bg-base-100">
                    <thead>
                        <tr>
                            <th class="w-32">Type</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th class="text-center w-20">Action</th>
                        </tr>
                    </thead>
                    <tbody id="members-table-body"></tbody>
                </table>
            </div>
            <p class="text-sm text-base-content/60">
                Add lecturers (Internal) or students/external parties (External).
            </p>
        </div>
    </div>
</form>