@extends('layouts.app')

@section('title', 'Peta Situs')

@section('content')
<section class="py-24 pt-36 md:pt-44 bg-background min-h-screen">
    <div class="max-w-container-max mx-auto px-4 md:px-margin-desktop">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-primary font-label-md text-label-md tracking-widest uppercase mb-2 block font-bold">Struktur Website</span>
            <h1 class="font-headline-lg text-3xl md:text-5xl mb-6 font-black leading-tight text-on-background">Peta Situs (Sitemap)</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">Daftar lengkap seluruh halaman navigasi dan konten kebudayaan yang ada di GSBK Candi.</p>
        </div>

        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Halaman Utama & Profil -->
            <div class="bg-surface-container-low border border-gold-subtle rounded-2xl p-8 shadow-sm">
                <h3 class="font-headline-md text-xl font-bold text-primary mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined">explore</span> Halaman Utama & Informasi
                </h3>
                <ul class="space-y-4 font-body-md text-body-md text-on-surface-variant">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-primary transition-colors flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Beranda / Homepage
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile') }}" class="hover:text-primary transition-colors flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Tentang / Profil Sanggar
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('terms') }}" class="hover:text-primary transition-colors flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Syarat & Ketentuan Penggunaan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('privacy') }}" class="hover:text-primary transition-colors flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Kebijakan Privasi & Cookie
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Program Latihan & Jadwal -->
            <div class="bg-surface-container-low border border-gold-subtle rounded-2xl p-8 shadow-sm">
                <h3 class="font-headline-md text-xl font-bold text-primary mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined">calendar_month</span> Program Latihan & Galeri
                </h3>
                <ul class="space-y-4 font-body-md text-body-md text-on-surface-variant">
                    <li>
                        <a href="{{ route('schedule.index') }}" class="hover:text-primary transition-colors flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Jadwal Latihan Reguler Sanggar
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gallery.index') }}" class="hover:text-primary transition-colors flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Galeri Visual Dokumentasi Pentas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('articles.index') }}" class="hover:text-primary transition-colors flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Artikel Kebudayaan & Pengumuman
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection