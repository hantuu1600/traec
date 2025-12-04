<div class="w-full max-w-md mx-auto">
    <div class="card bg-base-100 shadow-2xl border border-base-300">
        <div class="card-body space-y-6">

            {{-- Logo --}}
            <div class="flex items-center justify-center gap-4">
                
                {{-- UTama Logo --}}
                <img src="{{ asset('images/widyatama.webp') }}"
                    class="h-12 w-auto"
                    alt="UTama Logo">

                <div class="w-[2px] h-10 bg-secondary opacity-40"></div>

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

            {{-- Login form --}}
            <form method="POST" action="#" class="space-y-4">
                @csrf

                {{-- Email / NIDN field --}}
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-secondary">Email / NIDN</span>
                    </label>
                    <input
                        type="text"
                        name="login_id"
                        placeholder="email@university.ac.id / NIDN"
                        class="input input-bordered w-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:border-primary"
                        required
                    >
                </div>

                {{-- Password field --}}
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-secondary">Password</span>
                    </label>
                    <input
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        class="input input-bordered w-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:border-primary"
                        required
                    >
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
                        Sign In
                    </button>

                    <a href="#" class="btn btn-outline btn-secondary w-full font-semibold">
                        Sign Up
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
