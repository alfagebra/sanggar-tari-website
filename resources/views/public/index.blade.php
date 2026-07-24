@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen flex items-center pt-20 overflow-hidden">
    <div class="absolute inset-0 z-0">
        @if(!$galleries->isEmpty() && $galleries->first()->image_url)
            <img class="w-full h-full object-cover grayscale-[20%] hover:grayscale-0 transition-all duration-1000" src="{{ Str::startsWith($galleries->first()->image_url, ['http://', 'https://']) ? $galleries->first()->image_url : Storage::url($galleries->first()->image_url) }}" alt="Hero Background"/>
        @else
            <img class="w-full h-full object-cover grayscale-[20%] hover:grayscale-0 transition-all duration-1000" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjwrYrlFEbog22tccAN7BuaR-Aa3OM7_DStrWexJyRjRvokmAA07bqNdVS-977-yjsuj00oUkDzjK1JbERGO4y0EXsPY9_SZJ-38KWUMZDB_u3TpayONXHBPU2xxFXaeCNvjefSGYL6N-_yLcpI0lsC3_CzcyPNX81H5Oc0_1NFyLHFKpJGKVv35ppr4eByRPEOK2rHCTdCUfm_RYUGG_IioxHKkPpH2Ts-bVxMhd2oVyfLQ_x93CbaIeA5MLdMYszcuIKhlYdCO4k" alt="Hero Default"/>
        @endif
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/30"></div>
    </div>
    <div class="relative z-10 max-w-container-max mx-auto px-4 md:px-margin-desktop w-full">
        <div class="max-w-2xl bg-black/65 backdrop-blur-md border-2 border-[#f2ca50]/50 p-8 md:p-12 rounded-3xl shadow-2xl">
            <p class="text-[#f2ca50] font-label-md text-label-md tracking-widest uppercase mb-4 animate-pulse font-bold">Warisan Budaya Jawi</p>
            <h1 class="font-display-lg text-4xl md:text-5xl text-white font-black leading-tight mb-6 drop-shadow-md">{!! nl2br(e($profile->hero_title ?? 'Melestarikan Budaya, Menginspirasi Generasi')) !!}</h1>
            <p class="font-body-lg text-body-lg text-slate-200 mb-8 max-w-xl leading-relaxed">
                {{ $profile->hero_subtitle ?? 'Gubug Seni Begog Kiyatdiharjan hadir sebagai episentrum pelestarian seni tari dan karawitan di lereng Candi Mlese, menjaga nyala api tradisi tetap berkobar bagi masa depan.' }}
            </p>
            <div class="flex flex-wrap gap-4 md:gap-6">
                <a href="{{ route('schedule.index') }}" class="bg-[#f2ca50] text-[#3c2f00] px-8 md:px-10 py-4 font-bold rounded-xl hover:brightness-110 shadow-lg transition-all inline-block">Jelajahi Program</a>
                <a href="#sejarah" class="border-2 border-[#f2ca50] text-[#f2ca50] hover:bg-[#f2ca50]/20 px-8 md:px-10 py-4 font-bold rounded-xl transition-all inline-block">Tentang Kami</a>
            </div>
        </div>
    </div>
</section>

