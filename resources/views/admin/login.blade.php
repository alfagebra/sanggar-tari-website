<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login Pengelola - GSBK Candi</title>
    
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
<body class="bg-background text-on-background batik-overlay flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md bg-surface-container-low border border-gold-subtle p-8 md:p-10 rounded-2xl shadow-2xl">
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="text-xs font-bold uppercase tracking-widest text-primary hover:underline inline-block mb-4">
                &larr; Kembali ke Website
            </a>
            <h2 class="font-headline-md text-3xl font-bold text-primary mb-2">Login Pengelola</h2>
            <p class="text-xs text-on-surface-variant">Masukkan akun pengelola untuk mengupdate konten sanggar</p>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400 text-xs font-medium">
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
                <label for="email" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Email Terdaftar</label>
                <input type="email" name="email" id="email" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-primary transition-all" placeholder="contoh: admin@sanggar.com" value="{{ old('email') }}" required autofocus>
            </div>

            <div>
                <label for="password" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Kata Sandi (Password)</label>
                <input type="password" name="password" id="password" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-primary transition-all" placeholder="Masukkan password Anda" required>
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 text-xs text-on-surface-variant cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded bg-surface-container-high border-outline-variant text-primary focus:ring-primary"> Ingat Saya
                </label>
            </div>

            <button type="submit" class="w-full bg-primary text-on-primary py-4 rounded-lg font-bold text-sm hover:brightness-110 transition-all shadow-lg shadow-primary/10">
                Masuk ke Panel Pengelola
            </button>
        </form>
    </div>

</body>
</html>