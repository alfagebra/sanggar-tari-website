@extends('layouts.app')

@section('title', $article->title)
@section('meta_description', Str::limit(strip_tags($article->content), 150))

@php
    $imageUrl = fn ($path) => Str::startsWith($path, ['http://', 'https://']) ? $path : Storage::url($path);
    $published = $article->created_at->locale('id')->translatedFormat('d F Y');
@endphp

@section('content')
<article class="py-24 pt-36 md:pt-44 bg-background">
    <div class="max-w-container-max mx-auto px-4 md:px-margin-desktop">

        {{-- Header --}}
        <header class="max-w-3xl mx-auto text-center mb-10">
            <a href="{{ route('articles.index') }}" class="text-primary font-label-md text-label-md font-bold hover:underline inline-flex items-center gap-1 mb-6">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                Semua artikel
            </a>
            <h1 class="font-headline-lg text-3xl md:text-5xl font-black leading-tight text-on-background mb-5 break-words">
                {{ $article->title }}
            </h1>
            <p class="text-sm text-on-surface-variant">
                Diterbitkan {{ $published }}
            </p>
        </header>

        {{-- Gambar utama --}}
        @if($article->image_url)
            <img
                src="{{ $imageUrl($article->image_url) }}"
                alt="{{ $article->title }}"
                class="w-full max-w-4xl mx-auto aspect-video object-cover rounded-2xl border border-gold-subtle shadow-sm mb-12"
            >
        @endif

        {{-- Isi artikel --}}
        <div class="max-w-3xl mx-auto font-body-lg text-body-lg text-on-surface leading-loose break-words">
            {!! nl2br(e($article->content)) !!}
        </div>

        {{-- Tautan sumber (jika artikel berasal dari situs lain) --}}
        @if($article->source_url)
            <div class="max-w-3xl mx-auto mt-8">
                <a href="{{ $article->source_url }}" target="_blank" rel="noopener noreferrer" class="text-primary font-bold hover:underline inline-flex items-center gap-1">
                    Baca di sumber asli
                    <span class="material-symbols-outlined text-sm">open_in_new</span>
                </a>
            </div>
        @endif

        <div class="max-w-3xl mx-auto mt-10 pt-8 border-t border-gold-subtle">
            <a href="{{ route('articles.index') }}" class="text-primary font-bold hover:underline inline-flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                Kembali ke daftar artikel
            </a>
        </div>
    </div>
</article>

{{-- Artikel lainnya --}}
@if($recentArticles->isNotEmpty())
    <section class="pb-24 bg-background">
        <div class="max-w-container-max mx-auto px-4 md:px-margin-desktop">
            <div class="border-t border-gold-subtle pt-16">
                <h2 class="font-headline-md text-2xl md:text-3xl font-bold text-on-background text-center mb-10">
                    Artikel lainnya
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($recentArticles as $recent)
                        @php
                            $recentUrl = $recent->source_url ?? route('articles.show', $recent->slug);
                            $recentTarget = $recent->source_url ? '_blank' : '_self';
                        @endphp
                        <article class="bg-surface-container-low border border-gold-subtle rounded-2xl overflow-hidden hover:border-primary/50 transition-all duration-300 flex flex-col group shadow-sm">
                            @if($recent->image_url)
                                <a href="{{ $recentUrl }}" target="{{ $recentTarget }}" class="block h-56 overflow-hidden">
                                    <img
                                        src="{{ $imageUrl($recent->image_url) }}"
                                        alt="{{ $recent->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    >
                                </a>
                            @endif
                            <div class="p-6 flex-1 flex flex-col justify-between">
                                <div>
                                    <h3 class="font-headline-md text-xl font-bold text-on-surface group-hover:text-primary transition-colors mb-3">
                                        <a href="{{ $recentUrl }}" target="{{ $recentTarget }}">{{ $recent->title }}</a>
                                    </h3>
                                    <p class="text-sm text-on-surface-variant line-clamp-3 mb-6 leading-relaxed">
                                        {{ Str::limit(strip_tags($recent->content), 100) }}
                                    </p>
                                </div>
                                <div class="pt-4 border-t border-gold-subtle flex justify-between items-center text-xs text-on-surface-variant">
                                    <span>{{ $recent->created_at->locale('id')->translatedFormat('d M Y') }}</span>
                                    <a href="{{ $recentUrl }}" target="{{ $recentTarget }}" class="text-primary font-bold hover:underline">
                                        Baca selengkapnya
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
@endsection