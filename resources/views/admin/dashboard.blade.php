@extends('layouts.admin')

@section('title', 'Ikhtisar Dashboard')
@section('header_title', 'Ikhtisar Dashboard')

@section('content')
    <!-- Statistics Grid Cards (Cream & Gold High Contrast Boxes) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <!-- Total Artikel Card -->
        <div class="bg-gradient-to-br from-[#f2ca50] via-[#e9c349] to-[#d4af37] text-[#241a00] p-6 rounded-2xl shadow-xl border-2 border-[#ffe088] flex items-center justify-between hover:scale-105 transition-all">
            <div>
                <p class="text-xs uppercase font-extrabold tracking-wider mb-1 text-[#453600]">Total Artikel</p>
                <h3 class="font-headline-md text-5xl font-black text-[#1c1400]">{{ $articlesCount }}</h3>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-[#3c2f00] text-[#f2ca50] flex items-center justify-center shadow-md">
                <span class="material-symbols-outlined text-3xl">newspaper</span>
            </div>
        </div>

        <!-- Foto Galeri Card -->
        <div class="bg-[#fdf8ec] text-[#241a00] p-6 rounded-2xl shadow-xl border-2 border-[#f2ca50] flex items-center justify-between hover:scale-105 transition-all">
            <div>
                <p class="text-xs uppercase font-extrabold tracking-wider mb-1 text-[#654d00]">Foto Galeri</p>
                <h3 class="font-headline-md text-5xl font-black text-[#f2ca50]">{{ $galleriesCount }}</h3>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-[#f2ca50] text-[#3c2f00] flex items-center justify-center shadow-md">
                <span class="material-symbols-outlined text-3xl">photo_library</span>
            </div>
        </div>

        <!-- Kelas Tari Card -->
        <div class="bg-gradient-to-br from-[#f4bb92] via-[#e1aa82] to-[#d4af37] text-[#301400] p-6 rounded-2xl shadow-xl border-2 border-[#ffdcc5] flex items-center justify-between hover:scale-105 transition-all">
            <div>
                <p class="text-xs uppercase font-extrabold tracking-wider mb-1 text-[#4a2300]">Kelas Tari (Jadwal)</p>
                <h3 class="font-headline-md text-5xl font-black text-[#220d00]">{{ $schedulesCount }}</h3>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-[#4a280a] text-[#f4bb92] flex items-center justify-center shadow-md">
                <span class="material-symbols-outlined text-3xl">calendar_month</span>
            </div>
        </div>
    </div>

    <!-- Quick Access & Status Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
        <!-- Welcome Banner Card (Warm Cream High Contrast Box) -->
        <div class="bg-[#faf3e0] text-[#2c2205] border-2 border-[#d4af37] p-8 rounded-2xl shadow-2xl flex flex-col justify-between">
            <div>
                <span class="inline-block bg-[#3c2f00] text-[#f2ca50] text-xs font-black uppercase px-3.5 py-1.5 rounded-lg mb-4 shadow">PANEL ADMIN GSBK</span>
                <h3 class="font-headline-md text-3xl font-black text-[#1f1700] mb-3">Selamat Bekerja!</h3>
                <p class="text-[#473b18] text-sm leading-relaxed font-medium mb-6">
                    Melalui panel ini, Anda dapat mengelola profil sanggar tari, memperbarui jadwal latihan mingguan, mengunggah foto pentas, dan menulis artikel kebudayaan secara langsung.
                </p>
            </div>
            <div>
                <a href="{{ route('admin.profile') }}" class="inline-flex items-center gap-2 bg-[#3c2f00] text-[#f2ca50] hover:bg-[#241a00] px-6 py-3.5 rounded-xl font-extrabold text-sm shadow-lg transition-all">
                    Edit Profil Sanggar <span class="material-symbols-outlined text-base">arrow_forward</span>
                </a>
            </div>
        </div>

        <!-- Cloud System Status (High Contrast Obsidian Card) -->
        <div class="bg-[#1e1c18] border-2 border-[#d4af37] p-8 rounded-2xl shadow-2xl">
            <h3 class="font-headline-md text-2xl font-black text-[#f2ca50] mb-6 flex items-center gap-3">
                <span class="material-symbols-outlined text-[#f2ca50] text-3xl">cloud_done</span>
                Status Integrasi Cloud
            </h3>
            <div class="space-y-4 text-sm font-medium">
                <div class="flex justify-between items-center pb-3 border-b-2 border-[#d4af37]/30">
                    <span class="text-[#d0c5af]">Hosting Aplikasi:</span>
                    <span class="font-bold text-emerald-400 flex items-center gap-1.5 bg-emerald-950/40 px-3 py-1 rounded-lg border border-emerald-500/40"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span> Vercel Serverless</span>
                </div>
                <div class="flex justify-between items-center pb-3 border-b-2 border-[#d4af37]/30">
                    <span class="text-[#d0c5af]">Database Engine:</span>
                    <span class="font-bold text-emerald-400 flex items-center gap-1.5 bg-emerald-950/40 px-3 py-1 rounded-lg border border-emerald-500/40"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span> Supabase PostgreSQL</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-[#d0c5af]">Penyimpanan Foto (Bucket):</span>
                    <span class="font-bold text-emerald-400 flex items-center gap-1.5 bg-emerald-950/40 px-3 py-1 rounded-lg border border-emerald-500/40"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span> Supabase Storage S3</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Articles Table Container -->
    <div class="bg-[#1e1c18] border-2 border-[#d4af37] rounded-2xl p-8 shadow-2xl">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-headline-md text-2xl font-black text-[#f2ca50] flex items-center gap-3">
                <span class="material-symbols-outlined text-3xl">newspaper</span>
                Artikel Terbaru
            </h3>
            <a href="{{ route('admin.articles.create') }}" class="bg-[#f2ca50] text-[#3c2f00] px-6 py-3 rounded-xl font-extrabold text-sm hover:brightness-110 shadow-lg transition-all inline-flex items-center gap-2">
                <span class="material-symbols-outlined text-base">add</span> Buat Artikel
            </a>
        </div>

        @if($recentArticles->isEmpty())
            <div class="text-center py-10 text-[#d0c5af] border-2 border-dashed border-[#d4af37]/40 rounded-xl bg-[#24211b]">
                Belum ada artikel yang diterbitkan saat ini.
            </div>
        @else
            <div class="overflow-x-auto rounded-xl border border-[#d4af37]/30">
                <table class="w-full text-left text-sm text-[#e5e2e1]">
                    <thead class="bg-[#2d281e] text-[#f2ca50] uppercase text-xs font-black tracking-wider border-b-2 border-[#d4af37]">
                        <tr>
                            <th class="p-4">Gambar</th>
                            <th class="p-4">Judul Artikel</th>
                            <th class="p-4">Tanggal Rilis</th>
                            <th class="p-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#d4af37]/20 bg-[#1e1c18]">
                        @foreach($recentArticles as $article)
                            <tr class="hover:bg-[#2c271e] transition-colors">
                                <td class="p-4">
                                    @if($article->image_url)
                                        <img src="{{ Str::startsWith($article->image_url, ['http://', 'https://']) ? $article->image_url : Storage::url($article->image_url) }}" alt="Preview" class="w-16 h-12 rounded-lg object-cover border-2 border-[#f2ca50]">
                                    @else
                                        <span class="text-xs text-[#d0c5af]">No Image</span>
                                    @endif
                                </td>
                                <td class="p-4 font-bold text-white text-base">{{ $article->title }}</td>
                                <td class="p-4 text-[#d0c5af] font-medium">{{ $article->created_at->format('d M Y') }}</td>
                                <td class="p-4">
                                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="inline-flex items-center gap-1.5 bg-[#f2ca50] text-[#3c2f00] px-4 py-2 rounded-lg text-xs font-black hover:brightness-110 shadow transition-all">
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