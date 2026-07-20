@extends('layouts.app')

@section('title', 'Galeri Pentas Visual')

@section('content')
<section class="py-24 pt-32 bg-background min-h-screen">
    <div class="max-w-container-max mx-auto px-4 md:px-margin-desktop">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-primary font-label-md text-label-md tracking-widest uppercase mb-2 block">Dokumentasi</span>
            <h1 class="font-headline-lg text-3xl md:text-5xl text-glow mb-6">Galeri Visual & Pentas</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant">Momen-momen indah pementasan seni tari dan kebudayaan Jawa di GSBK Candi.</p>
        </div>

        @if($galleries->isEmpty())
            <div class="text-center py-16 bg-surface-container-low border border-gold-subtle rounded-xl text-on-surface-variant">
                Belum ada foto galeri yang diunggah saat ini.
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">
                @foreach($galleries as $gallery)
                    <div class="relative group overflow-hidden rounded-xl border border-gold-subtle aspect-square bg-surface-container-high">
                        <img src="{{ Str::startsWith($gallery->image_url, ['http://', 'https://']) ? $gallery->image_url : Storage::url($gallery->image_url) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity p-6 flex flex-col justify-end">
                            <h4 class="font-headline-md text-lg font-bold text-primary mb-1">{{ $gallery->title }}</h4>
                            <p class="text-xs text-on-surface-variant line-clamp-2">{{ $gallery->description ?? 'Dokumentasi Sanggar Tari' }}</p>
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