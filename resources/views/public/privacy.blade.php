@extends('layouts.app')

@section('title', 'Kebijakan Privasi')

@section('content')
<section class="py-24 pt-36 md:pt-44 bg-background min-h-screen">
    <div class="max-w-container-max mx-auto px-4 md:px-margin-desktop">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-primary font-label-md text-label-md tracking-widest uppercase mb-2 block font-bold">Privasi Pengguna</span>
            <h1 class="font-headline-lg text-3xl md:text-5xl mb-6 font-black leading-tight text-on-background">Kebijakan Privasi</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">Bagaimana kami mengelola, menyimpan, dan melindungi informasi pribadi serta cookie penjelajahan Anda.</p>
        </div>

        <div class="max-w-3xl mx-auto bg-surface-container-low border border-gold-subtle rounded-2xl p-8 md:p-12 shadow-md space-y-8 leading-relaxed text-on-surface-variant">
            <div>
                <h3 class="font-headline-md text-xl md:text-2xl font-bold text-primary mb-4">1. Pengumpulan Informasi</h3>
                <p class="font-body-md text-body-md">
                    Kami mengumpulkan informasi pribadi yang Anda berikan secara sukarela saat mengisi Formulir Kontak Hubungi Kami, seperti Nama Lengkap dan Alamat Email Anda. Data tersebut hanya digunakan untuk merespons pertanyaan atau permohonan kolaborasi pentas Anda.
                </p>
            </div>

            <div>
                <h3 class="font-headline-md text-xl md:text-2xl font-bold text-primary mb-4">2. Penggunaan Cookie (*Cookie Policy*)</h3>
                <p class="font-body-md text-body-md">
                    Website kami menggunakan **cookie** dan **localStorage** untuk menyimpan preferensi navigasi Anda, seperti pilihan tema (Light Cream vs Dark Obsidian). Cookie ini bersifat internal untuk kenyamanan penjelajahan Anda dan tidak melacak informasi sensitif di luar situs kami.
                </p>
            </div>

            <div>
                <h3 class="font-headline-md text-xl md:text-2xl font-bold text-primary mb-4">3. Keamanan Data</h3>
                <p class="font-body-md text-body-md">
                    Keamanan data pribadi Anda sangat penting bagi kami. Kami tidak pernah menjual, menyewakan, atau memberikan data kontak Anda kepada pihak ketiga manapun untuk tujuan pemasaran komersial.
                </p>
            </div>

            <div>
                <h3 class="font-headline-md text-xl md:text-2xl font-bold text-primary mb-4">4. Hak Pengguna</h3>
                <p class="font-body-md text-body-md">
                    Anda memiliki hak penuh untuk meminta penghapusan informasi kontak Anda yang pernah Anda kirimkan melalui form WhatsApp/Email resmi kami dengan menghubungi pengelola secara langsung.
                </p>
            </div>
            
            <div class="pt-6 border-t border-gold-subtle text-xs text-on-surface-variant/70">
                Terakhir diperbarui: 27 Juli 2026.
            </div>
        </div>
    </div>
</section>
@endsection