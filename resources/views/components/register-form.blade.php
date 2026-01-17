<div class="w-full max-w-xl mx-auto">
    <div class="card bg-base-100 shadow-2xl border border-base-300 w-[500px]">
        <div class="card-body space-y-6">

            {{-- Logo --}}
            <div class="flex items-center justify-center gap-4">
                <img src="{{ asset('images/widyatama.webp') }}" class="h-12 w-auto" alt="UTama Logo">
                <div class="w-0.5 h-10 bg-secondary opacity-40"></div>
                <img src="{{ asset('images/logo.webp') }}" class="h-12 w-auto" alt="Tremic Logo">
            </div>

            {{-- Heading --}}
            <div class="text-center space-y-3">
                <h1 class="text-3xl font-extrabold text-secondary">Create New Account</h1>
                <p class="text-sm text-secondary/70">Complete your personal data to start joining
                    <strong>Tremic</strong>.</p>
            </div>

            {{-- Register Form --}}
            <form id="registerForm" method="POST" action="{{ route('register.process') }}" class="space-y-4" novalidate>
                @csrf

                {{-- Name --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Full Name</span>
                    </label>
                    <input type="text" name="name" id="reg_name" value="{{ old('name') }}"
                        placeholder="Example: Budi Santoso, M.Kom" minlength="3" required
                        class="input input-bordered w-full @error('name') input-error @enderror">
                    @error('name')
                        <p class="text-sm text-error mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Institutional Email</span>
                    </label>
                    <input type="email" name="email" id="reg_email" value="{{ old('email') }}"
                        placeholder="dosen@widyatama.ac.id" required
                        class="input input-bordered w-full @error('email') input-error @enderror">
                    @error('email')
                        <p class="text-sm text-error mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Password</span>
                    </label>
                    <input type="password" name="password" id="reg_password" placeholder="Minimum 8 characters"
                        minlength="8" required
                        class="input input-bordered w-full @error('password') input-error @enderror">
                    @error('password')
                        <p class="text-sm text-error mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- NIDN --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">NIDN</span>
                    </label>
                    <input type="text" name="nidn" id="reg_nidn" value="{{ old('nidn') }}"
                        placeholder="Example: 0412345678" pattern="[0-9]+" minlength="6" inputmode="numeric" required
                        class="input input-bordered w-full @error('nidn') input-error @enderror">
                    @error('nidn')
                        <p class="text-sm text-error mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Prodi --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Study program</span>
                    </label>
                    <select name="prodi" id="reg_prodi" required
                        class="select select-bordered w-full @error('prodi') select-error @enderror">
                        <option value="" disabled selected>Select Study Program</option>
                        @foreach(['Informatika', 'Sistem Informasi', 'Teknik Industri', 'Manajemen', 'Akuntansi', 'Desain Komunikasi Visual', 'Bahasa Inggris'] as $prodi)
                            <option value="{{ $prodi }}" {{ old('prodi') == $prodi ? 'selected' : '' }}>{{ $prodi }}</option>
                        @endforeach
                    </select>
                    @error('prodi')
                        <p class="text-sm text-error mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Faculty --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Faculty</span>
                    </label>
                    <select name="faculty" id="reg_faculty" required
                        class="select select-bordered w-full @error('faculty') select-error @enderror">
                        <option value="" disabled selected>Choose your faculty</option>
                        @foreach(['Fakultas Teknik', 'Fakultas Bisnis & Manajemen', 'Fakultas Ekonomi', 'Fakultas Seni & Desain', 'Fakultas Bahasa'] as $faculty)
                            <option value="{{ $faculty }}" {{ old('faculty') == $faculty ? 'selected' : '' }}>{{ $faculty }}
                            </option>
                        @endforeach
                    </select>
                    @error('faculty')
                        <p class="text-sm text-error mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Position --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Academic Position</span>
                    </label>
                    <select name="position" id="reg_position" required
                        class="select select-bordered w-full @error('position') select-error @enderror">
                        <option value="" disabled selected>Select Academic Position</option>
                        @foreach(['Dosen', 'Kaprodi', 'Sekprodi', 'Dekan', 'Wakil Dekan', 'Staff Pengajar', 'Peneliti'] as $position)
                            <option value="{{ $position }}" {{ old('position') == $position ? 'selected' : '' }}>
                                {{ $position }}
                            </option>
                        @endforeach
                    </select>
                    @error('position')
                        <p class="text-sm text-error mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Phone Number --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">WhatsApp / Phone Number</span>
                    </label>
                    <input type="tel" name="phonenumber" id="reg_phone" value="{{ old('phonenumber') }}"
                        placeholder="Example: 08123456789" minlength="10" maxlength="15" required
                        class="input input-bordered w-full @error('phonenumber') input-error @enderror">
                    @error('phonenumber')
                        <p class="text-sm text-error mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn btn-primary w-full text-white font-bold text-lg">
                    Register
                </button>

                {{-- Back to Login --}}
                <div class="text-center pt-2">
                    <a href="{{ route('login') }}"
                        class="link link-secondary no-underline hover:underline text-sm font-medium">
                        Already have an account? <span class="text-primary">Login here</span>
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>