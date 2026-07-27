@extends('layouts.app')

@section('title', 'Syarat & Ketentuan')

@section('content')
<section class="py-24 pt-36 md:pt-44 bg-background min-h-screen">
    <div class="max-w-container-max mx-auto px-4 md:px-margin-desktop">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-primary font-label-md text-label-md tracking-widest uppercase mb-2 block font-bold">Informasi Hukum</span>
            <h1 class="font-headline-lg text-3xl md:text-5xl mb-6 font-black leading-tight text-on-background">Syarat & Ketentuan Penggunaan</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">Ketentuan dan tata cara penggunaan layanan serta keanggotaan Sanggar Seni GSBK Candi.</p>
        </div>

        <div class="max-w-3xl mx-auto bg-surface-container-low border border-gold-subtle rounded-2xl p-8 md:p-12 shadow-md space-y-8 leading-relaxed text-on-surface-variant">
            <div>
                <h3 class="font-headline-md text-xl md:text-2xl font-bold text-primary mb-4">1. Ketentuan Umum</h3>
                <p class="font-body-md text-body-md">
                    Dengan mengakses website resmi {{ $profile->name ?? 'Gubug Seni Begog Kiyatdiharjan' }}, Anda menyatakan setuju untuk terikat dan tunduk pada seluruh syarat, ketentuan, serta kebijakan yang berlaku di lingkungan sanggar kami.
                </p>
            </div>

            <div>
                <h3 class="font-headline-md text-xl md:text-2xl font-bold text-primary mb-4">2. Kegiatan Latihan</h3>
                <p class="font-body-md text-body-md">
                    Kegiatan latihan tari dan karawitan di Gubug Seni Begog Kiyatdiharjan bersifat sosial, kebudayaan, dan non-komersial. Ditujukan untuk melestarikan tradisi di kalangan anak-anak desa setempat secara sukarela tanpa dipungut biaya belajar (gratis).
                </p>
            </div>

            <div>
                <h3 class="font-headline-md text-xl md:text-2xl font-bold text-primary mb-4">3. Hak Cipta & Hak Milik Intelektual</h3>
                <p class="font-body-md text-body-md">
                    Seluruh dokumentasi visual, foto pentas, karya seni, logo sanggar, serta teks kebudayaan yang diterbitkan di website ini merupakan hak kekayaan intelektual milik {{ $profile->name ?? 'Gubug Seni Begog Kiyatdiharjan' }} dan dilindungi undang-undang. Dilarang mendistribusikan ulang atau menyalahgunakan konten tanpa izin tertulis dari pengelola.
                </p>
            </div>

            <div>
                <h3 class="font-headline-md text-xl md:text-2xl font-bold text-primary mb-4">4. Batasan Tanggung Jawab</h3>
                <p class="font-body-md text-body-md">
                    Kami berusaha menyajikan jadwal latihan dan rilis artikel seakurat mungkin. Namun, perubahan mendadak jadwal latihan karena agenda pementasan kebudayaan di luar sanggar dapat terjadi sewaktu-waktu dan akan diinformasikan segera melalui WhatsApp resmi pengajar.
                </p>
            </div>
            
            <div class="pt-6 border-t border-gold-subtle text-xs text-on-surface-variant/70">
                Terakhir diperbarui: 27 Juli 2026.
            </div>
        </div>
    </div>
</section>
@endsection