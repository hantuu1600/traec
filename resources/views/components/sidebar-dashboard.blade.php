<aside id="sidebar"
       class="relative bg-base-100 border-r border-base-300 transition-all duration-300
              w-64 flex flex-col">

    {{-- Menu --}}
    <nav class="flex-1 p-3 space-y-2">
        <a href="#" class="flex items-center gap-3 p-2 rounded hover:bg-base-200">
            <img src="{{ asset('images/Logo.webp') }}"
                class="w-7 h-7 shrink-0"
                alt="Dashboard Icon">
            <span class="menu-text">Dashboard</span>
        </a>

        <a href="#" class="flex items-center gap-3 p-2 rounded hover:bg-base-200">
            <img src="{{ asset('images/Logo.webp') }}"
                class="w-7 h-7 shrink-0"
                alt="Documents Icon">

            <span class="menu-text">Documents</span>
        </a>

        <a href="#" class="flex items-center gap-3 p-2 rounded hover:bg-base-200">
            <img src="{{ asset('images/Logo.webp') }}"
                class="w-7 h-7 shrink-0"
                alt="Settings Icon">

            <span class="menu-text">Settings</span>
        </a>
    </nav>

    {{-- Sidebar Handle (Penarik) --}}
    <<button id="sidebarToggle"
        class="absolute top-1/2 -right-3 w-6 h-12
               bg-base-300 rounded-r flex items-center justify-center
               hover:bg-base-400 transition">

        <img src="{{ asset('images/icons/right-arrow.png') }}"
            class="w-4 h-4 transition-transform duration-300"
            id="sidebarArrow"
            alt="Toggle Sidebar">

    </button>

</aside>
