@extends($layout)

@section('content')
    <div class="flex items-center justify-center min-h-[60vh] w-full">
        <div class="card w-full max-w-md bg-base-100 shadow-xl border border-base-200">
            <div class="card-body p-6 sm:p-8">
                <div class="flex flex-col gap-1 items-center text-center mb-6">
                    <div class="p-3 bg-primary/10 rounded-full text-primary mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-2xl font-bold">Change Password</h2>
                    <p class="text-base-content/60 text-sm">Update your account security credentials.</p>
                </div>

                @if (session('success'))
                    <div role="alert" class="alert alert-success p-3 rounded-lg text-sm mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-5 w-5" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    {{-- Current Password --}}
                    <div class="form-control">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-semibold">Current Password</span>
                        </label>
                        <label
                            class="input input-bordered flex items-center gap-2 @error('current_password') input-error @enderror">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="w-4 h-4 opacity-70">
                                <path fill-rule="evenodd"
                                    d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <input type="password" name="current_password" class="grow" placeholder="••••••••" required />
                        </label>
                        @error('current_password')
                            <div class="label pb-0 pt-1">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    {{-- New Password --}}
                    <div class="form-control">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-semibold">New Password</span>
                        </label>
                        <label
                            class="input input-bordered flex items-center gap-2 @error('password') input-error @enderror">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="w-4 h-4 opacity-70">
                                <path fill-rule="evenodd"
                                    d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <input type="password" name="password" class="grow" placeholder="Minimum 8 characters" required />
                        </label>
                        @error('password')
                            <div class="label pb-0 pt-1">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="form-control">
                        <label class="label pt-0 pb-1">
                            <span class="label-text font-semibold">Confirm Password</span>
                        </label>
                        <label class="input input-bordered flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="w-4 h-4 opacity-70">
                                <path fill-rule="evenodd"
                                    d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <input type="password" name="password_confirmation" class="grow"
                                placeholder="Re-enter new password" required />
                        </label>
                    </div>

                    <div class="form-control mt-8">
                        <button type="submit"
                            class="btn btn-primary w-full shadow-lg hover:shadow-primary/30 transition-shadow">
                            Update Password
                        </button>
                        <a href="{{ url()->previous() }}"
                            class="btn btn-ghost btn-sm mt-3 w-full font-normal hover:bg-transparent text-base-content/60">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection