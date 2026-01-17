<div class="w-full max-w-md mx-auto">
    <div class="card bg-base-100 shadow-2xl border border-base-300">
        <div class="card-body space-y-6">

            {{-- Logo --}}
            <div class="flex items-center justify-center gap-4">

                {{-- UTama Logo --}}
                <img src="{{ asset('images/widyatama.webp') }}" class="h-12 w-auto" alt="UTama Logo">

                <div class="w-0.5 h-10 bg-secondary opacity-40"></div>

                {{-- Tremic Logo --}}
                <img src="{{ asset('images/logo.webp') }}" class="h-12 w-auto" alt="Tremic Logo">
            </div>

            {{-- heading --}}
            <div class="text-center space-y-3">
                <h1 class="text-3xl font-extrabold text-secondary">
                    e-Filling Lecturer
                </h1>

                <p class="text-sm text-secondary/70">
                    Silakan masuk menggunakan Email atau NIDN Anda.
                </p>
            </div>

            {{-- Success message after register --}}
            @if(session('success'))
                <div class="alert alert-success shadow-sm mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Login form --}}
            <form id="loginForm" method="POST" action="{{ route('login.process') }}" class="space-y-4" novalidate>
                @csrf

                {{-- Email / NIDN field --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Email / NIDN</span>
                    </label>

                    <input type="text" name="login_id" id="login_id" value="{{ old('login_id') }}"
                        placeholder="email@widyatama.ac.id / 041xxxx"
                        class="input input-bordered w-full @error('login_id') input-error @enderror">

                    @error('login_id')
                        <p class="text-sm text-error mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password field --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Password</span>
                    </label>

                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="input input-bordered w-full @error('password') input-error @enderror">

                    @error('password')
                        <p class="text-sm text-error mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember me + Forgot password --}}
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="checkbox checkbox-sm checkbox-primary">
                        <span class="text-secondary">Ingat saya</span>
                    </label>

                    <a href="#" class="text-primary hover:underline font-medium">
                        Lupa password?
                    </a>
                </div>

                {{-- Action buttons --}}
                <div class="space-y-2 pt-3">
                    <button type="submit" class="btn btn-primary w-full text-white font-bold text-lg">
                        Masuk Aplikasi
                    </button>
                    <br>
                    <div class="text-center">
                        <p class="text-sm text-secondary/70 inline-block">
                            Belum punya akun?
                        </p>
                        <a href="{{ route('register') }}"
                            class="link link-secondary no-underline hover:underline text-sm font-medium ml-1">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>