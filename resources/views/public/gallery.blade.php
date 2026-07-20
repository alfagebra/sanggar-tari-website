@extends('layouts.app')

@section('title', 'Galeri Pentas Visual')

@section('content')
<section class="py-24 pt-36 md:pt-44 bg-background min-h-screen">
    <div class="max-w-container-max mx-auto px-4 md:px-margin-desktop">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-primary font-label-md text-label-md tracking-widest uppercase mb-2 block font-bold">Dokumentasi</span>
            <h1 class="font-headline-lg text-3xl md:text-5xl mb-6 font-black leading-tight text-on-background">Galeri Visual & Pentas</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">Momen-momen indah pementasan seni tari dan kebudayaan Jawa di GSBK Candi.</p>
        </div>

        @if($galleries->isEmpty())
            <div class="text-center py-16 bg-surface-container-low border border-gold-subtle rounded-2xl text-on-surface-variant shadow-sm">
                Belum ada foto galeri yang diunggah saat ini.
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">
                @foreach($galleries as $gallery)
                    <div class="relative group overflow-hidden rounded-2xl border border-gold-subtle aspect-square bg-surface-container-high shadow-md">
                        <img src="{{ Str::startsWith($gallery->image_url, ['http://', 'https://']) ? $gallery->image_url : Storage::url($gallery->image_url) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"/>
                        
                        <!-- Always visible subtle overlay + rich hover overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/50 to-transparent p-5 flex flex-col justify-end transition-opacity duration-300">
                            <h4 class="font-headline-md text-lg font-bold text-[#f2ca50] mb-1 drop-shadow-sm">{{ $gallery->title }}</h4>
                            <p class="text-xs text-slate-200 line-clamp-2 leading-relaxed">{{ $gallery->description ?? 'Dokumentasi Sanggar Tari' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>
</section>
@endsection