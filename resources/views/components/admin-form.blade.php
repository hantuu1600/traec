@props(['admin' => null])

<form action="{{ $admin ? route('superadmin.admins.update', $admin->id) : route('superadmin.admins.store') }}"
    method="POST" class="space-y-4">
    @csrf
    @if($admin)
        @method('PUT')
    @endif

    <div class="form-control">
        <label class="label"><span class="label-text">Full Name</span></label>
        <input type="text" name="name" value="{{ old('name', $admin->name ?? '') }}" class="input input-bordered"
            required>
    </div>

    <div class="form-control">
        <label class="label"><span class="label-text">Email Address</span></label>
        <input type="email" name="email" value="{{ old('email', $admin->email ?? '') }}" class="input input-bordered"
            required>
    </div>

    <div class="form-control">
        <label class="label"><span class="label-text">Password
                {{ $admin ? '(Leave blank if not changing)' : '' }}</span></label>
        <input type="password" name="password" class="input input-bordered" {{ $admin ? '' : 'required' }}>
    </div>

    <div class="form-control">
        <label class="label"><span class="label-text">Confirm Password</span></label>
        <input type="password" name="password_confirmation" class="input input-bordered" {{ $admin ? '' : 'required' }}>
    </div>

    <div class="flex justify-end gap-2 mt-6">
        <a href="{{ route('superadmin.admins.index') }}" class="btn">Cancel</a>
        <button class="btn btn-primary">Save Admin</button>
    </div>
</form>