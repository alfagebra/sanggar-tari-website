@extends('layouts.admin')

@section('title', 'Ikhtisar Dashboard')
@section('header_title', 'Ikhtisar Dashboard')

@section('content')
    <!-- Statistics Grid Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-surface-container-low border border-gold-subtle p-6 rounded-xl flex items-center justify-between hover:bg-surface-container-high transition-all">
            <div>
                <p class="text-xs uppercase font-bold text-on-surface-variant tracking-wider mb-2">Total Artikel</p>
                <h3 class="font-headline-md text-4xl font-bold text-primary">{{ $articlesCount }}</h3>
            </div>
            <div class="w-14 h-14 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center text-primary">
                <span class="material-symbols-outlined text-3xl">newspaper</span>
            </div>
        </div>

        <div class="bg-surface-container-low border border-gold-subtle p-6 rounded-xl flex items-center justify-between hover:bg-surface-container-high transition-all">
            <div>
                <p class="text-xs uppercase font-bold text-on-surface-variant tracking-wider mb-2">Foto Galeri</p>
                <h3 class="font-headline-md text-4xl font-bold text-primary">{{ $galleriesCount }}</h3>
            </div>
            <div class="w-14 h-14 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center text-primary">
                <span class="material-symbols-outlined text-3xl">photo_library</span>
            </div>
        </div>

        <div class="bg-surface-container-low border border-gold-subtle p-6 rounded-xl flex items-center justify-between hover:bg-surface-container-high transition-all">
            <div>
                <p class="text-xs uppercase font-bold text-on-surface-variant tracking-wider mb-2">Kelas Tari (Jadwal)</p>
                <h3 class="font-headline-md text-4xl font-bold text-primary">{{ $schedulesCount }}</h3>
            </div>
            <div class="w-14 h-14 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center text-primary">
                <span class="material-symbols-outlined text-3xl">calendar_month</span>
            </div>
        </div>
    </div>

    <!-- Quick Access & Status Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Welcome Banner Card -->
        <div class="bg-gradient-to-br from-surface-container-high to-surface-container-low border border-gold-subtle p-8 rounded-xl relative overflow-hidden flex flex-col justify-between">
            <div class="relative z-10">
                <span class="inline-block bg-primary text-on-primary text-xs font-bold uppercase px-3 py-1 rounded mb-4">PANEL ADMIN GSBK</span>
                <h3 class="font-headline-md text-2xl font-bold text-primary mb-3">Selamat Bekerja!</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed mb-6">
                    Melalui panel ini, Anda dapat mengelola profil sanggar tari, memperbarui jadwal latihan mingguan, mengunggah foto pentas, dan menulis artikel kebudayaan secara langsung.
                </p>
            </div>
            <div class="relative z-10">
                <a href="{{ route('admin.profile') }}" class="inline-flex items-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-lg font-bold text-sm hover:brightness-110 transition-all">
                    Edit Profil Sanggar <span class="material-symbols-outlined text-base">arrow_forward</span>
                </a>
            </div>
        </div>

        <!-- Cloud System Status -->
        <div class="bg-surface-container-low border border-gold-subtle p-8 rounded-xl">
            <h3 class="font-headline-md text-xl font-bold text-primary mb-6 flex items-center gap-3">
                <span class="material-symbols-outlined text-primary">cloud_done</span>
                Status Integrasi Cloud
            </h3>
            <div class="space-y-4 text-sm">
                <div class="flex justify-between items-center pb-3 border-b border-outline-variant/20">
                    <span class="text-on-surface-variant">Hosting Aplikasi:</span>
                    <span class="font-bold text-emerald-400 flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-emerald-400"></span> Vercel Serverless</span>
                </div>
                <div class="flex justify-between items-center pb-3 border-b border-outline-variant/20">
                    <span class="text-on-surface-variant">Database Engine:</span>
                    <span class="font-bold text-emerald-400 flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-emerald-400"></span> Supabase PostgreSQL</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-on-surface-variant">Penyimpanan Foto (Bucket):</span>
                    <span class="font-bold text-emerald-400 flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-emerald-400"></span> Supabase Storage S3</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Articles Table -->
    <div class="bg-surface-container-low border border-gold-subtle rounded-xl p-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-headline-md text-xl font-bold text-primary flex items-center gap-3">
                <span class="material-symbols-outlined">newspaper</span>
                Artikel Terbaru
            </h3>
            <a href="{{ route('admin.articles.create') }}" class="bg-primary text-on-primary px-5 py-2 rounded-lg font-bold text-sm hover:brightness-110 transition-all inline-flex items-center gap-2">
                <span class="material-symbols-outlined text-base">add</span> Buat Artikel
            </a>
        </div>

        @if($recentArticles->isEmpty())
            <div class="text-center py-10 text-on-surface-variant border border-dashed border-outline-variant/30 rounded-xl">
                Belum ada artikel yang diterbitkan saat ini.
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-on-surface">
                    <thead class="bg-surface-container-high text-primary uppercase text-xs tracking-wider border-b border-gold-subtle">
                        <tr>
                            <th class="p-4">Gambar</th>
                            <th class="p-4">Judul Artikel</th>
                            <th class="p-4">Tanggal Rilis</th>
                            <th class="p-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/20">
                        @foreach($recentArticles as $article)
                            <tr class="hover:bg-surface-container-high/50 transition-colors">
                                <td class="p-4">
                                    @if($article->image_url)
                                        <img src="{{ Str::startsWith($article->image_url, ['http://', 'https://']) ? $article->image_url : Storage::url($article->image_url) }}" alt="Preview" class="w-16 h-12 rounded object-cover border border-gold-subtle">
                                    @else
                                        <span class="text-xs text-on-surface-variant">No Image</span>
                                    @endif
                                </td>
                                <td class="p-4 font-bold text-on-surface">{{ $article->title }}</td>
                                <td class="p-4 text-on-surface-variant">{{ $article->created_at->format('d M Y') }}</td>
                                <td class="p-4">
                                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="inline-flex items-center gap-1 border border-primary text-primary px-3 py-1 rounded text-xs hover:bg-primary/10 transition-all">
                                        <span class="material-symbols-outlined text-sm">edit</span> Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection