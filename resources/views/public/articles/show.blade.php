@extends('layouts.app')

@section('title', $article->title)
@section('meta_description', Str::limit(strip_tags($article->content), 150))

@section('content')
    <article class="container" style="margin-top: 60px; margin-bottom: 80px;">
        <!-- Header -->
        <header class="article-detail-header">
            <span class="card-tag">{{ __('Seni & Budaya') }}</span>
            <h1 class="article-detail-title">{{ $article->title }}</h1>
            <div class="article-meta">
                <span>{{ __('Diterbitkan:') }} {{ $article->created_at->format('d F Y') }}</span>
            </div>
        </header>

        <!-- Main Image -->
        @if($article->image_url)
            <img src="{{ Str::startsWith($article->image_url, ['http://', 'https://']) ? $article->image_url : asset('storage/' . $article->image_url) }}" alt="{{ $article->title }}" class="article-detail-img">
        @endif

        <!-- Content -->
        <div class="article-content">
            {!! nl2br(e($article->content)) !!}
        </div>

        <div style="max-width: 800px; margin: 40px auto 0; border-top: 1px solid var(--border); padding-top: 30px;">
            <a href="{{ route('articles.index') }}" class="btn btn-outline btn-sm">&larr; {{ __('Kembali ke Daftar Artikel') }}</a>
        </div>
    </article>

    <!-- Recent Articles Bottom Section -->
    @if($recentArticles->isNotEmpty())
        <section class="container" style="border-top: 1px solid var(--border); padding-top: 60px; margin-bottom: 80px;">
            <h3 style="font-family: var(--font-heading); font-size: 1.8rem; margin-bottom: 30px; text-align: center;">{{ __('Artikel Terkait Lainnya') }}</h3>
            <div class="cards-grid">
                @foreach($recentArticles as $recent)
                    <article class="card">
                        @if($recent->image_url)
                            <div class="card-img-wrapper">
                                <a href="{{ $recent->source_url ?? route('articles.show', $recent->slug) }}" target="{{ $recent->source_url ? '_blank' : '_self' }}">
                                    <img src="{{ Str::startsWith($recent->image_url, ['http://', 'https://']) ? $recent->image_url : asset('storage/' . $recent->image_url) }}" alt="{{ $recent->title }}">
                                </a>
                            </div>
                        @endif
                        <div class="card-body">
                            <span class="card-tag">{{ __('Seni & Budaya') }}</span>
                            <h4 class="card-title" style="font-size: 1.2rem;">
                                <a href="{{ $recent->source_url ?? route('articles.show', $recent->slug) }}" target="{{ $recent->source_url ? '_blank' : '_self' }}" style="color: var(--dark);">
                                    {{ $recent->title }}
                                </a>
                            </h4>
                            <p class="card-desc" style="font-size: 0.9rem;">{{ Str::limit(strip_tags($recent->content), 100) }}</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border); padding-top: 12px; margin-top: 12px; font-size: 0.8rem; color: var(--text-muted);">
                                <span>{{ $recent->created_at->format('d M Y') }}</span>
                                <a href="{{ $recent->source_url ?? route('articles.show', $recent->slug) }}" target="{{ $recent->source_url ? '_blank' : '_self' }}" style="color: var(--primary); font-weight: 700;">{{ __('Baca Detail') }} &rarr;</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif
@endsection
