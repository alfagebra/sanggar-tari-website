<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Panel Pengelola Sanggar</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @php
        $adminProfile = \App\Models\Profile::first();
    @endphp

    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-logo">
                @if($adminProfile && $adminProfile->logo_url)
                    <img src="{{ Storage::url($adminProfile->logo_url) }}" alt="Logo">
                @else
                    <div style="background: var(--secondary); color: var(--dark); font-weight: 800; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; font-size: 1rem;">A</div>
                @endif
                <h3>Admin Sanggar</h3>
            </div>
            
            <ul class="sidebar-menu">
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">📊 Ikhtisar</a>
                </li>
                <li class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                    <a href="{{ route('admin.profile') }}">🏢 Profil Sanggar</a>
                </li>
                <li class="{{ request()->routeIs('admin.articles') || request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.articles') }}">📰 Kelola Artikel</a>
                </li>
                <li class="{{ request()->routeIs('admin.galleries') || request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.galleries') }}">📸 Kelola Galeri</a>
                </li>
                <li class="{{ request()->routeIs('admin.schedules') || request()->routeIs('admin.schedules.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.schedules') }}">📅 Kelola Jadwal</a>
                </li>
                <li>
                    <a href="{{ route('home') }}" target="_blank">🌐 Lihat Website</a>
                </li>
            </ul>
            
            <div class="sidebar-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">🚪 Keluar (Logout)</button>
                </form>
            </div>
        </aside>

        <!-- Main Workspace -->
        <main class="main-content">
            <!-- Header -->
            <header class="admin-header">
                <h2>@yield('header_title', 'Dashboard')</h2>
                <div style="font-weight: 600; color: var(--text-dark);">
                    Halo, {{ Auth::user()->name }}
                </div>
            </header>

            <!-- Notifications -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Content Slot -->
            @yield('content')
        </main>
    </div>

</body>
</html>
