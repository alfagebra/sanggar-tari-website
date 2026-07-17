@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Slider Section (Untitled UI Featured Style) -->
    <section class="container hero-slider-section">
        <div class="slideshow-container">
            @if($galleries->isEmpty())
                <!-- Fallback Slide 1 -->
                <div class="slide-item active">
                    <img src="{{ asset('images/hero-dance.jpg') }}" alt="Pentas Seni Tradisional">
                    <div class="slide-caption">
                        <span class="slide-tag">{{ __('Pelestarian Budaya') }}</span>
                        <h3>{{ __('Selamat Datang di Sanggar Seni Tari') }}</h3>
                        <p>{{ __('Wadah kreativitas seni dan pelestarian budaya luhur Nusantara melalui keindahan gerak tari tradisional Indonesia.') }}</p>
                    </div>
                    <div class="slide-arrow" onclick="nextSlide()">&rarr;</div>
                </div>
                <!-- Fallback Slide 2 -->
                <div class="slide-item">
                    <img src="{{ asset('images/hero-dance.jpg') }}" alt="Latihan Rutin" style="filter: sepia(0.15) brightness(0.6);">
                    <div class="slide-caption">
                        <span class="slide-tag">{{ __('Pendidikan Seni') }}</span>
                        <h3>{{ __('Pendidikan Karakter & Estetika') }}</h3>
                        <p>{{ __('Membina kedisiplinan, rasa percaya diri, dan kecintaan akan seni budaya sejak usia dini.') }}</p>
                    </div>
                    <div class="slide-arrow" onclick="nextSlide()">&rarr;</div>
                </div>
            @else
                @foreach($galleries->take(5) as $key => $gallery)
                    <div class="slide-item {{ $key === 0 ? 'active' : '' }}">
                        <img src="{{ Str::startsWith($gallery->image_url, ['http://', 'https://']) ? $gallery->image_url : asset('storage/' . $gallery->image_url) }}" alt="{{ $gallery->title }}">
                        <div class="slide-caption">
                            <span class="slide-tag">{{ __('Sorotan Kegiatan') }}</span>
                            <h3>{{ $gallery->title }}</h3>
                            <p>{{ $gallery->description ?? __('Dokumentasi Sanggar Tari') }}</p>
                        </div>
                        <div class="slide-arrow" onclick="nextSlide()">&rarr;</div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Slideshow dots -->
        @if(!$galleries->isEmpty() && $galleries->take(5)->count() > 1)
            <div class="slideshow-controls">
                @foreach($galleries->take(5) as $key => $gallery)
                    <span class="slide-dot {{ $key === 0 ? 'active' : '' }}" onclick="currentSlide({{ $key }})"></span>
                @endforeach
            </div>
        @elseif($galleries->isEmpty())
            <div class="slideshow-controls">
                <span class="slide-dot active" onclick="currentSlide(0)"></span>
                <span class="slide-dot" onclick="currentSlide(1)"></span>
            </div>
        @endif
    </section>

    <!-- Recent Articles Grid (Recent blog posts Section) -->
    <section class="container home-section">
        <h2 class="home-section-title">{{ __('Kabar Seni Terbaru') }}</h2>
        
        @if($articles->isEmpty())
            <div style="padding: 40px; text-align: center; border: 1.5px dashed var(--border); border-radius: var(--radius); color: var(--text-muted);">
                {{ __('Belum ada kabar seni atau artikel yang diterbitkan saat ini.') }}
            </div>
        @else
            <div class="three-column-grid">
                @foreach($articles as $article)
                    <article class="blog-card">
                        @if($article->image_url)
                            <div class="blog-card-img-wrapper">
                                <a href="{{ $article->source_url ?? route('articles.show', $article->slug) }}" target="{{ $article->source_url ? '_blank' : '_self' }}">
                                    <img src="{{ Str::startsWith($article->image_url, ['http://', 'https://']) ? $article->image_url : asset('storage/' . $article->image_url) }}" alt="{{ $article->title }}">
                                </a>
                            </div>
                        @endif
                        <span class="blog-card-tag">{{ __('Seni & Budaya') }}</span>
                        <h3 class="blog-card-title">
                            <a href="{{ $article->source_url ?? route('articles.show', $article->slug) }}" target="{{ $article->source_url ? '_blank' : '_self' }}">
                                {{ $article->title }}
                            </a>
                        </h3>
                        <p class="blog-card-desc">{{ Str::limit(strip_tags($article->content), 120) }}</p>
                        
                        <div class="blog-card-meta">
                            <span>{{ $article->created_at->format('d M Y') }}</span>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- "Loading More..." Style Redirect Button -->
            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ route('articles.index') }}" class="btn btn-dark-pill">{{ __('Semua Artikel') }}</a>
            </div>
        @endif
    </section>

    <!-- Recent Gallery Photos Grid (3 Column Grid) -->
    <section class="container home-section">
        <h2 class="home-section-title">{{ __('Galeri Foto Terbaru') }}</h2>

        @if($galleries->isEmpty())
            <div style="padding: 40px; text-align: center; border: 1.5px dashed var(--border); border-radius: var(--radius); color: var(--text-muted);">
                {{ __('Belum ada dokumentasi foto yang diunggah.') }}
            </div>
        @else
            <div class="three-column-grid">
                @foreach($galleries->take(3) as $gallery)
                    <div class="blog-card">
                        <div class="blog-card-img-wrapper" style="height: 260px;">
                            <img src="{{ Str::startsWith($gallery->image_url, ['http://', 'https://']) ? $gallery->image_url : asset('storage/' . $gallery->image_url) }}" alt="{{ $gallery->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <span class="blog-card-tag" style="color: var(--secondary);">{{ __('Galeri Pentas') }}</span>
                        <h3 class="blog-card-title">{{ $gallery->title }}</h3>
                        <p class="blog-card-desc">{{ $gallery->description ?? __('Dokumentasi Sanggar Tari') }}</p>
                    </div>
                @endforeach
            </div>

            <!-- "Loading More..." Style Redirect Button -->
            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ route('gallery.index') }}" class="btn btn-dark-pill">{{ __('Lihat Semua Galeri') }}</a>
            </div>
        @endif
    </section>

    <!-- Google Maps & Contact Info Section -->
    <section class="container map-section">
        <h2 class="home-section-title">{{ __('Lokasi & Kontak Kami') }}</h2>
        <div class="location-contact-grid">
            <!-- Left Column: Google Maps -->
            <div class="map-container-wrapper">
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.973461245464!2d110.370529!3d-7.792613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357e2f073e50269f%3A0x959779df52c8b82e!2sYogyakarta%2C%20Kota%20Yogyakarta%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1625000000000!5m2!1sid!2sid" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
            <!-- Right Column: Contact Details Card -->
            <div class="contact-info-card">
                <h3>{{ __('Hubungi Kami') }}</h3>
                <p class="contact-tagline">{{ __('Silakan hubungi kami untuk pendaftaran, kolaborasi pentas, atau informasi lainnya.') }}</p>
                
                <div class="contact-details-list">
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                        <div class="contact-detail-text">
                            <strong>{{ __('Alamat') }}</strong>
                            <span>{{ $profile->address ?? 'Jl. Kebudayaan No. 45, Yogyakarta, Indonesia' }}</span>
                        </div>
                    </div>
                    
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <div class="contact-detail-text">
                            <strong>{{ __('Telepon / WhatsApp') }}</strong>
                            <span>{{ $profile->phone ?? '+62 812-3456-7890' }}</span>
                        </div>
                    </div>
                    
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </div>
                        <div class="contact-detail-text">
                            <strong>{{ __('Email') }}</strong>
                            <span>{{ $profile->email ?? 'info@sanggartari.com' }}</span>
                        </div>
                    </div>
                </div>

                @if($profile)
                    <div class="contact-social-links">
                        @if($profile->instagram)
                            <a href="https://instagram.com/{{ $profile->instagram }}" target="_blank" class="social-pill">Instagram</a>
                        @endif
                        @if($profile->facebook)
                            <a href="https://facebook.com/{{ $profile->facebook }}" target="_blank" class="social-pill">Facebook</a>
                        @endif
                        @if($profile->tiktok)
                            <a href="https://tiktok.com/@{{ $profile->tiktok }}" target="_blank" class="social-pill">TikTok</a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Call To Action (CTA) Banner Section (Untitled UI Style) -->
    <section class="container">
        <div class="cta-banner">
            <h2>{{ __('Mari Bergabung Bersama Kami') }}</h2>
            <p>{{ __('Pelajari keindahan seni tari tradisional Nusantara secara menyenangkan bersama instruktur berpengalaman di sanggar kami.') }}</p>
            <div class="cta-actions">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->phone ?? '081234567890') }}" target="_blank" class="btn btn-whatsapp">
                    {{ __('Hubungi WhatsApp') }}
                </a>
                <a href="{{ route('schedule.index') }}" class="btn btn-schedule">
                    {{ __('Lihat Jadwal Kelas') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Slideshow Auto-play Javascript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentSlideIndex = 0;
            const slides = document.querySelectorAll('.slide-item');
            const dots = document.querySelectorAll('.slide-dot');
            const slideCount = slides.length;

            if (slideCount <= 1) return;

            function showSlide(index) {
                slides.forEach((slide) => slide.classList.remove('active'));
                dots.forEach((dot) => dot.classList.remove('active'));
                
                slides[index].classList.add('active');
                if (dots[index]) {
                    dots[index].classList.add('active');
                }
                currentSlideIndex = index;
            }

            window.nextSlide = function() {
                let nextIndex = (currentSlideIndex + 1) % slideCount;
                showSlide(nextIndex);
            }

            let slideInterval = setInterval(nextSlide, 5000); // Ganti slide setiap 5 detik

            window.currentSlide = function(index) {
                clearInterval(slideInterval);
                showSlide(index);
                slideInterval = setInterval(nextSlide, 5000); // Mulai ulang timer
            };
        });
    </script>
@endsection
