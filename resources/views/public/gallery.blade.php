@extends('layouts.app')

@section('title', 'Galeri Foto')

@section('content')
    <section class="container" style="margin-top: 60px; margin-bottom: 80px;">
        <div class="section-header">
            <span class="section-tag">{{ __('Dokumentasi') }}</span>
            <h2>{{ __('Galeri Foto Sanggar') }}</h2>
            <p class="section-desc">{{ __('Melihat dokumentasi visual berbagai aktivitas kami, mulai dari latihan mingguan hingga pentas seni budaya di panggung nasional.') }}</p>
        </div>

        @if($galleries->isEmpty())
            <div style="text-align: center; padding: 60px; background: var(--white); border-radius: var(--radius); color: var(--text-muted); border: 1px solid var(--border); max-width: 600px; margin: 0 auto;">
                <p style="font-size: 1.1rem; margin-bottom: 16px;">{{ __('Belum ada dokumentasi foto yang diunggah.') }}</p>
                <a href="{{ route('home') }}" class="btn btn-primary btn-sm">{{ __('Kembali ke Beranda') }}</a>
            </div>
        @else
            <div class="gallery-grid">
                @foreach($galleries as $gallery)
                    <div class="gallery-item">
                        <img src="{{ Str::startsWith($gallery->image_url, ['http://', 'https://']) ? $gallery->image_url : Storage::url($gallery->image_url) }}" alt="{{ $gallery->title }}">
                        <div class="gallery-overlay">
                            <h4>{{ $gallery->title }}</h4>
                            <p>{{ $gallery->description ?? __('Dokumentasi Sanggar Tari') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Custom Pagination -->
            @if($galleries->lastPage() > 1)
                <div class="pagination-wrapper" style="margin-top: 50px;">
                    @if ($galleries->onFirstPage())
                        <span class="btn btn-outline btn-sm" style="opacity: 0.5; cursor: not-allowed;">&larr; {{ __('Sebelumnya') }}</span>
                    @else
                        <a href="{{ $galleries->previousPageUrl() }}" class="btn btn-outline btn-sm">&larr; {{ __('Sebelumnya') }}</a>
                    @endif

                    <span style="align-self: center; font-weight: 600; color: var(--text-muted); font-size: 0.9rem; margin: 0 20px;">
                        {{ __('Halaman') }} {{ $galleries->currentPage() }} {{ __('dari') }} {{ $galleries->lastPage() }}
                    </span>

                    @if ($galleries->hasMorePages())
                        <a href="{{ $galleries->nextPageUrl() }}" class="btn btn-outline btn-sm">{{ __('Selanjutnya') }} &rarr;</a>
                    @else
                        <span class="btn btn-outline btn-sm" style="opacity: 0.5; cursor: not-allowed;">{{ __('Selanjutnya') }} &rarr;</span>
                    @endif
                </div>
            @endif
        @endif
    </section>
@endsection
