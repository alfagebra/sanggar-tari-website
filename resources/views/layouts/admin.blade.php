<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Admin Dashboard') - Panel Pengelola GSBK Candi</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Manrope:wght@200..800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Tailwind Custom Config -->
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "gold-primary": "#f2ca50",
                    "gold-dark": "#d4af37",
                    "cream-light": "#fdf8ec",
                    "cream-card": "#faf3e0",
                    "obsidian-dark": "#131313",
                    "obsidian-card": "#1e1c18",
                    "obsidian-border": "#d4af37"
            },
            "fontFamily": {
                    "headline-md": ["Playfair Display"],
                    "body-md": ["Manrope"]
            }
          },
        },
      }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .batik-overlay {
            background-image: radial-gradient(circle, rgba(212, 175, 55, 0.08) 1.5px, transparent 1.5px);
            background-size: 36px 36px;
        }
        .box-border-gold {
            border: 2px solid rgba(212, 175, 55, 0.4);
        }
        .box-border-gold-strong {
            border: 2px solid #f2ca50;
        }
    </style>
</head>
<body class="bg-[#131313] text-[#e5e2e1] batik-overlay min-h-screen">

    @php
        $adminProfile = \App\Models\Profile::first();
    @endphp

    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside class="w-full md:w-72 bg-[#1a1814] border-r-2 border-[#d4af37]/30 p-6 flex flex-col justify-between shadow-2xl">
            <div>
                <!-- Sidebar Logo -->
                <div class="flex items-center gap-3 pb-6 border-b border-[#d4af37]/20 mb-8">
                    @if($adminProfile && $adminProfile->logo_url)
                        <img src="{{ Str::startsWith($adminProfile->logo_url, ['http://', 'https://']) ? $adminProfile->logo_url : Storage::url($adminProfile->logo_url) }}" alt="Logo" class="w-11 h-11 rounded-full object-cover border-2 border-[#f2ca50]">
                    @else
                        <div class="w-11 h-11 rounded-full bg-[#f2ca50] text-[#3c2f00] font-black flex items-center justify-center font-headline-md text-xl shadow-md">GSBK</div>
                    @endif
                    <div>
                        <h3 class="font-headline-md font-bold text-[#f2ca50] text-xl">GSBK Candi</h3>
                        <p class="text-xs text-[#d0c5af]">Panel Admin Sanggar</p>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="space-y-3">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[#f2ca50] text-[#3c2f00] shadow-lg shadow-[#f2ca50]/20 font-black' : 'text-[#e5e2e1] bg-[#24211b] hover:bg-[#f2ca50]/20 hover:text-[#f2ca50] border border-[#d4af37]/20' }}">
                        <span class="material-symbols-outlined text-xl">dashboard</span>
                        Ikhtisar Dashboard
                    </a>
                    <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.profile') ? 'bg-[#f2ca50] text-[#3c2f00] shadow-lg shadow-[#f2ca50]/20 font-black' : 'text-[#e5e2e1] bg-[#24211b] hover:bg-[#f2ca50]/20 hover:text-[#f2ca50] border border-[#d4af37]/20' }}">
                        <span class="material-symbols-outlined text-xl">account_balance</span>
                        Profil Sanggar
                    </a>
                    <a href="{{ route('admin.articles') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.articles') || request()->routeIs('admin.articles.*') ? 'bg-[#f2ca50] text-[#3c2f00] shadow-lg shadow-[#f2ca50]/20 font-black' : 'text-[#e5e2e1] bg-[#24211b] hover:bg-[#f2ca50]/20 hover:text-[#f2ca50] border border-[#d4af37]/20' }}">
                        <span class="material-symbols-outlined text-xl">newspaper</span>
                        Kelola Artikel
                    </a>
                    <a href="{{ route('admin.galleries') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.galleries') || request()->routeIs('admin.galleries.*') ? 'bg-[#f2ca50] text-[#3c2f00] shadow-lg shadow-[#f2ca50]/20 font-black' : 'text-[#e5e2e1] bg-[#24211b] hover:bg-[#f2ca50]/20 hover:text-[#f2ca50] border border-[#d4af37]/20' }}">
                        <span class="material-symbols-outlined text-xl">photo_library</span>
                        Kelola Galeri
                    </a>
                    <a href="{{ route('admin.schedules') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all {{ request()->routeIs('admin.schedules') || request()->routeIs('admin.schedules.*') ? 'bg-[#f2ca50] text-[#3c2f00] shadow-lg shadow-[#f2ca50]/20 font-black' : 'text-[#e5e2e1] bg-[#24211b] hover:bg-[#f2ca50]/20 hover:text-[#f2ca50] border border-[#d4af37]/20' }}">
                        <span class="material-symbols-outlined text-xl">calendar_month</span>
                        Kelola Jadwal
                    </a>
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm text-[#d0c5af] bg-[#24211b] hover:bg-[#f2ca50]/20 hover:text-[#f2ca50] border border-[#d4af37]/20 transition-all">
                        <span class="material-symbols-outlined text-xl">open_in_new</span>
                        Lihat Website
                    </a>
                </nav>
            </div>

            <!-- Footer / Logout -->
            <div class="pt-6 border-t border-[#d4af37]/20 mt-8">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-3 px-4 py-3 rounded-xl font-bold text-sm bg-red-950/40 text-red-400 border border-red-800/40 hover:bg-red-900/60 transition-all">
                        <span class="material-symbols-outlined text-xl">logout</span>
                        Keluar (Logout)
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Workspace -->
        <main class="flex-1 p-6 md:p-10 overflow-y-auto">
            <!-- Top Header Bar -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center pb-6 border-b-2 border-[#d4af37]/20 mb-8 gap-4">
                <div>
                    <h2 class="font-headline-md text-3xl font-black text-[#f2ca50]">@yield('header_title', 'Dashboard')</h2>
                    <p class="text-xs text-[#d0c5af] mt-1 font-medium">Panel Pengelola GSBK Candi</p>
                </div>
                <div class="flex items-center gap-3 bg-[#24211b] border-2 border-[#f2ca50] px-5 py-2.5 rounded-xl shadow-lg">
                    <span class="w-3.5 h-3.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="text-sm font-bold text-[#f2ca50]">Halo, {{ Auth::user()->name }}</span>
                </div>
            </div>

            <!-- Notification Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-950/60 border-2 border-emerald-500 text-emerald-300 font-bold flex items-center gap-3 shadow-lg">
                    <span class="material-symbols-outlined">check_circle</span>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 rounded-xl bg-red-950/60 border-2 border-red-500 text-red-300 font-bold flex items-center gap-3 shadow-lg">
                    <span class="material-symbols-outlined">error</span>
                    {{ session('error') }}
                </div>
            @endif

            <!-- Page Content Slot -->
            @yield('content')
        </main>
    </div>

</body>
</html>