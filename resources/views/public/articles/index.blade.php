@extends('layouts.app')

@section('title', 'Artikel & Kabar Seni')

@section('content')
<section class="py-24 pt-32 bg-background min-h-screen">
    <div class="max-w-container-max mx-auto px-4 md:px-margin-desktop">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-primary font-label-md text-label-md tracking-widest uppercase mb-2 block">Jendela Budaya</span>
            <h1 class="font-headline-lg text-3xl md:text-5xl text-glow mb-6">Artikel & Kabar Seni</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant">Informasi terbaru, wawasan kebudayaan, dan kabar pertunjukan dari GSBK Candi.</p>
        </div>

        @if($articles->isEmpty())
            <div class="text-center py-16 bg-surface-container-low border border-gold-subtle rounded-xl text-on-surface-variant">
                Belum ada artikel yang diterbitkan saat ini.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                @foreach($articles as $article)
                    <article class="bg-surface-container-low border border-gold-subtle rounded-xl overflow-hidden hover:border-primary/50 transition-all duration-300 flex flex-col group">
                        @if($article->image_url)
                            <div class="h-56 overflow-hidden relative">
                                <img src="{{ Str::startsWith($article->image_url, ['http://', 'https://']) ? $article->image_url : Storage::url($article->image_url) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
                            </div>
                        @endif
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="text-xs font-bold text-primary uppercase tracking-widest block mb-2">SENI & BUDAYA</span>
                                <h3 class="font-headline-md text-xl font-bold text-on-surface group-hover:text-primary transition-colors mb-3">
                                    <a href="{{ $article->source_url ?? route('articles.show', $article->slug) }}" target="{{ $article->source_url ? '_blank' : '_self' }}">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-on-surface-variant line-clamp-3 mb-6">
                                    {{ Str::limit(strip_tags($article->content), 120) }}
                                </p>
                            </div>
                            <div class="pt-4 border-t border-outline-variant/20 flex justify-between items-center text-xs text-on-surface-variant">
                                <span>{{ $article->created_at->format('d M Y') }}</span>
                                <a href="{{ $article->source_url ?? route('articles.show', $article->slug) }}" class="text-primary font-bold hover:underline flex items-center gap-1">
                                    Baca <span class="material-symbols-outlined text-sm">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</section>
@endsection