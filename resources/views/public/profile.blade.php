@extends('layouts.app')

@section('title', 'Profil & Sejarah')

@section('content')
    <section class="container" style="margin-top: 60px; margin-bottom: 80px;">
        <div class="section-header">
            <span class="section-tag">{{ __('Kenali Kami') }}</span>
            <h2>{{ __('Profil & Sejarah Sanggar') }}</h2>
            <p class="section-desc">{{ __('Mengenal lebih dalam asal-usul, visi-misi, dan cita-cita luhur pendirian sanggar seni tari kami.') }}</p>
        </div>

        <div style="max-width: 900px; margin: 0 auto;">
            <!-- Sejarah -->
            <div class="profile-section-item">
                <h3>📜 {{ __('Sejarah Singkat') }}</h3>
                <div style="line-height: 1.8; color: var(--text-dark); font-size: 1.05rem;">
                    @if($profile && $profile->history)
                        {!! nl2br(e($profile->history)) !!}
                    @else
                        <p>{{ __('Sejarah sanggar belum diisi oleh administrator.') }}</p>
                    @endif
                </div>
            </div>

            <!-- Visi & Misi -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px; margin-top: 30px;">
                <div class="profile-section-item" style="margin-bottom: 0;">
                    <h3>🎯 {{ __('Visi Sanggar') }}</h3>
                    <p style="font-size: 1.05rem; line-height: 1.8;">
                        @if($profile && $profile->vision)
                            {{ $profile->vision }}
                        @else
                            {{ __('Visi sanggar belum diisi.') }}
                        @endif
                    </p>
                </div>
                
                <div class="profile-section-item" style="margin-bottom: 0;">
                    <h3>🚀 {{ __('Misi Sanggar') }}</h3>
                    <div style="font-size: 1.05rem; line-height: 1.8;">
                        @if($profile && $profile->mission)
                            {!! nl2br(e($profile->mission)) !!}
                        @else
                            {{ __('Misi sanggar belum diisi.') }}
                        @endif
                    </div>
                </div>
            </div>

            <!-- Informasi Kontak & Sosial Media -->
            <div class="profile-section-item" style="margin-top: 30px; text-align: center; border-left: none; border-top: 5px solid var(--secondary);">
                <h3>📞 {{ __('Hubungi Kami') }}</h3>
                <p style="margin-bottom: 24px; color: var(--text-muted);">{{ __('Silakan datang langsung ke sanggar kami atau hubungi kami melalui media sosial di bawah ini.') }}</p>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; text-align: left; margin-bottom: 24px;">
                    <div style="background: var(--light); padding: 16px; border-radius: var(--radius); border: 1px solid var(--border);">
                        <strong>📍 {{ __('Alamat Sanggar:') }}</strong>
                        <p style="margin-top: 8px; font-size: 0.95rem;">{{ $profile->address ?? __('Alamat belum diisi') }}</p>
                    </div>
                    <div style="background: var(--light); padding: 16px; border-radius: var(--radius); border: 1px solid var(--border);">
                        <strong>📞 {{ __('No. Telepon/WhatsApp:') }}</strong>
                        <p style="margin-top: 8px; font-size: 0.95rem;">{{ $profile->phone ?? __('Belum diisi') }}</p>
                    </div>
                    <div style="background: var(--light); padding: 16px; border-radius: var(--radius); border: 1px solid var(--border);">
                        <strong>✉️ {{ __('Email Resmi:') }}</strong>
                        <p style="margin-top: 8px; font-size: 0.95rem;">{{ $profile->email ?? __('Belum diisi') }}</p>
                    </div>
                </div>

                <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
                    @if($profile && $profile->instagram)
                        <a href="https://instagram.com/{{ $profile->instagram }}" target="_blank" class="btn btn-secondary btn-sm">
                            📸 Instagram: @{{ $profile->instagram }}
                        </a>
                    @endif
                    @if($profile && $profile->facebook)
                        <a href="https://facebook.com/{{ $profile->facebook }}" target="_blank" class="btn btn-primary btn-sm" style="background: #3b5998;">
                            👥 Facebook: {{ $profile->facebook }}
                        </a>
                    @endif
                    @if($profile && $profile->tiktok)
                        <a href="https://tiktok.com/@{{ $profile->tiktok }}" target="_blank" class="btn btn-primary btn-sm" style="background: #000000; color: #fff;">
                            🎵 TikTok: @{{ $profile->tiktok }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
