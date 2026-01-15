<div class="w-full max-w-md mx-auto">
    <div class="card bg-base-100 shadow-2xl border border-base-300">
        <div class="card-body space-y-6">

            {{-- Logo --}}
            <div class="flex items-center justify-center gap-4">
                
                {{-- UTama Logo --}}
                <img src="{{ asset('images/widyatama.webp') }}"
                    class="h-12 w-auto"
                    alt="UTama Logo">

                <div class="w-0.5 h-10 bg-secondary opacity-40"></div>

                {{-- Tremic Logo --}}
                <img src="{{ asset('images/logo.webp') }}"
                    class="h-12 w-auto"
                    alt="Tremic Logo">
            </div>
        
            {{-- heading --}}
            <div class="text-center space-y-3">
                <h1 class="text-3xl font-extrabold text-secondary">
                    e-Filling Lecturer
                </h1>

                <p class="text-sm text-secondary/70">
                    Please sign in using your Email/NIDN and password.
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
                        <span class="label-text text-secondary">Email / NIDN</span>
                    </label>

                    <input
                        type="text"
                        name="login_id"
                        id="login_id"
                        placeholder="email@university.ac.id / NIDN"
                        class="input input-bordered w-full"
                    >

                    <p id="loginIdError" class="text-sm text-error hidden mt-1">
                        Please enter a valid email address or numeric NIDN.
                    </p>
                </div>

                {{-- Password field --}}
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary">Password</span>
                    </label>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="••••••••"
                        class="input input-bordered w-full"
                    >

                    <p id="passwordError" class="text-sm text-error hidden mt-1">
                        Password must be at least 8 characters long.
                    </p>
                </div>

                {{-- Remember me + Forgot password --}}
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="checkbox checkbox-sm checkbox-primary">
                        <span class="text-secondary">Remember me</span>
                    </label>

                    <a href="#" class="text-primary hover:underline">
                        Forgot password?
                    </a>
                </div>

                {{-- Action buttons --}}
                <div class="space-y-2 pt-3">
                    <button type="submit" class="btn btn-primary w-full text-white font-semibold">
                        Log in
                    </button>
                <br>
                <p class="text-sm text-secondary/70">
                    Don't have an account yet?
                </p>
                    <a href="register" class="btn btn-outline btn-secondary w-full font-semibold">
                        Register
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