<!-- Sejarah Section -->
<section class="py-32 bg-surface-dim" id="sejarah">
    <div class="max-w-container-max mx-auto px-4 md:px-margin-desktop grid grid-cols-1 md:grid-cols-12 gap-16 items-center">
        <div class="md:col-span-5 relative">
            <div class="aspect-[4/5] bg-surface-container-high rounded-xl border border-gold-subtle overflow-hidden relative">
                <img class="w-full h-full object-cover opacity-80 hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCrG6ejS-LVZC1DRCrR8gtm-qACIw_LMZmzzPwZ6lvGdJ-KXThlQL5at56nIapJh0BVawB95kSERC3nz0j6DFr_7hRF8cUPAkUFF-CtXdDYmpsl8rj4MDy2ksFoIgZFXW5s3VGLYm-MNOJy7gHsmeoyYV-t4fbyrlo9DhZiA_GljRBgv2lZVf5s47bBVUm2cCkb66nVb4jump83X--k-NwMEG3NTWbDH5W0hOmom5cA-CC__enIRfTX4xCFXRGRSRUHx9jHX1TVyY3G" alt="Penari Tradisional Jawa"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            </div>
            <!-- Float Decoration -->
            <div class="absolute -bottom-8 -right-8 bg-primary text-on-primary p-6 md:p-8 rounded-xl border-2 border-primary-container shadow-2xl hidden lg:block">
                <p class="font-headline-md text-3xl md:text-4xl font-black mb-1">{{ $profile->founded_year ?? '1998' }}</p>
                <p class="font-label-md text-xs font-black uppercase tracking-widest opacity-90">Tahun Berdiri</p>
            </div>
        </div>
        <div class="md:col-span-7">
            <h2 class="font-headline-lg text-3xl md:text-headline-lg mb-8">Pijak Kuat dalam <span class="text-primary italic">Tradisi</span></h2>
            <div class="space-y-6">
                <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                    {{ $profile->history ?? 'Gubug Seni Begog Kiyatdiharjan (GSBK) bukan sekadar sanggar seni, melainkan wujud pengabdian terhadap akar budaya Jawa yang luhur. Berawal dari kecintaan keluarga Kiyatdiharjan terhadap seni pertunjukan, kami bertransformasi menjadi pusat pembelajaran yang inklusif.' }}
                </p>
                <p class="font-body-md text-body-md text-on-surface-variant/80 italic border-l-4 border-primary pl-6 py-2">
                    "{{ $profile->quote_text ?? 'Seni bukan sekadar tontonan, melainkan tuntunan hidup yang harus diwariskan dari satu tarikan napas ke tarikan napas berikutnya.' }}"
                </p>
                <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                    {{ $profile->sejarah_subtitle ?? 'Berlokasi tepat di kawasan bersejarah Candi Mlese, GSBK mengintegrasikan atmosfer sakral peninggalan masa lampau dengan semangat inovasi kontemporer, memastikan setiap gerakan tari dan ketukan gamelan memiliki makna yang dalam.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Jadwal & Lokasi -->
<section class="py-32 bg-background relative overflow-hidden" id="jadwal">
    <div class="max-w-container-max mx-auto px-4 md:px-margin-desktop">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-8">
            <div>
                <h2 class="font-headline-lg text-3xl md:text-headline-lg mb-4">Aktivitas & Kunjungan</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant">Saksikan dan bergabunglah dalam perayaan rutin kami.</p>
            </div>
            <div class="bg-surface-container-high p-1 flex rounded-lg">
                <button class="px-6 py-2 bg-primary text-on-primary font-label-md text-label-md rounded-md">Reguler</button>
                <a href="{{ route('schedule.index') }}" class="px-6 py-2 text-on-surface-variant hover:text-primary font-label-md text-label-md rounded-md transition-colors">Semua Jadwal</a>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Activity List -->
            <div class="lg:col-span-2 space-y-4">
                @if(!isset($schedules) || $schedules->isEmpty())
                    <div class="bg-surface-container-low border border-gold-subtle p-6 flex items-center gap-6 group hover:bg-surface-container-high transition-all duration-300 rounded-xl">
                        <div class="flex-shrink-0 w-16 h-16 bg-primary/10 rounded-full flex flex-col items-center justify-center border border-primary/20">
                            <span class="font-bold text-primary">24</span>
                            <span class="text-[10px] uppercase text-primary/70">JUL</span>
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-headline-md text-xl md:text-headline-md mb-1 text-on-surface group-hover:text-primary transition-colors">Latihan Rutin Karawitan & Tari</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant">Setiap Rabu & Sabtu Malam • Sanggar GSBK</p>
                        </div>
                        <span class="material-symbols-outlined text-primary-fixed-dim">arrow_forward</span>
                    </div>
                @else
                    @foreach($schedules->take(3) as $schedule)
                        <div class="bg-surface-container-low border border-gold-subtle p-6 flex items-center gap-6 group hover:bg-surface-container-high transition-all duration-300 rounded-xl">
                            <div class="flex-shrink-0 w-16 h-16 bg-primary/10 rounded-full flex flex-col items-center justify-center border border-primary/20">
                                <span class="font-bold text-primary">{{ strtoupper(substr($schedule->day, 0, 3)) }}</span>
                                <span class="text-[10px] uppercase text-primary/70">HARI</span>
                            </div>
                            <div class="flex-grow">
                                <h3 class="font-headline-md text-xl md:text-headline-md mb-1 text-on-surface group-hover:text-primary transition-colors">{{ $schedule->class_name }}</h3>
                                <p class="font-body-md text-body-md text-on-surface-variant">{{ $schedule->time }} • Pelatih: {{ $schedule->instructor ?? 'GSBK' }}</p>
                            </div>
                            <a href="{{ route('schedule.index') }}" class="material-symbols-outlined text-primary-fixed-dim">arrow_forward</a>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Location Map Marker Stylized -->
            <div class="bg-surface-container-high rounded-xl overflow-hidden border border-gold-subtle relative h-[400px] lg:h-auto" id="lokasi">
                <div class="absolute inset-0 opacity-40 grayscale contrast-125">
                    <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB-HNQ7tiGpQ1qdd4tDq9Wk529yVoHsNvx_0z2VR5i8Q4wLr6vt5F79mXecDwFw24G3cyHDuW4dj6BxYvHosbYWNPZU15kwDp14GBvqr9mlm5pQw_rNaPuPmln6crASUfYcQmjNtDxZi1ToO65VeMEkOIvWUmaTm4fDpjyVstklZdyDQbvlBVjp6rVhhlOeiIrT6FEoZXPaVIv3Gs1NVlSsetHT_s0ZpNDCT6LhntMBiVp6WJ23ux2pAmGO0yM-XAXwiayX5XWMeA45" alt="Lokasi Sanggar"/>
                </div>
                <div class="relative z-10 p-8 h-full flex flex-col justify-end bg-gradient-to-t from-background to-transparent">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="material-symbols-outlined text-primary text-3xl">location_on</span>
                        <h3 class="font-headline-md text-headline-md">Candi Mlese</h3>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6">
                        {{ $profile->address ?? 'Gantiwarno, Klaten, Jawa Tengah.' }}<br/>Akses mudah dari Solo dan Yogyakarta.
                    </p>
                    <a class="inline-flex items-center gap-2 text-primary font-label-md text-label-md hover:underline decoration-2 underline-offset-8" href="https://maps.google.com/?q={{ urlencode($profile->address ?? 'Candi Mlese Klaten') }}" target="_blank">
                        Buka Google Maps <span class="material-symbols-outlined">open_in_new</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Artikel & Galeri (Bento Grid Style) -->
<section class="py-32 bg-surface-dim" id="artikel">
    <div class="max-w-container-max mx-auto px-4 md:px-margin-desktop">
        <div class="flex justify-between items-end mb-16">
            <div>
                <h2 class="font-headline-lg text-3xl md:text-headline-lg mb-4">Jendela Budaya</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant">Kisah dari balik panggung dan kilasan momen terbaik.</p>
            </div>
            <a class="font-label-md text-label-md text-primary hover:text-primary-fixed-dim transition-colors flex items-center gap-2" href="{{ route('gallery.index') }}">Lihat Semua <span class="material-symbols-outlined">grid_view</span></a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-none md:grid-rows-2 gap-6 h-auto md:h-[700px]">
            <!-- Main Featured Article -->
            @php $mainArticle = $articles->first(); @endphp
            <div class="md:col-span-2 md:row-span-2 relative group overflow-hidden rounded-xl border border-gold-subtle min-h-[350px]">
                @if($mainArticle && $mainArticle->image_url)
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000" src="{{ Str::startsWith($mainArticle->image_url, ['http://', 'https://']) ? $mainArticle->image_url : Storage::url($mainArticle->image_url) }}" alt="{{ $mainArticle->title }}"/>
                @else
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDuVXmJ1WPTHLimJrAYdisvhYCpQQ6sGZYnPxoFRNcYt2lqSSHH7Ucm_gA58-wKta5v-DDPYbRi0Gj2xqLcjb5rv7V3kSBDg9oG0MFhj-2nuS4ZEPKFvAE1aoOI95joTp6n-NIb4-XPOWe_c0GhtcB8qsut0RHTfOEFmxFpA5O6tGyeKLnQG8aECXT9lDipgRym7-tzzNj244C4XJ2QWoAMzTrvbmr-sSTXJK8ejx7_BTQBcXbu4KSYL_t0UeyFVbfrRGxml1fzjTEC" alt="Filosofi Gerak"/>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                <div class="absolute bottom-0 p-6 md:p-10">
                    <span class="inline-block bg-primary text-on-primary px-3 py-1 text-[10px] font-bold tracking-widest uppercase mb-4">FEATURED ARTICLE</span>
                    <h3 class="font-headline-lg text-2xl md:text-headline-lg mb-4 text-glow">
                        {{ $mainArticle->title ?? 'Filosofi Gerak dalam Tari Gambyong' }}
                    </h3>
                    <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mb-6">
                        {{ $mainArticle ? Str::limit(strip_tags($mainArticle->content), 120) : 'Mengenal lebih dalam makna setiap jengkal gerakan yang menyimbolkan keanggunan dan kesuburan perempuan Jawa.' }}
                    </p>
                    <a href="{{ $mainArticle ? route('articles.show', $mainArticle->slug) : route('articles.index') }}" class="font-label-md text-label-md text-primary flex items-center gap-2 group-hover:gap-4 transition-all">Baca Selengkapnya <span class="material-symbols-outlined">trending_flat</span></a>
                </div>
            </div>

            <!-- Gallery Item 1 -->
            @php $gal1 = $galleries->skip(1)->first(); @endphp
            <div class="md:col-span-1 relative group overflow-hidden rounded-xl border border-gold-subtle h-[200px] md:h-auto" id="galeri">
                @if($gal1 && $gal1->image_url)
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="{{ Str::startsWith($gal1->image_url, ['http://', 'https://']) ? $gal1->image_url : Storage::url($gal1->image_url) }}" alt="{{ $gal1->title }}"/>
                @else
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBBkBc0VwH5wSjIzcx8c05mlHPLDAmFBXsnVYw3fWuKp4O6Qet1B1LACb6uxmcyg_PmuQsjsI9LiTRyNagktYViWzSglXGLSSFpU9wYdl4qOvt4ThZPZ72aXtDMA5ZrvedaaxPDevI-JBzGNevdWbxQV8xgvLXWD5wdD2lFxqVARW8Mf-3pAz7kaHgyxUMPjqrWAHreLTE5uT4gdtqDYnzyXXT7q7dLewbyyWBI3UEQL39mwM7idJJvqUYvmkfHm9jed-q7KomGKO3-" alt="Gamelan"/>
                @endif
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <a href="{{ route('gallery.index') }}" class="material-symbols-outlined text-white text-4xl">fullscreen</a>
                </div>
            </div>

            <!-- Gallery Item 2 -->
            @php $gal2 = $galleries->skip(2)->first(); @endphp
            <div class="md:col-span-1 relative group overflow-hidden rounded-xl border border-gold-subtle h-[200px] md:h-auto">
                @if($gal2 && $gal2->image_url)
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="{{ Str::startsWith($gal2->image_url, ['http://', 'https://']) ? $gal2->image_url : Storage::url($gal2->image_url) }}" alt="{{ $gal2->title }}"/>
                @else
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC9bI42XoWlayh7kEKBq51M5DfgAaF-Uf-cgM-_VFKI6o4pO4CGdg2i5YzEi-CNHvKc4cpJrIwQJhanZP_zil7uKxnKmaHVqV0YGval1794h1ctM2_WKBFyM_FogTMIDcc_TFzDA6wHjcgNLeQFxNyJcfGI1I8mpLBj_HJKGQc_EIYozzAl9_JzOEKfzhJ7Pnud4Xud2jZWabsO_aqCjUDT3CVFloruMWKXuMLonpss7mxn9ESdNH-YU-TeZOFuYsk-EJUXBpiQQMsS" alt="Sanggar"/>
                @endif
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <a href="{{ route('gallery.index') }}" class="material-symbols-outlined text-white text-4xl">fullscreen</a>
                </div>
            </div>

            <!-- Small Article -->
            @php $secondArticle = $articles->skip(1)->first(); @endphp
            <div class="md:col-span-2 bg-surface-container p-6 md:p-8 rounded-xl border border-gold-subtle flex flex-col justify-between hover:bg-surface-container-high transition-colors">
                <div>
                    <div class="flex justify-between items-start mb-4">
                        <span class="text-primary font-label-md text-label-md">BERITA TERBARU</span>
                        <span class="text-on-surface-variant font-label-md text-[12px]">{{ $secondArticle ? $secondArticle->created_at->format('d M Y') : '12 Juli 2024' }}</span>
                    </div>
                    <h4 class="font-headline-md text-xl md:text-headline-md mb-3">
                        {{ $secondArticle->title ?? 'GSBK Candi Meraih Penghargaan Anugerah Kebudayaan 2024' }}
                    </h4>
                    <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2">
                        {{ $secondArticle ? Str::limit(strip_tags($secondArticle->content), 120) : 'Apresiasi tinggi bagi komunitas atas dedikasi tanpa henti dalam menjaga kelestarian seni karawitan di wilayah Klaten.' }}
                    </p>
                </div>
                <a class="mt-6 font-label-md text-label-md text-primary flex items-center gap-2" href="{{ $secondArticle ? route('articles.show', $secondArticle->slug) : route('articles.index') }}">Baca Artikel <span class="material-symbols-outlined">chevron_right</span></a>
            </div>
        </div>
    </div>
</section>

<!-- Kontak Section -->
<section class="py-32 bg-background" id="kontak">
    <div class="max-w-container-max mx-auto px-4 md:px-margin-desktop">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-20">
            <div>
                <h2 class="font-headline-lg text-3xl md:text-headline-lg mb-8">Terhubung Bersama Kami</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-12">Ingin bergabung, berkolaborasi, atau sekadar berkunjung? Sapa kami melalui form atau detail kontak di bawah ini.</p>
                <div class="space-y-8">
                    <div class="flex items-start gap-6">
                        <div class="w-12 h-12 rounded-full border border-primary flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-primary">mail</span>
                        </div>
                        <div>
                            <p class="font-label-md text-label-md text-primary mb-1 uppercase tracking-wider">Email</p>
                            <p class="font-body-lg text-body-lg">{{ $profile->email ?? 'halo@gsbkcandi.art' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-6">
                        <div class="w-12 h-12 rounded-full border border-primary flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-primary">phone</span>
                        </div>
                        <div>
                            <p class="font-label-md text-label-md text-primary mb-1 uppercase tracking-wider">Telepon / WA</p>
                            <p class="font-body-lg text-body-lg">{{ $profile->phone ?? '+62 812-3456-7890' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-6">
                        <div class="w-12 h-12 rounded-full border border-primary flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-primary">share</span>
                        </div>
                        <div>
                            <p class="font-label-md text-label-md text-primary mb-1 uppercase tracking-wider">Media Sosial</p>
                            <div class="flex gap-4 mt-2">
                                @php
                                    $igUser = ltrim($profile->instagram ?? 'gsbkcandi', '@');
                                    $igLink = Str::startsWith($igUser, ['http://', 'https://']) ? $igUser : 'https://www.instagram.com/' . $igUser;

                                    $fbUser = ltrim($profile->facebook ?? 'gsbkcandi', '@');
                                    $fbLink = Str::startsWith($fbUser, ['http://', 'https://']) ? $fbUser : 'https://www.facebook.com/' . $fbUser;

                                    $ttUser = ltrim($profile->tiktok ?? 'gsbkcandi', '@');
                                    $ttLink = Str::startsWith($ttUser, ['http://', 'https://']) ? $ttUser : 'https://www.tiktok.com/@' . $ttUser;
                                @endphp
                                <a class="text-on-surface-variant hover:text-primary transition-colors font-bold" href="{{ $igLink }}" target="_blank">Instagram</a>
                                <span class="text-outline">/</span>
                                <a class="text-on-surface-variant hover:text-primary transition-colors" href="{{ $fbLink }}" target="_blank">Facebook</a>
                                <span class="text-outline">/</span>
                                <a class="text-on-surface-variant hover:text-primary transition-colors" href="{{ $ttLink }}" target="_blank">TikTok</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-surface-container-low p-8 md:p-10 rounded-xl border border-gold-subtle shadow-2xl">
                <form class="space-y-8" action="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->phone ?? '081234567890') }}" method="GET" target="_blank">
                    <div class="group">
                        <label class="block font-label-md text-label-md text-on-surface-variant mb-2 group-focus-within:text-primary transition-colors">Nama Lengkap</label>
                        <input class="w-full bg-transparent border-0 border-b border-outline-variant focus:ring-0 focus:border-primary px-0 py-3 text-body-md transition-all text-white outline-none" placeholder="Tuliskan nama Anda..." type="text" name="name" required/>
                    </div>
                    <div class="group">
                        <label class="block font-label-md text-label-md text-on-surface-variant mb-2 group-focus-within:text-primary transition-colors">Email Aktif</label>
                        <input class="w-full bg-transparent border-0 border-b border-outline-variant focus:ring-0 focus:border-primary px-0 py-3 text-body-md transition-all text-white outline-none" placeholder="alamat@email.com" type="email" name="email"/>
                    </div>
                    <div class="group">
                        <label class="block font-label-md text-label-md text-on-surface-variant mb-2 group-focus-within:text-primary transition-colors">Pesan</label>
                        <textarea class="w-full bg-transparent border-0 border-b border-outline-variant focus:ring-0 focus:border-primary px-0 py-3 text-body-md transition-all resize-none text-white outline-none" placeholder="Apa yang ingin Anda sampaikan?" rows="4" name="text" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-primary text-on-primary py-5 font-label-md text-label-md rounded-lg hover:brightness-110 transition-all flex justify-center items-center gap-3">
                        Kirim Pesan <span class="material-symbols-outlined">send</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const observerOptions = {
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                }
            });
        }, observerOptions);

        document.querySelectorAll('section > div').forEach(el => {
            el.classList.add('transition-all', 'duration-1000', 'opacity-0', 'translate-y-10');
            observer.observe(el);
        });
    });
</script>
@endsection