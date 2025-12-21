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
                <h1 class="text-3xl font-extrabold text-secondary">Create Account</h1>
                <p class="text-sm text-secondary/70">Please fill in the form to register.</p>
            </div>

            {{-- Register Form --}}
            <form id="registerForm" method="POST" action="#" class="space-y-5" novalidate>
                @csrf

                {{-- Name --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary">Full Name</span>
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="reg_name"
                        placeholder="Your full name"
                        class="input input-bordered w-full"
                    >
                    <p id="regNameError" class="text-sm text-error hidden mt-1">
                        Name must be at least 3 characters.
                    </p>
                </div>

                {{-- Email --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary">Email</span>
                    </label>
                    <input
                        type="text"
                        name="email"
                        id="reg_email"
                        placeholder="email@example.com"
                        class="input input-bordered w-full"
                    >
                    <p id="regEmailError" class="text-sm text-error hidden mt-1">
                        Please enter a valid email address.
                    </p>
                </div>

                {{-- Password --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary">Password</span>
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="reg_password"
                        placeholder="••••••••"
                        class="input input-bordered w-full"
                    >
                    <p id="regPasswordError" class="text-sm text-error hidden mt-1">
                        Password must be at least 8 characters.
                    </p>
                </div>

                {{-- NIDN --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary">NIDN</span>
                    </label>
                    <input
                        type="text"
                        name="nidn"
                        id="reg_nidn"
                        placeholder="Numeric NIDN"
                        class="input input-bordered w-full"
                    >
                    <p id="regNidnError" class="text-sm text-error hidden mt-1">
                        NIDN must contain numbers only (min 6 digits).
                    </p>
                </div>

                {{-- Prodi --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary">Program Study (Prodi)</span>
                    </label>
                    <select name="prodi" id="reg_prodi" class="select select-bordered w-full">
                        <option value="" selected>Choose Prodi</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Industri">Teknik Industri</option>
                        <option value="Manajemen">Manajemen</option>
                        <option value="Akuntansi">Akuntansi</option>
                        <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                        <option value="Bahasa Inggris">Bahasa Inggris</option>
                    </select>
                    <p id="regProdiError" class="text-sm text-error hidden mt-1">
                        Please choose a Prodi.
                    </p>
                </div>

                {{-- Faculty --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary">Faculty</span>
                    </label>
                    <select name="faculty" id="reg_faculty" class="select select-bordered w-full">
                        <option value="" selected>Choose Your Faculty</option>
                        <option value="Fakultas Teknik">Fakultas Teknik</option>
                        <option value="Fakultas Bisnis & Manajemen">Fakultas Bisnis & Manajemen</option>
                        <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
                        <option value="Fakultas Seni & Desain">Fakultas Seni & Desain</option>
                        <option value="Fakultas Bahasa">Fakultas Bahasa</option>
                    </select>
                    <p id="regFacultyError" class="text-sm text-error hidden mt-1">
                        Please choose a Faculty.
                    </p>
                </div>

                {{-- Position --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary">Position</span>
                    </label>
                    <select name="position" id="reg_position" class="select select-bordered w-full">
                        <option value="" selected>Choose Your Position</option>
                        <option value="Dosen">Dosen</option>
                        <option value="Kaprodi">Head of Program (Kaprodi)</option>
                        <option value="Sekprodi">Secretary of Program (Sekprodi)</option>
                        <option value="Dekan">Dean (Dekan)</option>
                        <option value="Wakil Dekan">Vice Dean (Wakil Dekan)</option>
                        <option value="Staff Pengajar">Teaching Staff</option>
                        <option value="Peneliti">Researcher</option>
                    </select>
                    <p id="regPositionError" class="text-sm text-error hidden mt-1">
                        Please choose a Position.
                    </p>
                </div>

                {{-- Phone Number --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary">Phone Number</span>
                    </label>
                    <input
                        type="text"
                        name="phonenumber"
                        id="reg_phone"
                        placeholder="+6281598761215"
                        class="input input-bordered w-full"
                    >
                    <p id="regPhoneError" class="text-sm text-error hidden mt-1">
                        Phone number must be 10–15 digits (may start with +62).
                    </p>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn btn-primary w-full text-white font-semibold">
                    Register
                </button>

                {{-- Back to Login --}}
                <a href="/pages/login" class="btn btn-outline btn-secondary w-full font-semibold">
                    Back to Login
                </a>
            </form>

        </div>
    </div>
</div>
