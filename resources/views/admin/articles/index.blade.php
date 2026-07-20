@extends('layouts.admin')

@section('title', 'Kelola Artikel')
@section('header_title', 'Kelola Artikel Kebudayaan')

@section('content')
<div class="admin-card-color border-2 admin-border-color rounded-2xl p-6 md:p-8 shadow-xl">
    <div class="flex justify-between items-center mb-6">
        <h3 class="font-headline-md text-2xl font-black admin-accent-color flex items-center gap-3">
            <span class="material-symbols-outlined text-3xl">newspaper</span> Daftar Artikel
        </h3>
        <a href="{{ route('admin.articles.create') }}" class="bg-[#f2ca50] text-[#3c2f00] px-6 py-3 rounded-xl font-black text-sm hover:brightness-110 transition-all inline-flex items-center gap-2 shadow-lg">
            <span class="material-symbols-outlined text-base">add</span> Buat Artikel Baru
        </a>
    </div>

    @if($articles->isEmpty())
        <div class="text-center py-10 admin-muted-color border-2 border-dashed admin-border-color rounded-xl admin-card-alt-color">
            Belum ada artikel yang diterbitkan saat ini.
        </div>
    @else
        <div class="overflow-x-auto rounded-xl border admin-border-color">
            <table class="w-full text-left text-sm admin-text-color">
                <thead class="bg-[#f2ca50] text-[#3c2f00] uppercase text-xs font-black tracking-wider border-b-2 border-[#d4af37]">
                    <tr>
                        <th class="p-4">Gambar</th>
                        <th class="p-4">Judul Artikel</th>
                        <th class="p-4">Tanggal Rilis</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y admin-border-color admin-card-color">
                    @foreach($articles as $article)
                        <tr class="hover:bg-[#f2ca50]/10 transition-colors">
                            <td class="p-4">
                                @if($article->image_url)
                                    <img src="{{ Str::startsWith($article->image_url, ['http://', 'https://']) ? $article->image_url : Storage::url($article->image_url) }}" alt="Preview" class="w-16 h-12 rounded-lg object-cover border-2 border-[#f2ca50]">
                                @else
                                    <span class="text-xs admin-muted-color">No Image</span>
                                @endif
                            </td>
                            <td class="p-4 font-bold text-base admin-text-color">{{ $article->title }}</td>
                            <td class="p-4 admin-muted-color font-medium">{{ $article->created_at->format('d M Y') }}</td>
                            <td class="p-4 flex items-center gap-2">
                                <a href="{{ route('admin.articles.edit', $article->id) }}" class="inline-flex items-center gap-1.5 bg-[#f2ca50] text-[#3c2f00] px-4 py-2 rounded-lg text-xs font-black hover:brightness-110 shadow transition-all">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                                </a>
                                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1.5 bg-red-900/10 text-red-600 border border-red-500/40 px-4 py-2 rounded-lg text-xs font-black hover:bg-red-900/20 transition-all">
                                        <span class="material-symbols-outlined text-sm">delete</span> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $articles->links() }}
        </div>
    @endif
</div>
@endsection