<aside id="sidebar"
       class="relative bg-base-100 border-r border-base-300 transition-all duration-300
              w-64 flex flex-col">

    @php
        $linkBase = "group flex items-center gap-3 px-4 py-3 rounded-full transition";
        $active   = "bg-primary text-white shadow-sm";
        $inactive = "hover:bg-base-200";
    @endphp

    <nav class="flex-1 p-3 space-y-2 mt-5">

        {{-- HOME (ACTIVE) --}}
        <a href="{{ route('dashboard-admin') }}"
           class="{{ $linkBase }} {{ $active }}">
            <img src="{{ asset('images/logo.webp') }}"
                 class="w-8 h-8"
                 alt="Home">
            <span class="menu-text text-md font-semibold">
                Home
            </span>
        </a>

        {{-- Documents --}}
        <a href="{{ route('dashboard-admin') }}"
           class="{{ $linkBase }} {{ $inactive }}">
            <img src="{{ asset('images/logo.webp') }}"
                 class="w-8 h-8 opacity-70"
                 alt="Documents">
            <span class="menu-text text-md text-base-content/70 group-hover:text-base-content">
                Documents
            </span>
        </a>

        {{-- Setting --}}
        <a href="{{ route('dashboard-admin') }}"
           class="{{ $linkBase }} {{ $inactive }}">
            <img src="{{ asset('images/logo.webp') }}"
                 class="w-8 h-8 opacity-70"
                 alt="Setting">
            <span class="menu-text text-md text-base-content/70 group-hover:text-base-content">
                Setting
            </span>
        </a>

    </nav>

    {{-- Sidebar Toggle --}}
    <button id="sidebarToggle"
        class="absolute top-1/2 -right-3 w-6 h-12
               bg-base-300 rounded-r flex items-center justify-center
               hover:bg-base-400 transition">

        <img src="{{ asset('images/icons/right-arrow.png') }}"
             id="sidebarArrow"
             class="w-4 h-4 transition-transform duration-300"
             alt="Toggle Sidebar">
    </button>

</aside>
