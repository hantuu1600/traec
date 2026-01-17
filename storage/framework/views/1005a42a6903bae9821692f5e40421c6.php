<aside id="sidebar"
    class="sticky top-16 h-[calc(100vh-4rem)] w-64 bg-base-100 border-r border-base-300 flex flex-col transition-all duration-300">

    <?php
        $linkBase = 'group flex items-center gap-3 px-3 py-2.5 rounded-full transition-all duration-200';
        $active = 'bg-primary text-primary-content shadow-sm';
        $inactive = 'text-base-content/70 hover:bg-base-200 hover:text-base-content';

        $iconBox = 'w-10 h-10 grid place-items-center rounded-full transition';
        $iconSvg = 'w-6 h-6 block transition';

        $isActive = fn($pattern) => request()->routeIs($pattern);
    ?>

    <nav class="flex-1 p-3 pt-6 space-y-1 overflow-auto">

        <a href="<?php echo e(route('lecturer.dashboard')); ?>"
            class="<?php echo e($linkBase); ?> <?php echo e($isActive('lecturer.dashboard') ? $active : $inactive); ?>"
            aria-current="<?php echo e($isActive('lecturer.dashboard') ? 'page' : 'false'); ?>">
            <span
                class="<?php echo e($iconBox); ?> <?php echo e($isActive('lecturer.dashboard') ? 'bg-primary/20' : 'bg-base-200/60 group-hover:bg-base-200'); ?>">
                <svg class="<?php echo e($iconSvg); ?>" viewBox="0 0 64 64" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path
                        d="M36,10c-1.139,0 -2.27708,0.38661 -3.20508,1.16211l-21.27734,17.7793c-1.465,1.224 -1.96564,3.32881 -1.05664,5.00781c1.251,2.309 4.20051,2.79122 6.10352,1.19922l18.79492,-15.70313c0.371,-0.31 0.91025,-0.31 1.28125,0l18.79492,15.70313c0.748,0.626 1.6575,0.92969 2.5625,0.92969c1.173,0 2.33591,-0.51091 3.12891,-1.50391c1.377,-1.724 0.98597,-4.27055 -0.70703,-5.68555l-2.41992,-2.02148v-10.19922c0,-1.473 -1.19402,-2.66797 -2.66602,-2.66797h-2.66602c-1.473,0 -2.66797,1.19497 -2.66797,2.66797v3.51367l-10.79492,-9.01953c-0.928,-0.7755 -2.06608,-1.16211 -3.20508,-1.16211zM35.99609,22.92578l-22,18.37695v8.69727c0,4.418 3.582,8 8,8h28c4.418,0 8,-3.582 8,-8v-8.69727zM32,38h8c1.105,0 2,0.895 2,2v10h-12v-10c0,-1.105 0.895,-2 2,-2z" />
                </svg>
            </span>

            <span class="menu-text text-sm <?php echo e($isActive('lecturer.dashboard') ? 'font-semibold' : 'font-medium'); ?>">
                Home
            </span>
        </a>

        <a href="<?php echo e(route('lecturer.teaching.index')); ?>"
            class="<?php echo e($linkBase); ?> <?php echo e($isActive('lecturer.teaching.*') ? $active : $inactive); ?>"
            aria-current="<?php echo e($isActive('lecturer.teaching.*') ? 'page' : 'false'); ?>">
            <span
                class="<?php echo e($iconBox); ?> <?php echo e($isActive('lecturer.teaching.*') ? 'bg-primary/20' : 'bg-base-200/60 group-hover:bg-base-200'); ?>">
                <svg class="<?php echo e($iconSvg); ?>" viewBox="0 0 72 72" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path
                        d="M 25 11 C 20.029 11 16 15.029 16 20 L 16 52 C 16 56.971 20.029 61 25 61 L 47 61 C 51.971 61 56.971 56 56 52 L 56 31 L 42 31 C 38.686 31 36 28.314 36 25 L 36 11 L 25 11 z M 40 11.34375 L 40 25 C 40 26.105 40.896 27 42 27 L 55.65625 27 L 40 11.34375 z M 29 38 L 43 38 C 44.104 38 45 38.895 45 40 C 45 41.105 44.104 42 43 42 L 29 42 C 27.896 42 27 41.105 27 40 C 27 38.895 27.896 38 29 38 z M 29 47 L 43 47 C 44.104 47 45 47.895 45 49 C 45 50.105 44.104 51 43 51 L 29 51 C 27.896 51 27 50.105 27 49 C 27 47.895 27.896 47 29 47 z" />
                </svg>
            </span>

            <span class="menu-text text-sm <?php echo e($isActive('lecturer.teaching.*') ? 'font-semibold' : 'font-medium'); ?>">
                Teaching
            </span>
        </a>

        <a href="<?php echo e(route('lecturer.research.index')); ?>"
            class="<?php echo e($linkBase); ?> <?php echo e($isActive('lecturer.research.*') ? $active : $inactive); ?>"
            aria-current="<?php echo e($isActive('lecturer.research.*') ? 'page' : 'false'); ?>">
            <span
                class="<?php echo e($iconBox); ?> <?php echo e($isActive('lecturer.research.*') ? 'bg-primary/20' : 'bg-base-200/60 group-hover:bg-base-200'); ?>">
                <svg class="<?php echo e($iconSvg); ?>" viewBox="0 0 72 72" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path
                        d="M 25 11 C 20.029 11 16 15.029 16 20 L 16 52 C 16 56.971 20.029 61 25 61 L 47 61 C 51.971 61 56.971 56 56 52 L 56 31 L 42 31 C 38.686 31 36 28.314 36 25 L 36 11 L 25 11 z M 40 11.34375 L 40 25 C 40 26.105 40.896 27 42 27 L 55.65625 27 L 40 11.34375 z M 29 38 L 43 38 C 44.104 38 45 38.895 45 40 C 45 41.105 44.104 42 43 42 L 29 42 C 27.896 42 27 41.105 27 40 C 27 38.895 27.896 38 29 38 z M 29 47 L 43 47 C 44.104 47 45 47.895 45 49 C 45 50.105 44.104 51 43 51 L 29 51 C 27.896 51 27 50.105 27 49 C 27 47.895 27.896 47 29 47 z" />
                </svg>
            </span>

            <span class="menu-text text-sm <?php echo e($isActive('lecturer.research.*') ? 'font-semibold' : 'font-medium'); ?>">
                Research
            </span>
        </a>

        <a href="<?php echo e(route('lecturer.community-service.index')); ?>"
            class="<?php echo e($linkBase); ?> <?php echo e($isActive('lecturer.community-service.*') ? $active : $inactive); ?>"
            aria-current="<?php echo e($isActive('lecturer.community-service.*') ? 'page' : 'false'); ?>">
            <span
                class="<?php echo e($iconBox); ?> <?php echo e($isActive('lecturer.community-service.*') ? 'bg-primary/20' : 'bg-base-200/60 group-hover:bg-base-200'); ?>">
                <svg class="<?php echo e($iconSvg); ?>" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </span>

            <span
                class="menu-text text-sm <?php echo e($isActive('lecturer.community-service.*') ? 'font-semibold' : 'font-medium'); ?>">
                Community Service
            </span>
        </a>

        <a href="<?php echo e(route('lecturer.support.index')); ?>"
            class="<?php echo e($linkBase); ?> <?php echo e($isActive('lecturer.support.*') ? $active : $inactive); ?>"
            aria-current="<?php echo e($isActive('lecturer.support.*') ? 'page' : 'false'); ?>">
            <span
                class="<?php echo e($iconBox); ?> <?php echo e($isActive('lecturer.support.*') ? 'bg-primary/20' : 'bg-base-200/60 group-hover:bg-base-200'); ?>">
                <svg class="<?php echo e($iconSvg); ?>" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                </svg>
            </span>

            <span class="menu-text text-sm <?php echo e($isActive('lecturer.support.*') ? 'font-semibold' : 'font-medium'); ?>">
                Other Activities
            </span>
        </a>

        <a href="<?php echo e(route('lecturer.verified-documents.index')); ?>"
            class="<?php echo e($linkBase); ?> <?php echo e($isActive('lecturer.verified-documents.*') ? $active : $inactive); ?>"
            aria-current="<?php echo e($isActive('lecturer.verified-documents.*') ? 'page' : 'false'); ?>">
            <span
                class="<?php echo e($iconBox); ?> <?php echo e($isActive('lecturer.verified-documents.*') ? 'bg-primary/20' : 'bg-base-200/60 group-hover:bg-base-200'); ?>">
                <svg class="<?php echo e($iconSvg); ?>" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </span>

            <span
                class="menu-text text-sm <?php echo e($isActive('lecturer.verified-documents.*') ? 'font-semibold' : 'font-medium'); ?>">
                Verified Documents
            </span>
        </a>

        <a href="<?php echo e(route('lecturer.profile')); ?>"
            class="<?php echo e($linkBase); ?> <?php echo e($isActive('lecturer.profile') ? $active : $inactive); ?>"
            aria-current="<?php echo e($isActive('lecturer.profile') ? 'page' : 'false'); ?>">
            <span
                class="<?php echo e($iconBox); ?> <?php echo e($isActive('lecturer.profile') ? 'bg-primary/20' : 'bg-base-200/60 group-hover:bg-base-200'); ?>">
                <svg class="<?php echo e($iconSvg); ?>" viewBox="0 0 72 72" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path
                        d="M57.531,30.556C58.96,30.813,60,32.057,60,33.509v4.983c0,1.452-1.04,2.696-2.469,2.953l-2.974,0.535c-0.325,1.009-0.737,1.977-1.214,2.907l1.73,2.49c0.829,1.192,0.685,2.807-0.342,3.834l-3.523,3.523c-1.027,1.027-2.642,1.171-3.834,0.342l-2.49-1.731c-0.93,0.477-1.898,0.889-2.906,1.214l-0.535,2.974C41.187,58.96,39.943,60,38.491,60h-4.983c-1.452,0-2.696-1.04-2.953-2.469l-0.535-2.974c-1.009-0.325-1.977-0.736-2.906-1.214l-2.49,1.731c-1.192,0.829-2.807,0.685-3.834-0.342l-3.523-3.523c-1.027-1.027-1.171-2.641-0.342-3.834l1.73-2.49c-0.477-0.93-0.889-1.898-1.214-2.907l-2.974-0.535C13.04,41.187,12,39.943,12,38.491v-4.983c0-1.452,1.04-2.696,2.469-2.953l2.974-0.535c0.325-1.009,0.737-1.977,1.214-2.907l-1.73-2.49c-0.829-1.192-0.685-2.807,0.342-3.834l3.523-3.523c1.027-1.027,2.642-1.171,3.834-0.342l2.49,1.731c0.93-0.477,1.898-0.889,2.906-1.214l0.535-2.974C30.813,13.04,32.057,12,33.509,12h4.983c1.452,0,2.696,1.04,2.953,2.469l0.535,2.974c1.009,0.325,1.977,0.736,2.906,1.214l2.49-1.731c1.192-0.829,2.807-0.685,3.834,0.342l3.523,3.523c1.027,1.027,1.171,2.641,0.342,3.834l-1.73,2.49c0.477,0.93,0.889,1.898,1.214,2.907L57.531,30.556z M36,45c4.97,0,9-4.029,9-9c0-4.971-4.03-9-9-9s-9,4.029-9,9C27,40.971,31.03,45,36,45z" />
                </svg>
            </span>

            <span class="menu-text text-sm <?php echo e($isActive('lecturer.profile') ? 'font-semibold' : 'font-medium'); ?>">
                Settings
            </span>
        </a>

    </nav>

    <button id="sidebarToggle" type="button" aria-label="Toggle sidebar"
        class="absolute top-1/2 -translate-y-1/2 -right-3 w-6 h-12 bg-base-300 rounded-r flex items-center justify-center hover:bg-base-200 transition">
        <img src="<?php echo e(asset('images/icons/right-arrow.png')); ?>" id="sidebarArrow"
            class="w-4 h-4 transition-transform duration-300" alt="">
    </button>

</aside><?php /**PATH D:\traec\resources\views/components/lecturer-sidebar.blade.php ENDPATH**/ ?>