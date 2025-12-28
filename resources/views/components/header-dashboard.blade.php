<header class="fixed top-0 left-0 right-0 z-50 h-16
               bg-base-100 border-b border-base-300
               flex items-center justify-between px-6">

    {{-- LOGO + TITLE --}}
    <div class="flex items-center gap-3">
        <img src="{{ asset('images/Logo.webp') }}" class="h-10 w-auto" alt="Tremic Logo">

        <span class="font-bold text-xl text-secondary">
            Tremic
            <span class="font-normal text-lg">– Tracker Academic</span>
        </span>
    </div>

    {{-- USER PROFILE --}}
    <div class="dropdown dropdown-end">
        <label tabindex="0" class="flex items-center gap-3 cursor-pointer">
            {{-- User Info --}}
            <div class="hidden sm:flex flex-col items-end leading-tight">
                <span class="text-sm font-bold text-secondary">
                    Admin Fakultas
                </span>
                <span class="text-xs text-base-content/60">
                    Teknik Informatika
                </span>
            </div>

            {{-- Avatar --}}
            <div class="avatar">
                <div class="w-10 rounded-full ring-1 ring-primary/40">
                    <img src="{{ asset('images/logo.webp') }}" alt="User Avatar">
                </div>
            </div>
        </label>

        {{-- DROPDOWN MENU --}}
        <ul tabindex="0"
            class="dropdown-content mt-3 p-2 shadow
                   bg-base-100 border border-base-300
                   rounded-box w-52 text-sm">

            <li>
                <a href="#" class="flex items-center gap-2">
                    Account Settings
                </a>
            </li>

            <li>
                <a href="#" class="flex items-center gap-2">
                    Change Password
                </a>
            </li>

            <li><hr class="my-1"></li>

            <li>
                <a href="#" class="flex items-center gap-2 text-error">
                    Logout
                </a>
            </li>
        </ul>
    </div>

</header>
