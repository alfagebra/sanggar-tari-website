<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login Pengelola - GSBK Candi</title>
    
    <!-- Favicon (Browser Icon) -->
    @php
        $loginProfile = \App\Models\Profile::first();
    @endphp
    @if($loginProfile && $loginProfile->logo_url)
        <link rel="icon" href="{{ Str::startsWith($loginProfile->logo_url, ['http://', 'https://']) ? $loginProfile->logo_url : Storage::url($loginProfile->logo_url) }}" type="image/x-icon">
    @else
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @endif
    
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

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Manrope:wght@200..800&display=swap" rel="stylesheet"/>
    
    <!-- Tailwind Custom Config -->
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "primary": "#f2ca50",
                    "background-light": "#fdfaf3",
                    "background-dark": "#131313",
                    "card-light": "#faf3e0",
                    "card-dark": "#1e1c18"
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
        .batik-overlay {
            background-image: radial-gradient(circle, rgba(184, 134, 11, 0.08) 1.5px, transparent 1.5px);
            background-size: 40px 40px;
        }
        
        /* Light Theme variables */
        html.light body {
            background-color: #fdfaf3;
            color: #2a2419;
        }
        html.light .login-card {
            background-color: #faf3e0;
            border-color: rgba(184, 134, 11, 0.3);
        }
        html.light input {
            background-color: #ffffff !important;
            color: #2a2419 !important;
            border-color: rgba(184, 134, 11, 0.3) !important;
        }
        html.light label {
            color: #594e3a !important;
        }

        /* Dark Theme variables */
        html.dark body {
            background-color: #131313;
            color: #e5e2e1;
        }
        html.dark .login-card {
            background-color: #1e1c18;
            border-color: rgba(212, 175, 55, 0.3);
        }
        html.dark input {
            background-color: #2a261f !important;
            color: #ffffff !important;
            border-color: rgba(212, 175, 55, 0.3) !important;
        }
        html.dark label {
            color: #d0c5af !important;
        }
    </style>
</head>
<body class="batik-overlay flex items-center justify-center min-h-screen p-4 transition-colors duration-300">

    <div class="login-card w-full max-w-md border-2 p-8 md:p-10 rounded-2xl shadow-2xl transition-all">
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="text-xs font-bold uppercase tracking-widest text-[#b8860b] dark:text-[#f2ca50] hover:underline inline-block mb-4">
                &larr; Kembali ke Website
            </a>
            <h2 class="font-headline-md text-3xl font-black text-[#b8860b] dark:text-[#f2ca50] mb-2">Login Pengelola</h2>
            <p class="text-xs opacity-85">Masukkan akun pengelola untuk mengupdate konten sanggar</p>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-500 text-xs font-medium">
                <ul class="space-y-1">
                    @foreach($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="email" class="block text-xs font-bold uppercase mb-2">Email Terdaftar</label>
                <input type="email" name="email" id="email" class="w-full rounded-xl px-4 py-3.5 text-sm focus:outline-none focus:ring-1 focus:ring-[#f2ca50] transition-all" placeholder="contoh: admin@sanggar.com" value="{{ old('email') }}" required autofocus>
            </div>

            <div>
                <label for="password" class="block text-xs font-bold uppercase mb-2">Kata Sandi (Password)</label>
                <input type="password" name="password" id="password" class="w-full rounded-xl px-4 py-3.5 text-sm focus:outline-none focus:ring-1 focus:ring-[#f2ca50] transition-all" placeholder="Masukkan password Anda" required>
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 text-xs cursor-pointer select-none">
                    <input type="checkbox" name="remember" class="rounded bg-black/10 dark:bg-white/10 border-gold-subtle text-[#b8860b] dark:text-primary focus:ring-primary"> Ingat Saya
                </label>
            </div>

            <button type="submit" class="w-full bg-[#b8860b] dark:bg-primary text-white dark:text-[#3c2f00] py-4 rounded-xl font-bold text-sm hover:opacity-95 transition-all shadow-lg">
                Masuk ke Panel Pengelola
            </button>
        </form>
    </div>

</body>
</html>