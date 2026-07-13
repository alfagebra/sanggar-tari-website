<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title', 'Sanggar Seni Tari Indah') - Pelestarian Tari Tradisional</title>
    <meta name="description" content="@yield('meta_description', 'Website Resmi Sanggar Seni Tari Tradisional. Menyediakan informasi profil, sejarah, galeri pentas, dan jadwal latihan tari.')">
    <meta name="keywords" content="sanggar tari, tari tradisional, belajar tari, tari jawa, tari bali, tari sumatera, sanggar seni">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Google Analytics (gtag.js) -->
    @if(config('services.google.analytics_id') && config('services.google.analytics_id') !== 'G-XXXXXXXXXX')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.analytics_id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', "{{ config('services.google.analytics_id') }}");
        </script>
    @endif
</head>
<body>

    @php
        $layoutProfile = \App\Models\Profile::first();
    @endphp

    <!-- Header / Navbar -->
    <header class="navbar">
        <div class="container" style="position: relative;">
            <a href="{{ route('home') }}" class="logo-wrapper">
                @if($layoutProfile && $layoutProfile->logo_url)
                    <img src="{{ Str::startsWith($layoutProfile->logo_url, ['http://', 'https://']) ? $layoutProfile->logo_url : asset('storage/' . $layoutProfile->logo_url) }}" alt="Logo Sanggar">
                @else
                    <div style="background: var(--primary); color: var(--white); font-weight: 800; border-radius: 50%; width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; font-family: var(--font-heading); font-size: 1.2rem; box-shadow: var(--shadow);">S</div>
                @endif
                <span class="logo-text">Sanggar <span>Tari</span></span>
            </a>
            
            <div style="display: flex; align-items: center; gap: 16px;">
                <nav class="desktop-nav">
                    <ul class="nav-links" id="navLinks">
                        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">{{ __('Beranda') }}</a></li>
                        <li><a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">{{ __('Profil') }}</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="{{ request()->routeIs('gallery.index') ? 'active' : '' }}">{{ __('Galeri') }}</a></li>
                        <li><a href="{{ route('articles.index') }}" class="{{ request()->routeIs('articles.index') || request()->routeIs('articles.show') ? 'active' : '' }}">{{ __('Artikel') }}</a></li>
                        <li><a href="{{ route('schedule.index') }}" class="{{ request()->routeIs('schedule.index') ? 'active' : '' }}">{{ __('Jadwal') }}</a></li>
                    </ul>
                </nav>
                
                <!-- Language Switcher (EN/ID toggle pill) -->
                <a href="{{ route('lang.switch', App::getLocale() === 'id' ? 'en' : 'id') }}" class="btn btn-sm" style="font-size: 0.8rem; padding: 6px 14px; border-radius: 50px; font-weight: 800; border: 2px solid var(--primary); background: var(--primary-light); color: var(--primary); text-transform: uppercase; z-index: 101;">
                    {{ App::getLocale() === 'id' ? 'EN' : 'ID' }}
                </a>

                <!-- Hamburger Toggle Button -->
                <button class="nav-toggle" id="navToggle" aria-label="Open menu">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Side Drawer Navigation Menu -->
    <div class="nav-overlay" id="navOverlay"></div>
    <div class="side-drawer" id="sideDrawer">
        <div class="drawer-header">
            <span class="logo-text" style="font-size: 1.2rem; text-transform: uppercase; font-weight: 900; font-family: var(--font-heading);">Sanggar <span>Tari</span></span>
            <button class="nav-close" id="navClose" aria-label="Close menu" style="background: none; border: none; color: var(--text-heading); cursor: pointer; padding: 4px; display: flex; align-items: center; justify-content: center;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <ul class="drawer-links">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">{{ __('Beranda') }}</a></li>
            <li><a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">{{ __('Profil') }}</a></li>
            <li><a href="{{ route('gallery.index') }}" class="{{ request()->routeIs('gallery.index') ? 'active' : '' }}">{{ __('Galeri') }}</a></li>
            <li><a href="{{ route('articles.index') }}" class="{{ request()->routeIs('articles.index') || request()->routeIs('articles.show') ? 'active' : '' }}">{{ __('Artikel') }}</a></li>
            <li><a href="{{ route('schedule.index') }}" class="{{ request()->routeIs('schedule.index') ? 'active' : '' }}">{{ __('Jadwal') }}</a></li>
        </ul>
        <div class="drawer-footer">
            <p style="font-size: 0.75rem; color: var(--text-muted); text-align: center; border-top: 1px solid var(--border); padding-top: 16px;">&copy; {{ date('Y') }} {{ __('Sanggar Tari') }}</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navToggle = document.getElementById('navToggle');
            const navClose = document.getElementById('navClose');
            const navOverlay = document.getElementById('navOverlay');
            const sideDrawer = document.getElementById('sideDrawer');

            function openDrawer() {
                sideDrawer.classList.add('show');
                navOverlay.classList.add('show');
                document.body.style.overflow = 'hidden';
            }

            function closeDrawer() {
                sideDrawer.classList.remove('show');
                navOverlay.classList.remove('show');
                document.body.style.overflow = '';
            }

            if (navToggle) navToggle.addEventListener('click', openDrawer);
            if (navClose) navClose.addEventListener('click', closeDrawer);
            if (navOverlay) navOverlay.addEventListener('click', closeDrawer);
        });
    </script>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <h3>{{ __('Sanggar Tari') }}</h3>
                    <p>{{ __('Wadah kreativitas seni dan pelestarian budaya luhur Nusantara melalui keindahan gerak tari tradisional Indonesia.') }}</p>
                </div>
                
                <div class="footer-links">
                    <h4>{{ __('Navigasi') }}</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">{{ __('Beranda') }}</a></li>
                        <li><a href="{{ route('profile') }}">{{ __('Profil') }}</a></li>
                        <li><a href="{{ route('gallery.index') }}">{{ __('Galeri') }}</a></li>
                        <li><a href="{{ route('articles.index') }}">{{ __('Artikel') }}</a></li>
                        <li><a href="{{ route('schedule.index') }}">{{ __('Jadwal') }}</a></li>
                    </ul>
                </div>
                
                <div class="footer-contact">
                    <h4>{{ __('Hubungi Kami') }}</h4>
                    <p>📍 {{ $layoutProfile->address ?? 'Yogyakarta, Indonesia' }}</p>
                    <p>📞 {{ $layoutProfile->phone ?? '0812-3456-7890' }}</p>
                    <p>✉️ {{ $layoutProfile->email ?? 'info@sanggartari.com' }}</p>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} {{ __('Sanggar Tari') }}. {{ __('Semua Hak Cipta Dilindungi. KKN Individu Program Kerja.') }}</p>
            </div>
        </div>
    </footer>

</body>
</html>
