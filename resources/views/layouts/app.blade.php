<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'GSBK Candi') - Gubug Seni Begog Kiyatdiharjan</title>
    <meta name="description" content="@yield('meta_description', 'Website Resmi Sanggar Seni Tari Tradisional. Menyediakan informasi profil, sejarah, galeri pentas, dan jadwal latihan tari.')">
    
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
                    "on-secondary": "#4a280a",
                    "on-error-container": "#ffdad6",
                    "surface-container": "#201f1f",
                    "secondary": "#f4bb92",
                    "on-secondary-fixed": "#301400",
                    "secondary-fixed-dim": "#f4bb92",
                    "surface-container-high": "#2a2a2a",
                    "on-surface": "#e5e2e1",
                    "primary-fixed-dim": "#e9c349",
                    "on-primary-container": "#554300",
                    "surface-container-low": "#1c1b1b",
                    "surface-bright": "#3a3939",
                    "surface-dim": "#131313",
                    "tertiary-fixed": "#e5e2e1",
                    "primary-container": "#d4af37",
                    "tertiary-fixed-dim": "#c8c6c5",
                    "error": "#ffb4ab",
                    "on-tertiary-fixed-variant": "#474746",
                    "primary": "#f2ca50",
                    "surface-container-highest": "#353534",
                    "surface-variant": "#353534",
                    "on-error": "#690005",
                    "on-secondary-container": "#e1aa82",
                    "primary-fixed": "#ffe088",
                    "on-primary-fixed": "#241a00",
                    "surface": "#131313",
                    "secondary-fixed": "#ffdcc5",
                    "on-background": "#e5e2e1",
                    "tertiary-container": "#b4b2b2",
                    "on-primary": "#3c2f00",
                    "inverse-on-surface": "#313030",
                    "inverse-surface": "#e5e2e1",
                    "on-tertiary-container": "#454544",
                    "on-primary-fixed-variant": "#574500",
                    "on-tertiary-fixed": "#1c1b1b",
                    "background": "#131313",
                    "on-secondary-fixed-variant": "#653d1e",
                    "on-surface-variant": "#d0c5af",
                    "on-tertiary": "#313030",
                    "surface-container-lowest": "#0e0e0e",
                    "inverse-primary": "#735c00",
                    "surface-tint": "#e9c349",
                    "tertiary": "#d0cdcd",
                    "secondary-container": "#653d1e",
                    "outline": "#99907c",
                    "error-container": "#93000a"
            },
            "borderRadius": {
                    "DEFAULT": "0.125rem",
                    "lg": "0.25rem",
                    "xl": "0.5rem",
                    "full": "0.75rem"
            },
            "spacing": {
                    "base": "8px",
                    "container-max": "1280px",
                    "gutter": "24px",
                    "margin-mobile": "16px",
                    "margin-desktop": "80px"
            },
            "fontFamily": {
                    "headline-lg": ["Playfair Display"],
                    "label-md": ["Manrope"],
                    "body-md": ["Manrope"],
                    "headline-md": ["Playfair Display"],
                    "headline-lg-mobile": ["Playfair Display"],
                    "display-lg": ["Playfair Display"],
                    "body-lg": ["Manrope"]
            },
            "fontSize": {
                    "headline-lg": ["40px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "label-md": ["14px", {"lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "headline-md": ["28px", {"lineHeight": "1.3", "fontWeight": "600"}],
                    "headline-lg-mobile": ["32px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "display-lg": ["56px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}]
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
        .hero-gradient {
            background: linear-gradient(0deg, #131313 0%, rgba(19, 19, 19, 0.2) 50%, rgba(19, 19, 19, 0) 100%);
        }
        .text-glow {
            text-shadow: 0 0 15px rgba(242, 202, 80, 0.3);
        }
        .border-gold-subtle {
            border-color: rgba(139, 94, 60, 0.2);
        }
    </style>
</head>
<body class="bg-background text-on-background batik-overlay selection:bg-primary-container selection:text-on-primary-container">

    @php
        $layoutProfile = \App\Models\Profile::first();
    @endphp

    <!-- TopNavBar -->
    <header class="fixed top-0 left-0 w-full z-50 bg-background/80 backdrop-blur-md border-b border-outline-variant/30">
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

            <!-- Trailing Actions -->
            @auth
                <div class="flex items-center gap-4 md:gap-6">
                    <a href="{{ route('admin.dashboard') }}" class="bg-primary text-on-primary px-6 py-2 font-label-md text-label-md rounded-lg hover:scale-105 transition-all duration-200">Admin</a>
                </div>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-surface-dim border-t border-outline-variant/20 pt-20 pb-10">
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
                        <li><a class="hover:text-primary transition-colors" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $layoutProfile->phone ?? '081234567890') }}" target="_blank">Pendaftaran Siswa</a></li>
                        <li><a class="hover:text-primary transition-colors" href="{{ route('profile') }}">Syarat & Ketentuan</a></li>
                        <li><a class="hover:text-primary transition-colors" href="{{ route('profile') }}">Kebijakan Privasi</a></li>
                        <li><a class="hover:text-primary transition-colors" href="{{ route('home') }}">Peta Situs</a></li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center pt-10 border-t border-outline-variant/10 gap-6">
                <p class="font-label-md text-label-md text-on-surface-variant">
                    © 2024 Gubug Seni Begog Kiyatdiharjan. Preserving Javanese Heritage.
                </p>
                <div class="flex gap-8">
                    <a class="text-on-surface-variant hover:text-primary underline-offset-4 hover:underline transition-all opacity-80 hover:opacity-100 font-label-md text-label-md" href="{{ route('profile') }}">Kebijakan Privasi</a>
                    <a class="text-on-surface-variant hover:text-primary underline-offset-4 hover:underline transition-all opacity-80 hover:opacity-100 font-label-md text-label-md" href="{{ route('profile') }}">Syarat & Ketentuan</a>
                    <a class="text-on-surface-variant hover:text-primary underline-offset-4 hover:underline transition-all opacity-80 hover:opacity-100 font-label-md text-label-md" href="{{ route('home') }}">Peta Situs</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>