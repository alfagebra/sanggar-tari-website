<!DOCTYPE html>
<html id="admin-html" class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Admin Dashboard') - Panel Pengelola GSBK Candi</title>
    
    <!-- Favicon (Browser Icon) -->
    @php
        $adminProfile = \App\Models\Profile::first();
    @endphp
    @if($adminProfile && $adminProfile->logo_url)
        <link rel="icon" href="{{ Str::startsWith($adminProfile->logo_url, ['http://', 'https://']) ? $adminProfile->logo_url : Storage::url($adminProfile->logo_url) }}" type="image/x-icon">
    @else
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @endif
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Manrope:wght@200..800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Theme Initializer (System Theme Detection & Sync) -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                if (savedTheme === 'light') {
                    document.documentElement.classList.remove('dark');
                    document.documentElement.classList.add('light');
                } else {
                    document.documentElement.classList.remove('light');
                    document.documentElement.classList.add('dark');
                }
            } else {
                const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                if (systemPrefersDark) {
                    document.documentElement.classList.remove('light');
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    document.documentElement.classList.add('light');
                }
            }
        })();
    </script>

    <!-- Tailwind Custom Config -->
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "fontFamily": {
                    "headline-md": ["Playfair Display"],
                    "body-md": ["Manrope"]
            }
          },
        },
      }
    </script>
    <style>
        /* Light Theme (Clean, Soft Warm Cream) */
        html.light {
            --admin-bg: #fcf9f2;
            --admin-sidebar: #f8f3e8;
            --admin-card: #ffffff;
            --admin-card-alt: #f6f0e2;
            --admin-border: rgba(184, 134, 11, 0.2);
            --admin-text: #2a241b;
            --admin-muted: #6e6350;
            --admin-accent: #b8860b;
            --admin-nav-active-bg: #f3e8cc;
            --admin-nav-active-text: #8b6508;
            --admin-btn-bg: #b8860b;
            --admin-btn-text: #ffffff;
        }

        /* Dark Theme (Soft Obsidian & Heritage Gold) */
        html.dark {
            --admin-bg: #141311;
            --admin-sidebar: #1b1915;
            --admin-card: #211e19;
            --admin-card-alt: #28241d;
            --admin-border: rgba(212, 175, 55, 0.25);
            --admin-text: #f0eae1;
            --admin-muted: #c4bba9;
            --admin-accent: #f2ca50;
            --admin-nav-active-bg: rgba(242, 202, 80, 0.15);
            --admin-nav-active-text: #f2ca50;
            --admin-btn-bg: #f2ca50;
            --admin-btn-text: #3c2f00;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .batik-overlay {
            background-image: radial-gradient(circle, rgba(184, 134, 11, 0.05) 1.5px, transparent 1.5px);
            background-size: 36px 36px;
        }
        
        .admin-bg-color { background-color: var(--admin-bg); }
        .admin-sidebar-color { background-color: var(--admin-sidebar); }
        .admin-card-color { background-color: var(--admin-card); }
        .admin-card-alt-color { background-color: var(--admin-card-alt); }
        .admin-border-color { border-color: var(--admin-border); }
        .admin-text-color { color: var(--admin-text); }
        .admin-muted-color { color: var(--admin-muted); }
        .admin-accent-color { color: var(--admin-accent); }

        /* Force input text & textareas to have high contrast colors */
        input[type="text"], input[type="email"], input[type="password"], textarea, select {
            background-color: var(--admin-card-alt) !important;
            color: var(--admin-text) !important;
            border: 2px solid var(--admin-border) !important;
            border-radius: 0.75rem !important;
            padding: 0.875rem 1rem !important;
            font-size: 0.875rem !important;
            outline: none !important;
            transition: all 0.2s ease-in-out !important;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, textarea:focus, select:focus {
            border-color: var(--admin-accent) !important;
            box-shadow: 0 0 0 1px var(--admin-accent) !important;
        }
    </style>
</head>
<body class="admin-bg-color admin-text-color batik-overlay min-h-screen transition-colors duration-300">

    <!-- Mobile Header Bar (Visible on mobile/tablet) -->
    <header class="md:hidden flex items-center justify-between p-4 border-b admin-border-color admin-sidebar-color transition-colors duration-300">
        <a class="font-headline-md font-bold admin-accent-color text-lg flex items-center gap-2" href="{{ route('admin.dashboard') }}">
            @if($adminProfile && $adminProfile->logo_url)
                <img src="{{ Str::startsWith($adminProfile->logo_url, ['http://', 'https://']) ? $adminProfile->logo_url : Storage::url($adminProfile->logo_url) }}" alt="Logo" class="w-8 h-8 rounded-full object-cover">
            @endif
            {{ $adminProfile->name ?? 'GSBK Candi' }}
        </a>
        
        <div class="flex items-center gap-3">
            <button id="theme-toggle-mobile" class="admin-accent-color focus:outline-none p-1">
                <span class="material-symbols-outlined text-2xl">light_mode</span>
            </button>
            <button id="admin-mobile-btn" class="admin-accent-color focus:outline-none p-1">
                <span class="material-symbols-outlined text-2xl">menu</span>
            </button>
        </div>
    </header>

    <!-- Mobile Drawer Overlay -->
    <div id="admin-mobile-overlay" class="fixed inset-0 bg-black/60 z-40 hidden transition-opacity duration-300 opacity-0"></div>

    <!-- Mobile Sidebar Drawer -->
    <aside id="admin-mobile-drawer" class="fixed top-0 left-0 w-72 h-full admin-sidebar-color border-r admin-border-color z-50 p-6 flex flex-col justify-between transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden">
        <div>
            <div class="flex justify-between items-center pb-6 border-b admin-border-color mb-8">
                <span class="font-headline-md font-bold admin-accent-color text-lg">{{ $adminProfile->name ?? 'GSBK Candi' }}</span>
                <button id="admin-mobile-close" class="admin-text-color focus:outline-none p-1">
                    <span class="material-symbols-outlined text-2xl">close</span>
                </button>
            </div>
            
            <nav class="space-y-3">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[var(--admin-nav-active-bg)] text-[var(--admin-nav-active-text)]' : 'admin-text-color' }}">
                    <span class="material-symbols-outlined text-xl">dashboard</span>
                    Ikhtisar Dashboard
                </a>
                <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.profile') ? 'bg-[var(--admin-nav-active-bg)] text-[var(--admin-nav-active-text)]' : 'admin-text-color' }}">
                    <span class="material-symbols-outlined text-xl">account_balance</span>
                    Profil Sanggar
                </a>
                <a href="{{ route('admin.articles') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.articles') || request()->routeIs('admin.articles.*') ? 'bg-[var(--admin-nav-active-bg)] text-[var(--admin-nav-active-text)]' : 'admin-text-color' }}">
                    <span class="material-symbols-outlined text-xl">newspaper</span>
                    Kelola Artikel
                </a>
                <a href="{{ route('admin.galleries') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.galleries') || request()->routeIs('admin.galleries.*') ? 'bg-[var(--admin-nav-active-bg)] text-[var(--admin-nav-active-text)]' : 'admin-text-color' }}">
                    <span class="material-symbols-outlined text-xl">photo_library</span>
                    Kelola Galeri
                </a>
                <a href="{{ route('admin.schedules') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.schedules') || request()->routeIs('admin.schedules.*') ? 'bg-[var(--admin-nav-active-bg)] text-[var(--admin-nav-active-text)]' : 'admin-text-color' }}">
                    <span class="material-symbols-outlined text-xl">calendar_month</span>
                    Kelola Jadwal
                </a>
                <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm admin-muted-color transition-all">
                    <span class="material-symbols-outlined text-xl">open_in_new</span>
                    Lihat Website
                </a>
            </nav>
        </div>

        <div class="pt-6 border-t admin-border-color mt-8">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl font-medium text-sm text-red-600 bg-red-500/10 hover:bg-red-500/20 transition-all border border-red-500/20">
                    <span class="material-symbols-outlined text-xl">logout</span>
                    Keluar (Logout)
                </button>
            </form>
        </div>
    </aside>

    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Desktop Sidebar -->
        <aside class="hidden md:flex w-72 admin-sidebar-color border-r admin-border-color p-6 flex-col justify-between shadow-sm transition-colors duration-300">
            <div>
                <!-- Sidebar Logo -->
                <div class="flex items-center gap-3 pb-6 border-b admin-border-color mb-8">
                    @if($adminProfile && $adminProfile->logo_url)
                        <img src="{{ Str::startsWith($adminProfile->logo_url, ['http://', 'https://']) ? $adminProfile->logo_url : Storage::url($adminProfile->logo_url) }}" alt="Logo" class="w-10 h-10 rounded-full object-cover border border-[#b8860b]">
                    @else
                        <div class="w-10 h-10 rounded-full bg-primary text-on-primary font-bold flex items-center justify-center font-headline-md text-lg shadow-sm">GSBK</div>
                    @endif
                    <div>
                        <h3 class="font-headline-md font-bold admin-accent-color text-xl">{{ $adminProfile->name ?? 'GSBK Candi' }}</h3>
                        <p class="text-xs admin-muted-color">Panel Admin Sanggar</p>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[var(--admin-nav-active-bg)] text-[var(--admin-nav-active-text)] border-l-4 border-[#b8860b] font-bold shadow-sm' : 'admin-text-color hover:bg-black/5 dark:hover:bg-white/5' }}">
                        <span class="material-symbols-outlined text-xl">dashboard</span>
                        Ikhtisar Dashboard
                    </a>
                    <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.profile') ? 'bg-[var(--admin-nav-active-bg)] text-[var(--admin-nav-active-text)] border-l-4 border-[#b8860b] font-bold shadow-sm' : 'admin-text-color hover:bg-black/5 dark:hover:bg-white/5' }}">
                        <span class="material-symbols-outlined text-xl">account_balance</span>
                        Profil Sanggar
                    </a>
                    <a href="{{ route('admin.articles') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.articles') || request()->routeIs('admin.articles.*') ? 'bg-[var(--admin-nav-active-bg)] text-[var(--admin-nav-active-text)] border-l-4 border-[#b8860b] font-bold shadow-sm' : 'admin-text-color hover:bg-black/5 dark:hover:bg-white/5' }}">
                        <span class="material-symbols-outlined text-xl">newspaper</span>
                        Kelola Artikel
                    </a>
                    <a href="{{ route('admin.galleries') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.galleries') || request()->routeIs('admin.galleries.*') ? 'bg-[var(--admin-nav-active-bg)] text-[var(--admin-nav-active-text)] border-l-4 border-[#b8860b] font-bold shadow-sm' : 'admin-text-color hover:bg-black/5 dark:hover:bg-white/5' }}">
                        <span class="material-symbols-outlined text-xl">photo_library</span>
                        Kelola Galeri
                    </a>
                    <a href="{{ route('admin.schedules') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.schedules') || request()->routeIs('admin.schedules.*') ? 'bg-[var(--admin-nav-active-bg)] text-[var(--admin-nav-active-text)] border-l-4 border-[#b8860b] font-bold shadow-sm' : 'admin-text-color hover:bg-black/5 dark:hover:bg-white/5' }}">
                        <span class="material-symbols-outlined text-xl">calendar_month</span>
                        Kelola Jadwal
                    </a>
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm admin-muted-color hover:bg-black/5 dark:hover:bg-white/5 transition-all">
                        <span class="material-symbols-outlined text-xl">open_in_new</span>
                        Lihat Website
                    </a>
                </nav>
            </div>

            <!-- Footer / Logout -->
            <div class="pt-6 border-t admin-border-color mt-8">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl font-medium text-sm text-red-600 bg-red-500/10 hover:bg-red-500/20 transition-all border border-red-500/20">
                        <span class="material-symbols-outlined text-xl">logout</span>
                        Keluar (Logout)
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Workspace -->
        <main class="flex-1 p-6 md:p-10 overflow-y-auto">
            <!-- Top Header Bar -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center pb-6 border-b admin-border-color mb-8 gap-4">
                <div>
                    <h2 class="font-headline-md text-3xl font-bold admin-accent-color">@yield('header_title', 'Dashboard')</h2>
                    <p class="text-xs admin-muted-color mt-1 font-medium">Panel Pengelola GSBK Candi</p>
                </div>
                
                <div class="flex items-center gap-4">
                    <!-- Mode Switcher Button (Desktop only) -->
                    <button id="theme-toggle-btn" type="button" class="hidden md:flex items-center gap-2 px-4 py-2 rounded-xl border admin-border-color admin-card-color admin-text-color hover:bg-black/5 dark:hover:bg-white/5 transition-all text-xs font-bold shadow-sm cursor-pointer" title="Ganti Mode Tampilan">
                        <span id="theme-toggle-icon" class="material-symbols-outlined text-lg admin-accent-color">light_mode</span>
                        <span id="theme-toggle-text">Mode Cream</span>
                    </button>

                    <!-- Admin User Badge -->
                    <div class="flex items-center gap-3 admin-card-color border admin-border-color px-4 py-2 rounded-xl shadow-sm">
                        <span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-sm font-semibold admin-text-color font-bold">Halo, {{ Auth::user()->name }}</span>
                    </div>
                </div>
            </div>

            <!-- Page Content Slot -->
            @yield('content')
        </main>
    </div>

    <!-- Theme Toggle & Mobile Menu Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('theme-toggle-btn');
            const toggleBtnMobile = document.getElementById('theme-toggle-mobile');
            const icon = document.getElementById('theme-toggle-icon');
            const text = document.getElementById('theme-toggle-text');

            function updateBtnUI() {
                const isLight = document.documentElement.classList.contains('light');
                if (icon) icon.textContent = isLight ? 'dark_mode' : 'light_mode';
                if (text) text.textContent = isLight ? 'Mode Dark' : 'Mode Cream';
            }

            updateBtnUI();

            function toggleTheme() {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    document.documentElement.classList.add('light');
                    localStorage.setItem('theme', 'light');
                } else {
                    document.documentElement.classList.remove('light');
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
                updateBtnUI();
            }

            if (toggleBtn) toggleBtn.addEventListener('click', toggleTheme);
            if (toggleBtnMobile) toggleBtnMobile.addEventListener('click', toggleTheme);

            // Listen to system preferences dynamically
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                if (!localStorage.getItem('theme')) {
                    if (e.matches) {
                        document.documentElement.classList.remove('light');
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        document.documentElement.classList.add('light');
                    }
                    updateBtnUI();
                }
            });

            // Mobile Menu Drawer Logic
            const menuBtn = document.getElementById('admin-mobile-btn');
            const closeBtn = document.getElementById('admin-mobile-close');
            const overlay = document.getElementById('admin-mobile-overlay');
            const drawer = document.getElementById('admin-mobile-drawer');

            function openMobileMenu() {
                overlay.classList.remove('hidden');
                setTimeout(() => {
                    overlay.classList.remove('opacity-0');
                    drawer.classList.remove('-translate-x-full');
                }, 10);
            }

            function closeMobileMenu() {
                drawer.classList.add('-translate-x-full');
                overlay.classList.add('opacity-0');
                setTimeout(() => {
                    overlay.classList.add('hidden');
                }, 300);
            }

            if (menuBtn) menuBtn.addEventListener('click', openMobileMenu);
            if (closeBtn) closeBtn.addEventListener('click', closeMobileMenu);
            if (overlay) overlay.addEventListener('click', closeMobileMenu);
        });
    </script>
</body>
</html>