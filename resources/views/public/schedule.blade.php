@extends('layouts.app')

@section('title', 'Jadwal Latihan')

@section('content')
    <section class="container" style="margin-top: 60px; margin-bottom: 80px;">
        <div class="section-header">
            <span class="section-tag">{{ __('Kegiatan Belajar') }}</span>
            <h2>{{ __('Jadwal Kelas & Latihan') }}</h2>
            <p class="section-desc">{{ __('Informasi hari, jam, dan kelas tari tradisional yang dibuka. Silakan hubungi kontak kami jika ingin mendaftar kelas baru.') }}</p>
        </div>

        <div style="max-width: 900px; margin: 0 auto;">
            @if($schedules->isEmpty())
                <div style="text-align: center; padding: 60px; background: var(--white); border-radius: var(--radius); color: var(--text-muted); border: 1px solid var(--border);">
                    <p style="font-size: 1.1rem; margin-bottom: 16px;">{{ __('Belum ada jadwal latihan tari yang dirilis saat ini.') }}</p>
                    <a href="{{ route('home') }}" class="btn btn-primary btn-sm">{{ __('Kembali ke Beranda') }}</a>
                </div>
            @else
                <div class="schedule-table-wrapper">
                    <table class="schedule-table">
                        <thead>
                            <tr>
                                <th>{{ __('Hari') }}</th>
                                <th>{{ __('Nama Kelas Tari') }}</th>
                                <th>{{ __('Jam Latihan') }}</th>
                                <th>{{ __('Instruktur / Pelatih') }}</th>
                                <th>{{ __('Deskripsi') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedules as $schedule)
                                <tr>
                                    <td>
                                        <span class="day-badge">{{ __($schedule->day) }}</span>
                                    </td>
                                    <td style="font-weight: 700; color: var(--primary);">
                                        {{ $schedule->class_name }}
                                    </td>
                                    <td style="font-weight: 600;">
                                        {{ $schedule->time }}
                                    </td>
                                    <td>
                                        {{ $schedule->instructor ?? __('Pelatih Sanggar') }}
                                    </td>
                                    <td style="color: var(--text-muted); font-size: 0.9rem;">
                                        {{ $schedule->description ?? '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Info tambahan pendaftaran -->
                <div style="margin-top: 40px; background: var(--primary-light); border: 1px solid var(--border); padding: 30px; border-radius: var(--radius); text-align: center; border-left: 5px solid var(--primary);">
                    <h4 style="color: var(--primary); margin-bottom: 12px; font-family: var(--font-body); font-weight: 700;">{{ __('Cara Mendaftar Kelas Tari') }}</h4>
                    <p style="color: var(--text-dark); margin-bottom: 20px; max-width: 700px; margin-left: auto; margin-right: auto; line-height: 1.7;">
                        {{ __('Bagi warga sekitar, anak-anak, remaja, maupun dewasa yang tertarik bergabung mempelajari tari Jawa, Bali, dan tari Nusantara lainnya, silakan hubungi kami untuk informasi administrasi dan pendaftaran.') }}
                    </p>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->phone ?? '081234567890') }}" target="_blank" class="btn btn-primary btn-sm">
                        💬 {{ __('Hubungi WhatsApp:') }} {{ $profile->phone ?? '0812-3456-7890' }}
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection
