<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'GSBK Candi') - Gubug Seni Begog Kiyatdiharjan</title>
    <meta name="description" content="@yield('meta_description', 'Website Resmi Sanggar Seni Tari Tradisional. Menyediakan informasi profil, sejarah, galeri pentas, dan jadwal latihan tari.')">
    
    <!-- Theme Initializer (Prevents Flash) -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('publicTheme') || 'dark';
            if (savedTheme === 'light') {
                document.documentElement.classList.remove('dark');
                document.documentElement.classList.add('light');
            } else {
                document.documentElement.classList.remove('light');
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

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
            "spacing": {
                    "container-max": "1280px",
                    "margin-desktop": "80px"
            },
            "fontFamily": {
                    "headline-lg": ["Playfair Display"],
                    "label-md": ["Manrope"],
                    "body-md": ["Manrope"],
                    "headline-md": ["Playfair Display"],
                    "display-lg": ["Playfair Display"],
                    "body-lg": ["Manrope"]
            }
          },
        },
      }
    </script>
    <style>
        /* Light Theme (Warm Cream & Royal Gold) */
        html.light {
            --bg-body: #fdfaf3;
            --bg-surface: #f7f1e3;
            --bg-surface-high: #f0e6d2;
            --bg-surface-low: #ffffff;
            --text-main: #2a2419;
            --text-variant: #594e3a;
            --primary: #b8860b;
            --primary-container: #d4af37;
            --on-primary: #ffffff;
            --hero-grad: linear-gradient(0deg, #fdfaf3 0%, rgba(253, 250, 243, 0.4) 50%, rgba(253, 250, 243, 0) 100%);
            --border-gold: rgba(184, 134, 11, 0.25);
            --header-bg: rgba(253, 250, 243, 0.9);
        }

        /* Dark Theme (Obsidian & Heritage Gold) */
        html.dark {
            --bg-body: #131313;
            --bg-surface: #201f1f;
            --bg-surface-high: #2a2a2a;
            --bg-surface-low: #1c1b1b;
            --text-main: #e5e2e1;
            --text-variant: #d0c5af;
            --primary: #f2ca50;
            --primary-container: #d4af37;
            --on-primary: #3c2f00;
            --hero-grad: linear-gradient(0deg, #131313 0%, rgba(19, 19, 19, 0.2) 50%, rgba(19, 19, 19, 0) 100%);
            --border-gold: rgba(139, 94, 60, 0.2);
            --header-bg: rgba(19, 19, 19, 0.8);
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        header {
            background-color: var(--header-bg) !important;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .batik-overlay {
            background-image: radial-gradient(circle, rgba(184, 134, 11, 0.08) 1.5px, transparent 1.5px);
            background-size: 40px 40px;
        }
        .hero-gradient {
            background: var(--hero-grad) !important;
        }
        .text-glow {
            text-shadow: 0 0 15px rgba(242, 202, 80, 0.3);
        }

        /* Responsive Utilities mapped to CSS variables */
        .bg-background { background-color: var(--bg-body); }
        .bg-surface-dim { background-color: var(--bg-body); }
        .bg-surface-container-low { background-color: var(--bg-surface-low); }
        .bg-surface-container { background-color: var(--bg-surface); }
        .bg-surface-container-high { background-color: var(--bg-surface-high); }
        
        .text-on-background { color: var(--text-main); }
        .text-on-surface { color: var(--text-main); }
        .text-on-surface-variant { color: var(--text-variant); }
        .text-primary { color: var(--primary); }
        .bg-primary { background-color: var(--primary); }
        .text-on-primary { color: var(--on-primary); }
        .border-gold-subtle { border-color: var(--border-gold); }
    </style>
</head>
<body class="bg-background text-on-background batik-overlay selection:bg-primary-container selection:text-on-primary-container">

    @php
        $layoutProfile = \App\Models\Profile::first();
    @endphp

    <!-- TopNavBar -->
    <header class="fixed top-0 left-0 w-full z-50 backdrop-blur-md border-b border-gold-subtle transition-colors duration-300">
        <nav class="max-w-container-max mx-auto px-4 md:px-margin-desktop h-20 flex justify-between items-center">
            <!-- Brand Logo -->
            <a class="font-headline-md text-2xl md:text-headline-md font-bold text-primary tracking-tight flex items-center gap-3" href="{{ route('home') }}">
                @if($layoutProfile && $layoutProfile->logo_url)
                    <img src="{{ Str::startsWith($layoutProfile->logo_url, ['http://', 'https://']) ? $layoutProfile->logo_url : Storage::url($layoutProfile->logo_url) }}" alt="Logo" class="w-10 h-10 rounded-full object-cover">
                @endif
                GSBK Candi
            </a>
            
            <!-- Navigation Links -->
            <div class="hidden md:flex items-center gap-8 lg:gap-10">
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ route('home') }}#sejarah">Sejarah</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ route('articles.index') }}">Artikel</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ route('gallery.index') }}">Galeri</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ route('schedule.index') }}">Jadwal</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ route('home') }}#lokasi">Lokasi</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ route('home') }}#kontak">Kontak</a>
            </div>

            <!-- Trailing Actions & Theme Toggle -->
            <div class="flex items-center gap-3 md:gap-5">
                <!-- Theme Toggle Button Desktop -->
                <button id="public-theme-btn" type="button" class="flex items-center gap-1.5 px-3 py-1.5 rounded-full border border-gold-subtle bg-surface-container-low text-primary hover:scale-105 transition-all text-xs font-bold shadow cursor-pointer" title="Ganti Mode Tampilan (Cream / Dark)">
                    <span id="public-theme-icon" class="material-symbols-outlined text-lg">light_mode</span>
                </button>

                @auth
                    <a href="{{ route('admin.dashboard') }}" class="hidden md:inline-block bg-primary text-on-primary px-6 py-2 font-label-md text-label-md rounded-lg hover:scale-105 transition-all duration-200">Admin</a>
                @endauth
                
                <!-- Mobile Hamburger Button -->
                <button id="mobile-menu-btn" type="button" class="md:hidden flex items-center justify-center p-2 text-primary hover:text-primary-fixed-dim transition-colors focus:outline-none" aria-label="Toggle Navigation">
                    <span class="material-symbols-outlined text-3xl">menu</span>
                </button>
            </div>
        </nav>
    </header>

    <!-- Mobile Navigation Drawer Overlay -->
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 hidden opacity-0 transition-opacity duration-300"></div>

    <!-- Mobile Navigation Drawer -->
    <aside id="mobile-menu-drawer" class="fixed top-0 right-0 w-72 h-full bg-surface-container-low border-l border-gold-subtle z-50 p-6 flex flex-col justify-between transform translate-x-full transition-transform duration-300 ease-in-out">
        <div>
            <!-- Header with Close Button -->
            <div class="flex justify-between items-center pb-6 border-b border-gold-subtle mb-8">
                <a class="font-headline-md text-xl font-bold text-primary tracking-tight" href="{{ route('home') }}">GSBK Candi</a>
                <button id="mobile-menu-close" type="button" class="text-on-surface-variant hover:text-primary transition-colors p-1 focus:outline-none">
                    <span class="material-symbols-outlined text-2xl">close</span>
                </button>
            </div>

            <!-- Mobile Nav Links -->
            <nav class="flex flex-col space-y-4">
                <a class="font-label-md text-body-lg text-on-surface-variant hover:text-primary transition-colors py-2 border-b border-gold-subtle" href="{{ route('home') }}#sejarah" onclick="closeMobileMenu()">Sejarah</a>
                <a class="font-label-md text-body-lg text-on-surface-variant hover:text-primary transition-colors py-2 border-b border-gold-subtle" href="{{ route('articles.index') }}" onclick="closeMobileMenu()">Artikel</a>
                <a class="font-label-md text-body-lg text-on-surface-variant hover:text-primary transition-colors py-2 border-b border-gold-subtle" href="{{ route('gallery.index') }}" onclick="closeMobileMenu()">Galeri</a>
                <a class="font-label-md text-body-lg text-on-surface-variant hover:text-primary transition-colors py-2 border-b border-gold-subtle" href="{{ route('schedule.index') }}" onclick="closeMobileMenu()">Jadwal</a>
                <a class="font-label-md text-body-lg text-on-surface-variant hover:text-primary transition-colors py-2 border-b border-gold-subtle" href="{{ route('home') }}#lokasi" onclick="closeMobileMenu()">Lokasi</a>
                <a class="font-label-md text-body-lg text-on-surface-variant hover:text-primary transition-colors py-2 border-b border-gold-subtle" href="{{ route('home') }}#kontak" onclick="closeMobileMenu()">Kontak</a>
            </nav>
        </div>

        <div class="pt-6 border-t border-gold-subtle space-y-3">
            <!-- Mobile Mode Switcher -->
            <button id="mobile-theme-btn" type="button" class="w-full flex items-center justify-center gap-2 py-3 rounded-lg border border-gold-subtle bg-surface-container text-primary font-bold text-sm">
                <span id="mobile-theme-icon" class="material-symbols-outlined text-lg">light_mode</span>
                <span id="mobile-theme-text">Mode Cream</span>
            </button>

            @auth
                <a href="{{ route('admin.dashboard') }}" class="w-full bg-primary text-on-primary text-center py-3 rounded-lg font-bold text-sm block">Dashboard Admin</a>
            @endauth
        </div>
    </aside>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-surface-dim border-t border-gold-subtle pt-20 pb-10">
        <div class="max-w-container-max mx-auto px-4 md:px-margin-desktop">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-20">
                <div class="md:col-span-2">
                    <a class="font-headline-md text-headline-md text-primary mb-6 block" href="{{ route('home') }}">GSBK Candi</a>
                    <p class="font-body-md text-body-md text-on-surface-variant max-w-sm">
                        Gubug Seni Begog Kiyatdiharjan didedikasikan untuk pelestarian, edukasi, dan apresiasi seni tradisi Jawa demi terjaganya identitas bangsa.
                    </p>
                </div>
                <div>
                    <h5 class="font-label-md text-label-md text-on-surface mb-6 uppercase tracking-widest">Navigasi</h5>
                    <ul class="space-y-4 font-body-md text-body-md text-on-surface-variant">
                        <li><a class="hover:text-primary transition-colors" href="{{ route('profile') }}">Tentang Kami</a></li>
                        <li><a class="hover:text-primary transition-colors" href="{{ route('schedule.index') }}">Program Latihan</a></li>
                        <li><a class="hover:text-primary transition-colors" href="{{ route('schedule.index') }}">Jadwal Pentas</a></li>
                        <li><a class="hover:text-primary transition-colors" href="{{ route('articles.index') }}">Artikel Budaya</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-label-md text-label-md text-on-surface mb-6 uppercase tracking-widest">Informasi</h5>
                    <ul class="space-y-4 font-body-md text-body-md text-on-surface-variant">
                        <li><a class="hover:text-primary transition-colors" href="{{ route('profile') }}">Syarat & Ketentuan</a></li>
                        <li><a class="hover:text-primary transition-colors" href="{{ route('profile') }}">Kebijakan Privasi</a></li>
                        <li><a class="hover:text-primary transition-colors" href="{{ route('home') }}">Peta Situs</a></li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center pt-10 border-t border-gold-subtle gap-4 text-center md:text-left">
                <p class="font-label-md text-label-md text-on-surface-variant">
                    © 2026 Gubug Seni Begog Kiyatdiharjan. Preserving Javanese Heritage.
                </p>
                <p class="font-label-md text-label-md text-on-surface-variant">
                    Developed with <span class="text-red-500">♥</span> by <span class="text-primary font-bold">KKN.UPNYK.84.309</span>
                </p>
            </div>
        </div>
    </footer>

    <!-- Public Theme Switcher Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const publicBtn = document.getElementById('public-theme-btn');
            const publicIcon = document.getElementById('public-theme-icon');
            const mobileBtn = document.getElementById('mobile-theme-btn');
            const mobileIcon = document.getElementById('mobile-theme-icon');
            const mobileText = document.getElementById('mobile-theme-text');

            function updateUI() {
                const isLight = document.documentElement.classList.contains('light');
                if (publicIcon) publicIcon.textContent = isLight ? 'dark_mode' : 'light_mode';
                if (mobileIcon) mobileIcon.textContent = isLight ? 'dark_mode' : 'light_mode';
                if (mobileText) mobileText.textContent = isLight ? 'Mode Dark' : 'Mode Cream';
            }

            updateUI();

            function toggleTheme() {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    document.documentElement.classList.add('light');
                    localStorage.setItem('publicTheme', 'light');
                } else {
                    document.documentElement.classList.remove('light');
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('publicTheme', 'dark');
                }
                updateUI();
            }

            if (publicBtn) publicBtn.addEventListener('click', toggleTheme);
            if (mobileBtn) mobileBtn.addEventListener('click', toggleTheme);

            // Mobile Menu Drawer Logic
            const menuBtn = document.getElementById('mobile-menu-btn');
            const closeBtn = document.getElementById('mobile-menu-close');
            const overlay = document.getElementById('mobile-menu-overlay');
            const drawer = document.getElementById('mobile-menu-drawer');

            function openMobileMenu() {
                overlay.classList.remove('hidden');
                setTimeout(() => {
                    overlay.classList.remove('opacity-0');
                    drawer.classList.remove('translate-x-full');
                }, 10);
            }

            window.closeMobileMenu = function() {
                drawer.classList.add('translate-x-full');
                overlay.classList.add('opacity-0');
                setTimeout(() => {
                    overlay.classList.add('hidden');
                }, 300);
            };

            if (menuBtn) menuBtn.addEventListener('click', openMobileMenu);
            if (closeBtn) closeBtn.addEventListener('click', closeMobileMenu);
            if (overlay) overlay.addEventListener('click', closeMobileMenu);
        });
    </script>
</body>
</html>