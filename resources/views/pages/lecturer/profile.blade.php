@extends('layouts.dashboard-lecturer-layout')

@section('content')
    <div class="container mx-auto max-w-4xl py-6">
        <div class="flex flex-col gap-2 mb-8">
            <h1 class="text-3xl font-bold text-secondary">Lecturer Profile</h1>
            <p class="text-base-content/60">Manage your personal and academic information.</p>
        </div>

        @if (session('success'))
            <div role="alert" class="alert alert-success mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Left Column: Avatar & Basic Info --}}
            <div class="md:col-span-1">
                <div class="card bg-base-100 shadow-xl border border-base-200">
                    <div class="card-body items-center text-center">
                        <div class="avatar placeholder mb-4">
                            <div class="bg-primary text-primary-content rounded-full w-24">
                                <span class="text-3xl font-bold">{{ substr($user->name, 0, 1) }}</span>
                            </div>
                        </div>
                        <h2 class="card-title text-lg">{{ $user->name }}</h2>
                        <p class="text-sm text-base-content/60">{{ $user->email }}</p>
                        <div class="badge badge-outline mt-2">{{ $user->role }}</div>

                        <div class="divider"></div>

                        <a href="{{ route('password.edit') }}" class="btn btn-outline btn-sm w-full gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Change Password
                        </a>
                    </div>
                </div>
            </div>

            {{-- Right Column: Edit Form --}}
            <div class="md:col-span-2">
                <div class="card bg-base-100 shadow-xl border border-base-200">
                    <div class="card-body">
                        <h3 class="card-title text-lg mb-4">Edit Information</h3>

                        <form action="{{ route('lecturer.profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                {{-- Nama Lengkap --}}
                                <div class="form-control md:col-span-2">
                                    <label class="label">
                                        <span class="label-text font-medium">Full Name (with Degree)</span>
                                    </label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                        class="input input-bordered w-full @error('name') input-error @enderror" required />
                                    @error('name') <span class="text-error text-xs mt-1">{{ $message }}</span> @enderror
                                </div>

                                {{-- NIDN --}}
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-medium">NIDN</span>
                                    </label>
                                    <input type="text" name="nidn" value="{{ old('nidn', $user->nidn) }}"
                                        class="input input-bordered w-full @error('nidn') input-error @enderror" required />
                                    @error('nidn') <span class="text-error text-xs mt-1">{{ $message }}</span> @enderror
                                </div>

                                {{-- No HP --}}
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-medium">WhatsApp Number</span>
                                    </label>
                                    <input type="text" name="phonenumber"
                                        value="{{ old('phonenumber', $user->phonenumber) }}"
                                        class="input input-bordered w-full @error('phonenumber') input-error @enderror"
                                        required />
                                    @error('phonenumber') <span class="text-error text-xs mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="form-control md:col-span-2">
                                    <label class="label">
                                        <span class="label-text font-medium">Institution Email</span>
                                    </label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                        class="input input-bordered w-full @error('email') input-error @enderror"
                                        required />
                                    @error('email') <span class="text-error text-xs mt-1">{{ $message }}</span> @enderror
                                </div>

                                <div class="divider md:col-span-2 my-0"></div>

                                {{-- Jabatan Fungsional --}}
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-medium">Functional Position</span>
                                    </label>
                                    <select name="position" class="select select-bordered w-full">
                                        <option value="Asisten Ahli" {{ old('position', $user->position) == 'Asisten Ahli' ? 'selected' : '' }}>Asisten Ahli</option>
                                        <option value="Lektor" {{ old('position', $user->position) == 'Lektor' ? 'selected' : '' }}>Lektor</option>
                                        <option value="Lektor Kepala" {{ old('position', $user->position) == 'Lektor Kepala' ? 'selected' : '' }}>Lektor Kepala</option>
                                        <option value="Guru Besar" {{ old('position', $user->position) == 'Guru Besar' ? 'selected' : '' }}>Guru Besar</option>
                                        <option value="Tenaga Pengajar" {{ old('position', $user->position) == 'Tenaga Pengajar' ? 'selected' : '' }}>Tenaga Pengajar</option>
                                    </select>
                                </div>

                                {{-- Prodi --}}
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-medium">Study Program</span>
                                    </label>
                                    <select name="prodi" class="select select-bordered w-full" required>
                                        <option value="" disabled>Select Study Program</option>
                                        @foreach($prodis as $prodi)
                                            <option value="{{ $prodi }}" {{ old('prodi', $user->prodi) == $prodi ? 'selected' : '' }}>
                                                {{ $prodi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Fakultas --}}
                                <div class="form-control md:col-span-2">
                                    <label class="label">
                                        <span class="label-text font-medium">Faculty</span>
                                    </label>
                                    <select name="faculty" class="select select-bordered w-full" required>
                                        <option value="" disabled>Select Faculty</option>
                                        @foreach($faculties as $faculty)
                                            <option value="{{ $faculty }}" {{ old('faculty', $user->faculty) == $faculty ? 'selected' : '' }}>
                                                {{ $faculty }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-control mt-8">
                                <button type="submit" class="btn btn-primary w-full md:w-auto md:self-end px-8">
                                    Save Change
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection