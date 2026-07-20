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
    
    <!-- Theme Initializer (Prevents Flash) -->
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
        /* Light Theme (Warm Cream - Gentle on Eyes) */
        html.light {
            --admin-bg: #fcf8f0;
            --admin-sidebar: #f4ecdc;
            --admin-card: #ffffff;
            --admin-card-alt: #f7f1e3;
            --admin-border: #e2c775;
            --admin-text: #2c251a;
            --admin-muted: #6e624f;
            --admin-accent: #b8860b;
            --admin-[#f2ca50]: #b8860b;
        }

        /* Dark Theme (Soft Obsidian & Gold) */
        html.dark {
            --admin-bg: #141311;
            --admin-sidebar: #1c1a16;
            --admin-card: #221f1a;
            --admin-card-alt: #2b2720;
            --admin-border: rgba(212, 175, 55, 0.4);
            --admin-text: #f0eae1;
            --admin-muted: #c4bba9;
            --admin-accent: #f2ca50;
            --admin-[#f2ca50]: #f2ca50;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .batik-overlay {
            background-image: radial-gradient(circle, rgba(184, 134, 11, 0.08) 1.5px, transparent 1.5px);
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
        <aside class="w-full md:w-72 admin-sidebar-color border-r-2 admin-border-color p-6 flex flex-col justify-between shadow-2xl transition-colors duration-300">
            <div>
                <!-- Sidebar Logo -->
                <div class="flex items-center gap-3 pb-6 border-b admin-border-color mb-8">
                    @if($adminProfile && $adminProfile->logo_url)
                        <img src="{{ Str::startsWith($adminProfile->logo_url, ['http://', 'https://']) ? $adminProfile->logo_url : Storage::url($adminProfile->logo_url) }}" alt="Logo" class="w-11 h-11 rounded-full object-cover border-2 border-[#b8860b]">
                    @else
                        <div class="w-11 h-11 rounded-full bg-[#f2ca50] text-[#3c2f00] font-black flex items-center justify-center font-headline-md text-xl shadow-md">GSBK</div>
                    @endif
                    <div>
                        <h3 class="font-headline-md font-bold admin-accent-color text-xl">GSBK Candi</h3>
                        <p class="text-xs admin-muted-color">Panel Admin Sanggar</p>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="space-y-3">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[#f2ca50] text-[#3c2f00] shadow-lg font-black' : 'admin-text-color admin-card-alt-color hover:bg-[#f2ca50]/20 hover:text-[#b8860b] border admin-border-color' }}">
                        <span class="material-symbols-outlined text-xl">dashboard</span>
                        Ikhtisar Dashboard
                    </a>
                    <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.profile') ? 'bg-[#f2ca50] text-[#3c2f00] shadow-lg font-black' : 'admin-text-color admin-card-alt-color hover:bg-[#f2ca50]/20 hover:text-[#b8860b] border admin-border-color' }}">
                        <span class="material-symbols-outlined text-xl">account_balance</span>
                        Profil Sanggar
                    </a>
                    <a href="{{ route('admin.articles') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.articles') || request()->routeIs('admin.articles.*') ? 'bg-[#f2ca50] text-[#3c2f00] shadow-lg font-black' : 'admin-text-color admin-card-alt-color hover:bg-[#f2ca50]/20 hover:text-[#b8860b] border admin-border-color' }}">
                        <span class="material-symbols-outlined text-xl">newspaper</span>
                        Kelola Artikel
                    </a>
                    <a href="{{ route('admin.galleries') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.galleries') || request()->routeIs('admin.galleries.*') ? 'bg-[#f2ca50] text-[#3c2f00] shadow-lg font-black' : 'admin-text-color admin-card-alt-color hover:bg-[#f2ca50]/20 hover:text-[#b8860b] border admin-border-color' }}">
                        <span class="material-symbols-outlined text-xl">photo_library</span>
                        Kelola Galeri
                    </a>
                    <a href="{{ route('admin.schedules') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.schedules') || request()->routeIs('admin.schedules.*') ? 'bg-[#f2ca50] text-[#3c2f00] shadow-lg font-black' : 'admin-text-color admin-card-alt-color hover:bg-[#f2ca50]/20 hover:text-[#b8860b] border admin-border-color' }}">
                        <span class="material-symbols-outlined text-xl">calendar_month</span>
                        Kelola Jadwal
                    </a>
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm admin-muted-color admin-card-alt-color hover:bg-[#f2ca50]/20 hover:text-[#b8860b] border admin-border-color transition-all">
                        <span class="material-symbols-outlined text-xl">open_in_new</span>
                        Lihat Website
                    </a>
                </nav>
            </div>

            <!-- Footer / Logout -->
            <div class="pt-6 border-t admin-border-color mt-8">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-3 px-4 py-3 rounded-xl font-bold text-sm bg-red-900/10 text-red-600 border border-red-500/30 hover:bg-red-900/20 transition-all">
                        <span class="material-symbols-outlined text-xl">logout</span>
                        Keluar (Logout)
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Workspace -->
        <main class="flex-1 p-6 md:p-10 overflow-y-auto">
            <!-- Top Header Bar -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center pb-6 border-b-2 admin-border-color mb-8 gap-4">
                <div>
                    <h2 class="font-headline-md text-3xl font-black admin-accent-color">@yield('header_title', 'Dashboard')</h2>
                    <p class="text-xs admin-muted-color mt-1 font-medium">Panel Pengelola GSBK Candi</p>
                </div>
                
                <div class="flex items-center gap-4">
                    <!-- Mode Switcher Button -->
                    <button id="theme-toggle-btn" type="button" class="flex items-center gap-2 px-4 py-2.5 rounded-xl border-2 border-[#d4af37] admin-card-color admin-text-color hover:scale-105 transition-all text-xs font-bold shadow-md cursor-pointer" title="Ganti Mode Tampilan (Cream / Dark)">
                        <span id="theme-toggle-icon" class="material-symbols-outlined text-xl admin-accent-color">light_mode</span>
                        <span id="theme-toggle-text">Mode Gelap</span>
                    </button>

                    <!-- Admin User Badge -->
                    <div class="flex items-center gap-3 admin-card-alt-color border-2 border-[#f2ca50] px-4 py-2 rounded-xl shadow-md">
                        <span class="w-3.5 h-3.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-sm font-bold admin-text-color">Halo, {{ Auth::user()->name }}</span>
                    </div>
                </div>
            </div>

            <!-- Notification Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border-2 border-emerald-500 text-emerald-600 font-bold flex items-center gap-3 shadow-md">
                    <span class="material-symbols-outlined">check_circle</span>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 rounded-xl bg-red-500/10 border-2 border-red-500 text-red-600 font-bold flex items-center gap-3 shadow-md">
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