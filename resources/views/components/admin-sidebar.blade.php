<aside id="sidebar" class="relative bg-base-100 border-r border-base-300 transition-all duration-300
              w-64 flex flex-col">

    @php
        // Base styles
        $linkBase = "group flex items-center gap-4 px-4 py-3 rounded-full transition";
        $active = "bg-primary text-white shadow-sm";
        $inactive = "text-base-content/70 hover:bg-base-200 hover:text-base-content";

        // Icon wrapper
        $iconBox = "w-10 h-10 grid place-items-center rounded-full";
        $iconSvg = "w-7 h-7 block";

        // Active helper
        $isActive = fn($name) => request()->routeIs($name);
    @endphp

    <nav class="flex-1 p-3 space-y-2 mt-5">

        {{-- HOME --}}
        <a href="{{ route('admin.dashboard') }}"
            class="{{ $linkBase }} {{ $isActive('admin.dashboard') ? $active : $inactive }}">

            <span class="{{ $iconBox }}">
                <svg class="{{ $iconSvg }}" viewBox="0 0 64 64" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path
                        d="M36,10c-1.139,0 -2.27708,0.38661 -3.20508,1.16211l-21.27734,17.7793c-1.465,1.224 -1.96564,3.32881 -1.05664,5.00781c1.251,2.309 4.20051,2.79122 6.10352,1.19922l18.79492,-15.70313c0.371,-0.31 0.91025,-0.31 1.28125,0l18.79492,15.70313c0.748,0.626 1.6575,0.92969 2.5625,0.92969c1.173,0 2.33591,-0.51091 3.12891,-1.50391c1.377,-1.724 0.98597,-4.27055 -0.70703,-5.68555l-2.41992,-2.02148v-10.19922c0,-1.473 -1.19402,-2.66797 -2.66602,-2.66797h-2.66602c-1.473,0 -2.66797,1.19497 -2.66797,2.66797v3.51367l-10.79492,-9.01953c-0.928,-0.7755 -2.06608,-1.16211 -3.20508,-1.16211zM35.99609,22.92578l-22,18.37695v8.69727c0,4.418 3.582,8 8,8h28c4.418,0 8,-3.582 8,-8v-8.69727zM32,38h8c1.105,0 2,0.895 2,2v10h-12v-10c0,-1.105 0.895,-2 2,-2z" />
                </svg>
            </span>

            <span class="menu-text text-md {{ $isActive('admin.dashboard') ? 'font-semibold' : 'font-medium' }}">
                Home
            </span>
        </a>

        {{-- LECTURERS --}}
        <a href="{{ route('admin.lecturers.index') }}"
            class="{{ $linkBase }} {{ $isActive('admin.lecturers') ? $active : $inactive }}">

            <span class="{{ $iconBox }}">
                <svg class="{{ $iconSvg }}" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2 1 7l11 5 9-4.09V17h2V7L12 2z" />
                    <path d="M5 10v4c0 2.21 3.13 4 7 4s7-1.79 7-4v-4l-7 3-7-3z" />
                    <circle cx="12" cy="13" r="2.5" />
                    <path d="M6 22c0-3.31 2.69-6 6-6s6 2.69 6 6H6z" />
                </svg>
            </span>


            <span class="menu-text text-md {{ $isActive('admin.lecturers') ? 'font-semibold' : 'font-medium' }}">
                Lecturers
            </span>
        </a>

        {{-- DOCUMENTS --}}
        <a href="{{ route('admin.document-request.index') }}"
            class="{{ $linkBase }} {{ $isActive('admin.document-request*') ? $active : $inactive }}">

            <span class="{{ $iconBox }}">
                <svg class="{{ $iconSvg }}" viewBox="0 0 72 72" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path
                        d="M 25 11 C 20.029 11 16 15.029 16 20 L 16 52 C 16 56.971 20.029 61 25 61 L 47 61 C 51.971 61 56 56.971 56 52 L 56 31 L 42 31 C 38.686 31 36 28.314 36 25 L 36 11 L 25 11 z M 40 11.34375 L 40 25 C 40 26.105 40.896 27 42 27 L 55.65625 27 L 40 11.34375 z M 29 38 L 43 38 C 44.104 38 45 38.895 45 40 C 45 41.105 44.104 42 43 42 L 29 42 C 27.896 42 27 41.105 27 40 C 27 38.895 27.896 38 29 38 z M 29 47 L 43 47 C 44.104 47 45 47.895 45 49 C 45 50.105 44.104 51 43 51 L 29 51 C 27.896 51 27 50.105 27 49 C 27 47.895 27.896 47 29 47 z" />
                </svg>
            </span>

            <span class="menu-text text-md {{ $isActive('admin.document-request') ? 'font-semibold' : 'font-medium' }}">
                Documents
            </span>
        </a>

        {{-- SETTINGS --}}
        <a href="{{ route('admin.dashboard') }}"
            class="{{ $linkBase }} {{ $isActive('settings.*') ? $active : $inactive }}">

            <span class="{{ $iconBox }}">
                <svg class="{{ $iconSvg }}" viewBox="0 0 72 72" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path
                        d="M57.531,30.556C58.96,30.813,60,32.057,60,33.509v4.983c0,1.452-1.04,2.696-2.469,2.953l-2.974,0.535	c-0.325,1.009-0.737,1.977-1.214,2.907l1.73,2.49c0.829,1.192,0.685,2.807-0.342,3.834l-3.523,3.523	c-1.027,1.027-2.642,1.171-3.834,0.342l-2.49-1.731c-0.93,0.477-1.898,0.889-2.906,1.214l-0.535,2.974	C41.187,58.96,39.943,60,38.491,60h-4.983c-1.452,0-2.696-1.04-2.953-2.469l-0.535-2.974c-1.009-0.325-1.977-0.736-2.906-1.214	l-2.49,1.731c-1.192,0.829-2.807,0.685-3.834-0.342l-3.523-3.523c-1.027-1.027-1.171-2.641-0.342-3.834l1.73-2.49	c-0.477-0.93-0.889-1.898-1.214-2.907l-2.974-0.535C13.04,41.187,12,39.943,12,38.491v-4.983c0-1.452,1.04-2.696,2.469-2.953	l2.974-0.535c0.325-1.009,0.737-1.977,1.214-2.907l-1.73-2.49c-0.829-1.192-0.685-2.807,0.342-3.834l3.523-3.523	c1.027-1.027,2.642-1.171,3.834-0.342l2.49,1.731c0.93-0.477,1.898-0.889,2.906-1.214l0.535-2.974C30.813,13.04,32.057,12,33.509,12	h4.983c1.452,0,2.696,1.04,2.953,2.469l0.535,2.974c1.009,0.325,1.977,0.736,2.906,1.214l2.49-1.731	c1.192-0.829,2.807-0.685,3.834,0.342l3.523,3.523c1.027,1.027,1.171,2.641,0.342,3.834l-1.73,2.49	c0.477,0.93,0.889,1.898,1.214,2.907L57.531,30.556z M36,45c4.97,0,9-4.029,9-9c0-4.971-4.03-9-9-9s-9,4.029-9,9	C27,40.971,31.03,45,36,45z" />
                </svg>
            </span>

            <span class="menu-text text-md {{ $isActive('settings.*') ? 'font-semibold' : 'font-medium' }}">
                Settings
            </span>
        </a>

        <a href="{{ route('admin.periods.index') }}"
            class="{{ $linkBase }} {{ $isActive('admin.periods.*') ? $active : $inactive }}"
            aria-current="{{ $isActive('admin.periods.*') ? 'page' : 'false' }}">
            <span
                class="{{ $iconBox }} {{ $isActive('admin.periods.*') ? 'bg-primary/20' : 'bg-base-200/60 group-hover:bg-base-200' }}">
                <svg class="{{ $iconSvg }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
            </span>

            <span class="menu-text text-md {{ $isActive('admin.periods.*') ? 'font-semibold' : 'font-medium' }}">
                Manage Period
            </span>
        </a>
        @if(auth()->user()->role === 'super_admin')
            {{-- MANAGE ADMINS --}}
            <a href="{{ route('superadmin.admins.index') }}"
                class="{{ $linkBase }} {{ $isActive('superadmin.admins.*') ? $active : $inactive }}">
                <span class="{{ $iconBox }}">
                    <svg class="{{ $iconSvg }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </span>
                <span class="menu-text text-md {{ $isActive('superadmin.admins.*') ? 'font-semibold' : 'font-medium' }}">
                    Manage Admin
                </span>
            </a>
        @endif


    </nav>

    {{-- Sidebar Toggle --}}
    <button id="sidebarToggle" class="absolute top-1/2 -right-3 w-6 h-12
                   bg-base-300 rounded-r flex items-center justify-center
                   hover:bg-base-400 transition">
        <img src="{{ asset('images/icons/right-arrow.png') }}" id="sidebarArrow"
            class="w-4 h-4 transition-transform duration-300" alt="Toggle Sidebar">
    </button>

</aside>