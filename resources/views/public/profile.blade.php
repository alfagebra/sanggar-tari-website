@extends('layouts.app')

@section('title', 'Profil & Sejarah')

@section('content')
<section class="py-24 pt-32 bg-background min-h-screen">
    <div class="max-w-container-max mx-auto px-4 md:px-margin-desktop">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-primary font-label-md text-label-md tracking-widest uppercase mb-2 block">Kenali Kami</span>
            <h1 class="font-headline-lg text-3xl md:text-5xl text-glow mb-6">Profil & Sejarah Sanggar</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant">Mengenal lebih dalam asal-usul, visi-misi, dan cita-cita luhur pendirian sanggar seni tari kami.</p>
        </div>

        <div class="max-w-4xl mx-auto space-y-12">
            <!-- Sejarah Card -->
            <div class="bg-surface-container-low border border-gold-subtle rounded-xl p-8 md:p-12 shadow-2xl relative overflow-hidden">
                <div class="flex items-center gap-3 mb-6">
                    <span class="material-symbols-outlined text-primary text-3xl">history_edu</span>
                    <h2 class="font-headline-md text-2xl md:text-3xl text-primary font-bold">Sejarah Singkat</h2>
                </div>
                <div class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed space-y-4">
                    @if($profile && $profile->history)
                        {!! nl2br(e($profile->history)) !!}
                    @else
                        <p>Sanggar Seni Begog Kiyatdiharjan didirikan sebagai ruang lestarinya seni tari dan gamelan tradisional Jawa di kawasan bersejarah Candi Mlese.</p>
                    @endif
                </div>
            </div>

            <!-- Visi & Misi Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-surface-container-low border border-gold-subtle rounded-xl p-8 shadow-xl">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="material-symbols-outlined text-primary text-2xl">visibility</span>
                        <h3 class="font-headline-md text-xl font-bold text-primary">Visi Sanggar</h3>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        @if($profile && $profile->vision)
                            {{ $profile->vision }}
                        @else
                            Menjadi pusat pelestarian dan pengembangan seni budaya tradisional Jawa yang unggul, berkarakter, dan menginspirasi generasi muda.
                        @endif
                    </p>
                </div>

                <div class="bg-surface-container-low border border-gold-subtle rounded-xl p-8 shadow-xl">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="material-symbols-outlined text-primary text-2xl">flag</span>
                        <h3 class="font-headline-md text-xl font-bold text-primary">Misi Sanggar</h3>
                    </div>
                    <div class="font-body-md text-body-md text-on-surface-variant leading-relaxed space-y-2">
                        @if($profile && $profile->mission)
                            {!! nl2br(e($profile->mission)) !!}
                        @else
                            <ul class="list-disc list-inside space-y-1">
                                <li>Mendidik generasi muda dalam seni tari tradisional.</li>
                                <li>Melestarikan gamelan dan karawitan Jawa.</li>
                                <li>Menyelenggarakan pentas seni berkala.</li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Informasi Kontak Card -->
            <div class="bg-surface-container-low border border-gold-subtle rounded-xl p-8 md:p-10 shadow-2xl text-center">
                <h3 class="font-headline-md text-2xl font-bold text-primary mb-3">Hubungi Sanggar Kami</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-8 max-w-xl mx-auto">Silakan datang langsung ke sanggar kami atau hubungi kami melalui media sosial di bawah ini.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left mb-8">
                    <div class="bg-surface-container p-6 rounded-lg border border-gold-subtle">
                        <span class="text-xs uppercase font-bold text-primary tracking-wider block mb-1">Alamat Sanggar</span>
                        <p class="text-sm text-on-surface">{{ $profile->address ?? 'Gantiwarno, Klaten, Jawa Tengah' }}</p>
                    </div>
                    <div class="bg-surface-container p-6 rounded-lg border border-gold-subtle">
                        <span class="text-xs uppercase font-bold text-primary tracking-wider block mb-1">Telepon / WA</span>
                        <p class="text-sm text-on-surface">{{ $profile->phone ?? '+62 812-3456-7890' }}</p>
                    </div>
                    <div class="bg-surface-container p-6 rounded-lg border border-gold-subtle">
                        <span class="text-xs uppercase font-bold text-primary tracking-wider block mb-1">Email Resmi</span>
                        <p class="text-sm text-on-surface">{{ $profile->email ?? 'halo@gsbkcandi.art' }}</p>
                    </div>
                </div>

                <div class="flex justify-center gap-4 flex-wrap">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->phone ?? '081234567890') }}" target="_blank" class="bg-emerald-600 text-white px-8 py-3 rounded-lg font-bold text-sm hover:bg-emerald-500 transition-all inline-flex items-center gap-2">
                        Hubungi WhatsApp
                    </a>
                    @php
                        $instagramUrl = 'https://www.instagram.com/gsbkcandi/?utm_source=ig_web_button_share_sheet';
                        if(!empty($profile->instagram) && Str::startsWith($profile->instagram, ['http://', 'https://'])) {
                            $instagramUrl = $profile->instagram;
                        }
                    @endphp
                    <a href="{{ $instagramUrl }}" target="_blank" class="border border-primary text-primary px-8 py-3 rounded-lg font-bold text-sm hover:bg-primary/10 transition-all inline-flex items-center gap-2">
                        Instagram: @gsbkcandi
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection