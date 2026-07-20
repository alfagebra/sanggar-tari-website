@extends('layouts.admin')

@section('title', 'Kelola Artikel')
@section('header_title', 'Kelola Artikel Kebudayaan')

@section('content')
<div class="bg-surface-container-low border border-gold-subtle rounded-xl p-6 md:p-8">
    <div class="flex justify-between items-center mb-6">
        <h3 class="font-headline-md text-xl font-bold text-primary flex items-center gap-2">
            <span class="material-symbols-outlined">newspaper</span> Daftar Artikel
        </h3>
        <a href="{{ route('admin.articles.create') }}" class="bg-primary text-on-primary px-5 py-2 rounded-lg font-bold text-sm hover:brightness-110 transition-all inline-flex items-center gap-2">
            <span class="material-symbols-outlined text-base">add</span> Buat Artikel
        </a>
    </div>

    @if($articles->isEmpty())
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
                    @foreach($articles as $article)
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
                            <td class="p-4 flex items-center gap-2">
                                <a href="{{ route('admin.articles.edit', $article->id) }}" class="border border-primary text-primary px-3 py-1 rounded text-xs hover:bg-primary/10 transition-all inline-flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                                </a>
                                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border border-red-500/50 text-red-400 px-3 py-1 rounded text-xs hover:bg-red-500/10 transition-all inline-flex items-center gap-1">
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