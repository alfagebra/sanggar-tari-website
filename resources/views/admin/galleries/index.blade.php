@extends('layouts.admin')

@section('title', 'Kelola Galeri Foto')
@section('header_title', 'Kelola Galeri Foto Sanggar')

@section('content')
<div class="bg-surface-container-low border border-gold-subtle rounded-xl p-6 md:p-8">
    <div class="flex justify-between items-center mb-6">
        <h3 class="font-headline-md text-xl font-bold text-primary flex items-center gap-2">
            <span class="material-symbols-outlined">photo_library</span> Dokumentasi Foto Pentas
        </h3>
        <a href="{{ route('admin.galleries.create') }}" class="bg-primary text-on-primary px-5 py-2 rounded-lg font-bold text-sm hover:brightness-110 transition-all inline-flex items-center gap-2">
            <span class="material-symbols-outlined text-base">upload</span> Unggah Foto Baru
        </a>
    </div>

    @if($galleries->isEmpty())
        <div class="text-center py-10 text-on-surface-variant border border-dashed border-outline-variant/30 rounded-xl">
            Belum ada foto galeri yang diunggah saat ini.
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-6">
            @foreach($galleries as $gallery)
                <div class="bg-surface-container-high rounded-xl overflow-hidden border border-gold-subtle group flex flex-col justify-between">
                    <div class="h-44 overflow-hidden relative">
                        <img src="{{ Str::startsWith($gallery->image_url, ['http://', 'https://']) ? $gallery->image_url : Storage::url($gallery->image_url) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-4">
                        <h4 class="font-bold text-on-surface text-sm mb-1 truncate">{{ $gallery->title }}</h4>
                        <p class="text-xs text-on-surface-variant line-clamp-2 mb-4">{{ $gallery->description ?? 'Dokumentasi Pentas' }}</p>
                        <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full border border-red-500/40 text-red-400 py-2 rounded text-xs font-bold hover:bg-red-500/10 transition-all flex items-center justify-center gap-1">
                                <span class="material-symbols-outlined text-sm">delete</span> Hapus Foto
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $galleries->links() }}
        </div>
    @endif
</div>
@endsection