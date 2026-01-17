<div class="navbar bg-base-100 border-b border-base-200 fixed top-0 z-50 h-16 px-4 sm:px-6 w-full">

    {{-- Brand --}}
    <div class="flex-1">
        <a
            class="btn btn-ghost px-0 text-xl font-black text-secondary tracking-tight leading-none normal-case hover:bg-transparent">
            Tremic
            <span
                class="text-xs font-medium text-base-content/60 tracking-wide leading-none font-sans hidden sm:inline-block ml-1">
                Tracker Academic
            </span>
        </a>
    </div>

    {{-- Right Actions --}}
    <div class="flex-none">

        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button"
                class="btn btn-ghost flex items-center gap-3 px-2 normal-case h-auto min-h-12 py-1">

                {{-- User Info Text (Desktop) --}}
                @auth
                    <div class="hidden md:flex flex-col items-end leading-tight">
                        <span class="text-sm font-bold text-base-content">
                            {{ Auth::user()->name }}
                        </span>
                        <span class="text-xs text-base-content/60 font-medium">
                            {{ Auth::user()->role === 'admin' ? 'Administrator' : (Auth::user()->prodi ?? 'Lecturer') }}
                        </span>
                    </div>
                @endauth

                {{-- Avatar --}}
                <div class="avatar placeholder">
                    <div
                        class="bg-primary text-primary-content rounded-full w-9 ring ring-base-100 ring-offset-2 ring-offset-base-100">
                        <span class="text-xs font-bold">
                            @auth
                                {{ substr(Auth::user()->name, 0, 2) }}
                            @else
                                ?
                            @endauth
                        </span>
                    </div>
                </div>

                {{-- Chevron Icon (Optional visual cue) --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 hidden md:block opacity-50" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            <ul tabindex="0"
                class="mt-3 z-1 p-2 shadow-2xl menu menu-sm dropdown-content bg-base-100 rounded-box w-64 border border-base-200">
                @auth
                    <li class="menu-title px-4 py-2 border-b border-base-200 mb-2">
                        <span class="text-xs font-normal opacity-70 block mb-0.5">You are logged in as</span>
                        <span class="text-sm font-bold text-secondary block truncate">{{ Auth::user()->name }}</span>
                    </li>
                @endauth

                <li>
                    @if(Auth::check() && Auth::user()->role === 'dosen')
                        <a href="{{ route('lecturer.profile') }}"
                            class="flex items-center gap-3 px-4 py-2.5 active:bg-primary active:text-white rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-70" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Account Settings
                        </a>
                    @else
                        <a class="flex items-center gap-3 px-4 py-2.5 active:bg-primary active:text-white rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-70" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Account Settings
                        </a>
                    @endif
                </li>

                <li>
                    <a href="{{ route('password.edit') }}"
                        class="flex items-center gap-3 px-4 py-2.5 active:bg-primary active:text-white rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-70" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Change Password
                    </a>
                </li>

                <li class="mt-1 border-t border-base-200 pt-1">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="flex items-center gap-3 px-4 py-2.5 text-error hover:bg-error/10 hover:text-error rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>