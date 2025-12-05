<div class="w-full max-w-xl mx-auto">
    <div class="card bg-base-100 shadow-2xl border border-base-300 w-[500px]">
        <div class="card-body space-y-6">

            {{-- Logo --}}
            <div class="flex items-center justify-center gap-4">
                <img src="{{ asset('images/widyatama.webp') }}" class="h-12 w-auto" alt="UTama Logo">
                <div class="w-[2px] h-10 bg-secondary opacity-40"></div>
                <img src="{{ asset('images/logo.webp') }}" class="h-12 w-auto" alt="Tremic Logo">
            </div>

            {{-- Heading --}}
            <div class="text-center space-y-3">
                <h1 class="text-3xl font-extrabold text-secondary">Create Account</h1>
                <p class="text-sm text-secondary/70">Please fill in the form to register.</p>
            </div>

            {{-- Register Form --}}
            <form method="POST" action="/auth/register" class="space-y-6">
                @csrf

                {{-- Name --}}
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-secondary">Name</span>
                    </label>
                    <input type="text" name="name" placeholder="Your full name"
                        class="input input-bordered w-full" required>
                </div>

                {{-- Email --}}
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-secondary">Email</span>
                    </label>
                    <input type="email" name="email" placeholder="email@example.com"
                        class="input input-bordered w-full" required>
                </div>

                {{-- Password --}}
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-secondary">Password</span>
                    </label>
                    <input type="password" name="password" placeholder="••••••••"
                        class="input input-bordered w-full" required>
                </div>

                {{-- NIDN --}}
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-secondary">NIDN</span>
                    </label>
                    <input type="text" name="nidn" placeholder="Your NIDN"
                        class="input input-bordered w-full" required>
                </div>

                {{-- Prodi --}}
                <div class="form-control relative">
                    <label class="label">
                        <span class="label-text text-secondary">Prodi</span>
                    </label>
                    <select name="prodi" class="select select-bordered w-full relative z-50" required>
                        <option value="" disabled selected>Choose Prodi</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Industri">Teknik Industri</option>
                        <option value="Manajemen">Manajemen</option>
                        <option value="Akuntansi">Akuntansi</option>
                        <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                        <option value="Bahasa Inggris">Bahasa Inggris</option>
                    </select>
                </div>

                {{-- Faculty --}}
                <div class="form-control relative">
                    <label class="label">
                        <span class="label-text text-secondary">Faculty</span>
                    </label>
                    <select name="faculty" class="select select-bordered w-full relative z-50" required>
                        <option value="" disabled selected>Choose Your Faculty</option>
                        <option value="Fakultas Teknik">Fakultas Teknik</option>
                        <option value="Fakultas Bisnis & Manajemen">Fakultas Bisnis & Manajemen</option>
                        <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
                        <option value="Fakultas Seni & Desain">Fakultas Seni & Desain</option>
                        <option value="Fakultas Bahasa">Fakultas Bahasa</option>
                    </select>
                </div>

                {{-- Position --}}
                <div class="form-control relative">
                    <label class="label">
                        <span class="label-text text-secondary">Position</span>
                    </label>
                    <select name="position" class="select select-bordered w-full relative z-50" required>
                        <option value="" disabled selected>Choose Your Position</option>
                        <option value="Dosen">Dosen</option>
                        <option value="Kaprodi">Kaprodi</option>
                        <option value="Sekprodi">Sekprodi</option>
                        <option value="Dekan">Dekan</option>
                        <option value="Wakil Dekan">Wakil Dekan</option>
                        <option value="Staff Pengajar">Staff Pengajar</option>
                        <option value="Peneliti">Peneliti</option>
                    </select>
                </div>

                {{-- Phone Number --}}
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-secondary">Phone Number</span>
                    </label>
                    <input type="tel" name="phonenumber" placeholder="+6281598761215"
                        class="input input-bordered w-full" required>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn btn-primary w-full text-white font-semibold">
                    Register
                </button>

                {{-- Back to Login --}}
                <a href="/auth/login" class="btn btn-outline btn-secondary w-full font-semibold">
                    Back to Login
                </a>
            </form>

        </div>
    </div>
</div>
