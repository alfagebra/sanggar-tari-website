@extends('layouts.app')

@section('title', 'Artikel & Kegiatan')

@section('content')
    <section class="container" style="margin-top: 60px; margin-bottom: 80px;">
        <div class="section-header">
            <span class="section-tag">{{ __('Kabar Budaya') }}</span>
            <h2>{{ __('Artikel & Kegiatan Sanggar') }}</h2>
            <p class="section-desc">{{ __('Membagikan liputan kegiatan pementasan, cerita sejarah tari, berita sanggar, dan wawasan kesenian tradisional.') }}</p>
        </div>

        @if($articles->isEmpty())
            <div style="text-align: center; padding: 60px; background: var(--white); border-radius: var(--radius); color: var(--text-muted); border: 1px solid var(--border); max-width: 600px; margin: 0 auto;">
                <p style="font-size: 1.1rem; margin-bottom: 16px;">{{ __('Belum ada artikel yang diterbitkan.') }}</p>
                <a href="{{ route('home') }}" class="btn btn-primary btn-sm">{{ __('Kembali ke Beranda') }}</a>
            </div>
        @else
            <div class="cards-grid">
                @foreach($articles as $article)
                    <article class="card">
                        @if($article->image_url)
                            <div class="card-img-wrapper">
                                <a href="{{ $article->source_url ?? route('articles.show', $article->slug) }}" target="{{ $article->source_url ? '_blank' : '_self' }}">
                                    <img src="{{ Str::startsWith($article->image_url, ['http://', 'https://']) ? $article->image_url : asset('storage/' . $article->image_url) }}" alt="{{ $article->title }}">
                                </a>
                            </div>
                        @endif
                        <div class="card-body">
                            <span class="card-tag">{{ __('Seni & Budaya') }}</span>
                            <h3 class="card-title">
                                <a href="{{ $article->source_url ?? route('articles.show', $article->slug) }}" target="{{ $article->source_url ? '_blank' : '_self' }}" style="color: var(--dark); font-family: var(--font-heading);">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            <p class="card-desc">{{ Str::limit(strip_tags($article->content), 150) }}</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border); padding-top: 16px; margin-top: 16px; font-size: 0.85rem; color: var(--text-muted);">
                                <span>{{ $article->created_at->format('d M Y') }}</span>
                                <a href="{{ $article->source_url ?? route('articles.show', $article->slug) }}" target="{{ $article->source_url ? '_blank' : '_self' }}" style="color: var(--primary); font-weight: 700;">{{ __('Baca Detail') }} &rarr;</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Custom Pagination -->
            @if($articles->lastPage() > 1)
                <div class="pagination-wrapper" style="margin-top: 50px;">
                    @if ($articles->onFirstPage())
                        <span class="btn btn-outline btn-sm" style="opacity: 0.5; cursor: not-allowed;">&larr; {{ __('Sebelumnya') }}</span>
                    @else
                        <a href="{{ $articles->previousPageUrl() }}" class="btn btn-outline btn-sm">&larr; {{ __('Sebelumnya') }}</a>
                    @endif

                    <span style="align-self: center; font-weight: 600; color: var(--text-muted); font-size: 0.9rem; margin: 0 20px;">
                        {{ __('Halaman') }} {{ $articles->currentPage() }} {{ __('dari') }} {{ $articles->lastPage() }}
                    </span>

                    @if ($articles->hasMorePages())
                        <a href="{{ $articles->nextPageUrl() }}" class="btn btn-outline btn-sm">{{ __('Selanjutnya') }} &rarr;</a>
                    @else
                        <span class="btn btn-outline btn-sm" style="opacity: 0.5; cursor: not-allowed;">{{ __('Selanjutnya') }} &rarr;</span>
                    @endif
                </div>
            @endif
        @endif
    </section>
@endsection
