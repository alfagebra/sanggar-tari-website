@extends('layouts.admin')

@section('title', 'Kelola Galeri Foto')
@section('header_title', 'Kelola Galeri Foto Sanggar')

@section('content')
<div class="bg-[#1e1c18] border-2 border-[#d4af37] rounded-2xl p-6 md:p-8 shadow-2xl">
    <div class="flex justify-between items-center mb-6">
        <h3 class="font-headline-md text-2xl font-black text-[#f2ca50] flex items-center gap-3">
            <span class="material-symbols-outlined text-3xl">photo_library</span> Dokumentasi Foto Pentas
        </h3>
        <a href="{{ route('admin.galleries.create') }}" class="bg-[#f2ca50] text-[#3c2f00] px-6 py-3 rounded-xl font-black text-sm hover:brightness-110 transition-all inline-flex items-center gap-2 shadow-lg">
            <span class="material-symbols-outlined text-base">upload</span> Unggah Foto Baru
        </a>
    </div>

    @if($galleries->isEmpty())
        <div class="text-center py-10 text-[#d0c5af] border-2 border-dashed border-[#d4af37]/40 rounded-xl bg-[#24211b]">
            Belum ada foto galeri yang diunggah saat ini.
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-6">
            @foreach($galleries as $gallery)
                <div class="bg-[#24211b] rounded-2xl overflow-hidden border-2 border-[#d4af37]/40 group flex flex-col justify-between shadow-xl">
                    <div class="h-44 overflow-hidden relative">
                        <img src="{{ Str::startsWith($gallery->image_url, ['http://', 'https://']) ? $gallery->image_url : Storage::url($gallery->image_url) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-4">
                        <h4 class="font-bold text-white text-base mb-1 truncate">{{ $gallery->title }}</h4>
                        <p class="text-xs text-[#d0c5af] line-clamp-2 mb-4">{{ $gallery->description ?? 'Dokumentasi Pentas' }}</p>
                        <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-950/60 border border-red-500/50 text-red-300 py-2 rounded-xl text-xs font-black hover:bg-red-900 transition-all flex items-center justify-center gap-1.5">
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