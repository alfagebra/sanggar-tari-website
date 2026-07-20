@extends('layouts.admin')

@section('title', 'Ikhtisar Dashboard')
@section('header_title', 'Ikhtisar Dashboard')

@section('content')
    <!-- Statistics Grid Cards (Clean, Lightweight & Non-Ndemblok) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Artikel Card -->
        <div class="admin-card-color border admin-border-color p-6 rounded-2xl shadow-sm flex items-center justify-between hover:shadow-md transition-all">
            <div>
                <p class="text-xs uppercase font-bold tracking-wider mb-1 admin-muted-color">Total Artikel</p>
                <h3 class="font-headline-md text-4xl font-bold admin-text-color">{{ $articlesCount }}</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-[#b8860b] dark:text-[#f2ca50] flex items-center justify-center border border-amber-500/20">
                <span class="material-symbols-outlined text-2xl">newspaper</span>
            </div>
        </div>

        <!-- Foto Galeri Card -->
        <div class="admin-card-color border admin-border-color p-6 rounded-2xl shadow-sm flex items-center justify-between hover:shadow-md transition-all">
            <div>
                <p class="text-xs uppercase font-bold tracking-wider mb-1 admin-muted-color">Foto Galeri</p>
                <h3 class="font-headline-md text-4xl font-bold admin-text-color">{{ $galleriesCount }}</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-[#b8860b] dark:text-[#f2ca50] flex items-center justify-center border border-amber-500/20">
                <span class="material-symbols-outlined text-2xl">photo_library</span>
            </div>
        </div>

        <!-- Kelas Tari Card -->
        <div class="admin-card-color border admin-border-color p-6 rounded-2xl shadow-sm flex items-center justify-between hover:shadow-md transition-all">
            <div>
                <p class="text-xs uppercase font-bold tracking-wider mb-1 admin-muted-color">Kelas Tari (Jadwal)</p>
                <h3 class="font-headline-md text-4xl font-bold admin-text-color">{{ $schedulesCount }}</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-[#b8860b] dark:text-[#f2ca50] flex items-center justify-center border border-amber-500/20">
                <span class="material-symbols-outlined text-2xl">calendar_month</span>
            </div>
        </div>
    </div>

    <!-- Quick Access & Status Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Welcome Banner Card -->
        <div class="admin-card-color border admin-border-color p-8 rounded-2xl shadow-sm flex flex-col justify-between">
            <div>
                <span class="inline-block bg-amber-500/10 text-[#b8860b] dark:text-[#f2ca50] text-xs font-bold uppercase px-3 py-1 rounded-lg mb-4 border border-amber-500/20">PANEL ADMIN GSBK</span>
                <h3 class="font-headline-md text-2xl font-bold admin-text-color mb-3">Selamat Bekerja!</h3>
                <p class="admin-muted-color text-sm leading-relaxed mb-6">
                    Melalui panel ini, Anda dapat mengelola profil sanggar tari, memperbarui jadwal latihan mingguan, mengunggah foto pentas, dan menulis artikel kebudayaan secara langsung.
                </p>
            </div>
            <div>
                <a href="{{ route('admin.profile') }}" class="inline-flex items-center gap-2 bg-[#b8860b] dark:bg-[#f2ca50] text-white dark:text-[#3c2f00] px-5 py-2.5 rounded-xl font-bold text-sm shadow-sm hover:opacity-95 transition-all">
                    Edit Profil Sanggar <span class="material-symbols-outlined text-base">arrow_forward</span>
                </a>
            </div>
        </div>

        <!-- Cloud System Status -->
        <div class="admin-card-color border admin-border-color p-8 rounded-2xl shadow-sm">
            <h3 class="font-headline-md text-xl font-bold admin-accent-color mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-2xl">cloud_done</span>
                Status Integrasi Cloud
            </h3>
            <div class="space-y-4 text-sm font-medium">
                <div class="flex justify-between items-center pb-3 border-b admin-border-color">
                    <span class="admin-muted-color">Hosting Aplikasi:</span>
                    <span class="font-bold text-emerald-600 dark:text-emerald-400 flex items-center gap-1.5 bg-emerald-500/10 px-3 py-1 rounded-lg border border-emerald-500/20"><span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Vercel Serverless</span>
                </div>
                <div class="flex justify-between items-center pb-3 border-b admin-border-color">
                    <span class="admin-muted-color">Database Engine:</span>
                    <span class="font-bold text-emerald-600 dark:text-emerald-400 flex items-center gap-1.5 bg-emerald-500/10 px-3 py-1 rounded-lg border border-emerald-500/20"><span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Supabase PostgreSQL</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="admin-muted-color">Penyimpanan Foto (Bucket):</span>
                    <span class="font-bold text-emerald-600 dark:text-emerald-400 flex items-center gap-1.5 bg-emerald-500/10 px-3 py-1 rounded-lg border border-emerald-500/20"><span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Supabase Storage S3</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Articles Table Container -->
    <div class="admin-card-color border admin-border-color rounded-2xl p-8 shadow-sm">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-headline-md text-xl font-bold admin-accent-color flex items-center gap-2">
                <span class="material-symbols-outlined text-2xl">newspaper</span>
                Artikel Terbaru
            </h3>
            <a href="{{ route('admin.articles.create') }}" class="bg-[#b8860b] dark:bg-[#f2ca50] text-white dark:text-[#3c2f00] px-5 py-2.5 rounded-xl font-bold text-sm shadow-sm hover:opacity-95 transition-all inline-flex items-center gap-2">
                <span class="material-symbols-outlined text-base">add</span> Buat Artikel
            </a>
        </div>

        @if($recentArticles->isEmpty())
            <div class="text-center py-10 admin-muted-color border border-dashed admin-border-color rounded-xl bg-black/5 dark:bg-white/5">
                Belum ada artikel yang diterbitkan saat ini.
            </div>
        @else
            <div class="overflow-x-auto rounded-xl border admin-border-color">
                <table class="w-full text-left text-sm admin-text-color">
                    <thead class="bg-amber-500/10 text-[#8b6508] dark:text-[#f2ca50] uppercase text-xs font-bold tracking-wider border-b admin-border-color">
                        <tr>
                            <th class="p-4">Gambar</th>
                            <th class="p-4">Judul Artikel</th>
                            <th class="p-4">Tanggal Rilis</th>
                            <th class="p-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y admin-border-color">
                        @foreach($recentArticles as $article)
                            <tr class="hover:bg-black/5 dark:hover:bg-white/5 transition-colors">
                                <td class="p-4">
                                    @if($article->image_url)
                                        <img src="{{ Str::startsWith($article->image_url, ['http://', 'https://']) ? $article->image_url : Storage::url($article->image_url) }}" alt="Preview" class="w-16 h-12 rounded-lg object-cover border border-amber-500/20">
                                    @else
                                        <span class="text-xs admin-muted-color">No Image</span>
                                    @endif
                                </td>
                                <td class="p-4 font-bold text-base admin-text-color">{{ $article->title }}</td>
                                <td class="p-4 admin-muted-color font-medium">{{ $article->created_at->format('d M Y') }}</td>
                                <td class="p-4">
                                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="inline-flex items-center gap-1.5 bg-[#b8860b] dark:bg-[#f2ca50] text-white dark:text-[#3c2f00] px-4 py-2 rounded-lg text-xs font-bold shadow-sm hover:opacity-95 transition-all">
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