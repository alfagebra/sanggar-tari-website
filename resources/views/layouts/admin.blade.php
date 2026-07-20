<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Admin Dashboard') - Panel Pengelola Sanggar</title>
    
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
                    "outline-variant": "#4d4635",
                    "surface-container": "#201f1f",
                    "surface-container-high": "#2a2a2a",
                    "surface-container-low": "#1c1b1b",
                    "surface-dim": "#131313",
                    "primary": "#f2ca50",
                    "primary-container": "#d4af37",
                    "on-primary": "#3c2f00",
                    "background": "#131313",
                    "on-background": "#e5e2e1",
                    "on-surface": "#e5e2e1",
                    "on-surface-variant": "#d0c5af",
                    "outline": "#99907c"
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
            background-image: radial-gradient(circle, rgba(212, 175, 55, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }
        .text-glow {
            text-shadow: 0 0 15px rgba(242, 202, 80, 0.3);
        }
        .border-gold-subtle {
            border-color: rgba(139, 94, 60, 0.2);
        }
    </style>
</head>
<body class="bg-background text-on-background batik-overlay min-h-screen">

    @php
        $adminProfile = \App\Models\Profile::first();
    @endphp

    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside class="w-full md:w-72 bg-surface-container-low border-r border-outline-variant/20 p-6 flex flex-col justify-between">
            <div>
                <!-- Sidebar Logo -->
                <div class="flex items-center gap-3 pb-6 border-b border-outline-variant/20 mb-8">
                    @if($adminProfile && $adminProfile->logo_url)
                        <img src="{{ Str::startsWith($adminProfile->logo_url, ['http://', 'https://']) ? $adminProfile->logo_url : Storage::url($adminProfile->logo_url) }}" alt="Logo" class="w-10 h-10 rounded-full object-cover border border-primary/30">
                    @else
                        <div class="w-10 h-10 rounded-full bg-primary text-on-primary font-bold flex items-center justify-center font-headline-md text-lg">GSBK</div>
                    @endif
                    <div>
                        <h3 class="font-headline-md font-bold text-primary text-xl">GSBK Candi</h3>
                        <p class="text-xs text-on-surface-variant">Panel Admin Sanggar</p>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium text-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-primary/10 text-primary border-l-4 border-primary font-bold' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-primary' }}">
                        <span class="material-symbols-outlined text-xl">dashboard</span>
                        Ikhtisar Dashboard
                    </a>
                    <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium text-sm transition-all {{ request()->routeIs('admin.profile') ? 'bg-primary/10 text-primary border-l-4 border-primary font-bold' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-primary' }}">
                        <span class="material-symbols-outlined text-xl">account_balance</span>
                        Profil Sanggar
                    </a>
                    <a href="{{ route('admin.articles') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium text-sm transition-all {{ request()->routeIs('admin.articles') || request()->routeIs('admin.articles.*') ? 'bg-primary/10 text-primary border-l-4 border-primary font-bold' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-primary' }}">
                        <span class="material-symbols-outlined text-xl">newspaper</span>
                        Kelola Artikel
                    </a>
                    <a href="{{ route('admin.galleries') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium text-sm transition-all {{ request()->routeIs('admin.galleries') || request()->routeIs('admin.galleries.*') ? 'bg-primary/10 text-primary border-l-4 border-primary font-bold' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-primary' }}">
                        <span class="material-symbols-outlined text-xl">photo_library</span>
                        Kelola Galeri
                    </a>
                    <a href="{{ route('admin.schedules') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium text-sm transition-all {{ request()->routeIs('admin.schedules') || request()->routeIs('admin.schedules.*') ? 'bg-primary/10 text-primary border-l-4 border-primary font-bold' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-primary' }}">
                        <span class="material-symbols-outlined text-xl">calendar_month</span>
                        Kelola Jadwal
                    </a>
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium text-sm text-on-surface-variant hover:bg-surface-container-high hover:text-primary transition-all">
                        <span class="material-symbols-outlined text-xl">open_in_new</span>
                        Lihat Website
                    </a>
                </nav>
            </div>

            <!-- Footer / Logout -->
            <div class="pt-6 border-t border-outline-variant/20 mt-8">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg font-medium text-sm text-red-400 hover:bg-red-500/10 transition-all">
                        <span class="material-symbols-outlined text-xl">logout</span>
                        Keluar (Logout)
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Workspace -->
        <main class="flex-1 p-6 md:p-10 overflow-y-auto">
            <!-- Top Header Bar -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center pb-6 border-b border-outline-variant/20 mb-8 gap-4">
                <div>
                    <h2 class="font-headline-md text-2xl md:text-3xl font-bold text-primary">@yield('header_title', 'Dashboard')</h2>
                    <p class="text-xs text-on-surface-variant mt-1">Panel Kelola GSBK Candi</p>
                </div>
                <div class="flex items-center gap-3 bg-surface-container-high px-4 py-2 rounded-lg border border-gold-subtle">
                    <span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-sm font-medium text-on-surface">Halo, {{ Auth::user()->name }}</span>
                </div>
            </div>

            <!-- Notification Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 font-medium flex items-center gap-3">
                    <span class="material-symbols-outlined">check_circle</span>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400 font-medium flex items-center gap-3">
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