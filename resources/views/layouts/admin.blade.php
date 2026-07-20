<!DOCTYPE html>
<html id="admin-html" class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Admin Dashboard') - Panel Pengelola GSBK Candi</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Manrope:wght@200..800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Theme Initializer -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('adminTheme') || 'light';
            if (savedTheme === 'light') {
                document.documentElement.classList.remove('dark');
                document.documentElement.classList.add('light');
            } else {
                document.documentElement.classList.remove('light');
                document.documentElement.classList.add('dark');
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
        /* Light Theme (Clean, Soft Warm Cream - Lightweight & Professional) */
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
    </style>
</head>
<body class="admin-bg-color admin-text-color batik-overlay min-h-screen transition-colors duration-300">

    @php
        $adminProfile = \App\Models\Profile::first();
    @endphp

    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside class="w-full md:w-72 admin-sidebar-color border-r border-gold-subtle p-6 flex flex-col justify-between shadow-sm transition-colors duration-300">
            <div>
                <!-- Sidebar Logo -->
                <div class="flex items-center gap-3 pb-6 border-b admin-border-color mb-8">
                    @if($adminProfile && $adminProfile->logo_url)
                        <img src="{{ Str::startsWith($adminProfile->logo_url, ['http://', 'https://']) ? $adminProfile->logo_url : Storage::url($adminProfile->logo_url) }}" alt="Logo" class="w-10 h-10 rounded-full object-cover border border-[#b8860b]">
                    @else
                        <div class="w-10 h-10 rounded-full bg-primary text-on-primary font-bold flex items-center justify-center font-headline-md text-lg shadow-sm">GSBK</div>
                    @endif
                    <div>
                        <h3 class="font-headline-md font-bold admin-accent-color text-xl">GSBK Candi</h3>
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
                    <!-- Mode Switcher Button -->
                    <button id="theme-toggle-btn" type="button" class="flex items-center gap-2 px-4 py-2 rounded-xl border admin-border-color admin-card-color admin-text-color hover:bg-black/5 dark:hover:bg-white/5 transition-all text-xs font-bold shadow-sm cursor-pointer" title="Ganti Mode Tampilan">
                        <span id="theme-toggle-icon" class="material-symbols-outlined text-lg admin-accent-color">light_mode</span>
                        <span id="theme-toggle-text">Mode Cream</span>
                    </button>

                    <!-- Admin User Badge -->
                    <div class="flex items-center gap-3 admin-card-color border admin-border-color px-4 py-2 rounded-xl shadow-sm">
                        <span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-sm font-semibold admin-text-color">Halo, {{ Auth::user()->name }}</span>
                    </div>
                </div>
            </div>

            <!-- Notification Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-600 dark:text-emerald-400 font-medium flex items-center gap-3 shadow-sm">
                    <span class="material-symbols-outlined">check_circle</span>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-600 dark:text-red-400 font-medium flex items-center gap-3 shadow-sm">
                    <span class="material-symbols-outlined">error</span>
                    {{ session('error') }}
                </div>
            @endif

            <!-- Page Content Slot -->
            @yield('content')
        </main>
    </div>

    <!-- Theme Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('theme-toggle-btn');
            const icon = document.getElementById('theme-toggle-icon');
            const text = document.getElementById('theme-toggle-text');

            function updateBtnUI() {
                if (document.documentElement.classList.contains('light')) {
                    if (icon) icon.textContent = 'dark_mode';
                    if (text) text.textContent = 'Mode Dark';
                } else {
                    if (icon) icon.textContent = 'light_mode';
                    if (text) text.textContent = 'Mode Cream';
                }
            }

            updateBtnUI();

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function() {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        document.documentElement.classList.add('light');
                        localStorage.setItem('adminTheme', 'light');
                    } else {
                        document.documentElement.classList.remove('light');
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('adminTheme', 'dark');
                    }
                    updateBtnUI();
                });
            }
        });
    </script>
</body>
</html>