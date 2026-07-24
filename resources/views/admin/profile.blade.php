@extends('layouts.admin')

@section('title', 'Kelola Profil & Konten Sanggar')
@section('header_title', 'Kelola Profil & Konten Sanggar')

@section('content')
<div class="admin-card-color border admin-border-color rounded-2xl p-6 md:p-8 shadow-sm">
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <!-- BAGIAN 1: IDENTITAS UTAMA & NAMA BRAND -->
        <div>
            <h3 class="font-headline-md text-2xl font-bold admin-accent-color mb-6 pb-3 border-b admin-border-color flex items-center gap-2">
                <span class="material-symbols-outlined text-2xl">account_balance</span> Identitas Utama Sanggar
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="name" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Nama Sanggar (Di Samping Logo)</label>
                    <input type="text" name="name" id="name" class="w-full" value="{{ old('name', $profile->name) }}" required placeholder="Contoh: GSBK Candi">
                </div>

                <div>
                    <label for="founded_year" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Tahun Berdiri Sanggar</label>
                    <input type="text" name="founded_year" id="founded_year" class="w-full" value="{{ old('founded_year', $profile->founded_year) }}" required placeholder="Contoh: 1998">
                </div>
            </div>
        </div>

        <!-- BAGIAN 2: KONTEN HERO BANNER UTAMA -->
        <div>
            <h3 class="font-headline-md text-2xl font-bold admin-accent-color mb-6 pb-3 border-b admin-border-color flex items-center gap-2">
                <span class="material-symbols-outlined text-2xl">view_headline</span> Konten Hero Banner (Halaman Utama)
            </h3>
            
            <div class="space-y-6">
                <div>
                    <label for="hero_title" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Judul Utama Hero (Mendukung Enter)</label>
                    <input type="text" name="hero_title" id="hero_title" class="w-full" value="{{ old('hero_title', $profile->hero_title) }}" required placeholder="Contoh: Melestarikan Budaya, Menginspirasi Generasi">
                </div>

                <div>
                    <label for="hero_subtitle" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Sub-Judul / Deskripsi Singkat Hero</label>
                    <textarea name="hero_subtitle" id="hero_subtitle" rows="3" class="w-full" required placeholder="Tuliskan deskripsi singkat banner utama...">{{ old('hero_subtitle', $profile->hero_subtitle) }}</textarea>
                </div>
            </div>
        </div>

        <!-- BAGIAN 3: SEJARAH & KUTIPAN KATA MUTIARA -->
        <div>
            <h3 class="font-headline-md text-2xl font-bold admin-accent-color mb-6 pb-3 border-b admin-border-color flex items-center gap-2">
                <span class="material-symbols-outlined text-2xl">history_edu</span> Konten Sejarah & Kutipan (*Quotes*)
            </h3>
            
            <div class="space-y-6">
                <div>
                    <label for="history" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Detail Sejarah Singkat (Menampilkan Info Lengkap)</label>
                    <textarea name="history" id="history" rows="5" class="w-full" required placeholder="Tuliskan detail sejarah berdirinya sanggar...">{{ old('history', $profile->history) }}</textarea>
                </div>

                <div>
                    <label for="quote_text" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Teks Kutipan / Kata Mutiara (*Quote* Tokoh)</label>
                    <textarea name="quote_text" id="quote_text" rows="2" class="w-full" required placeholder="Seni bukan sekadar tontonan, melainkan tuntunan hidup...">{{ old('quote_text', $profile->quote_text) }}</textarea>
                </div>

                <div>
                    <label for="sejarah_subtitle" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Deskripsi Tambahan Sejarah (Bawah Kutipan)</label>
                    <textarea name="sejarah_subtitle" id="sejarah_subtitle" rows="3" class="w-full" required placeholder="Tuliskan penjelasan tambahan sejarah...">{{ old('sejarah_subtitle', $profile->sejarah_subtitle) }}</textarea>
                </div>
            </div>
        </div>

        <!-- BAGIAN 4: VISI & MISI SANGGAR -->
        <div>
            <h3 class="font-headline-md text-2xl font-bold admin-accent-color mb-6 pb-3 border-b admin-border-color flex items-center gap-2">
                <span class="material-symbols-outlined text-2xl">flag</span> Visi & Misi Sanggar
            </h3>
            
            <div class="space-y-6">
                <div>
                    <label for="vision" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Visi Sanggar</label>
                    <textarea name="vision" id="vision" rows="3" class="w-full" required placeholder="Tuliskan visi luhur sanggar...">{{ old('vision', $profile->vision) }}</textarea>
                </div>

                <div>
                    <label for="mission" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Misi Sanggar (Pisahkan dengan baris baru)</label>
                    <textarea name="mission" id="mission" rows="4" class="w-full" required placeholder="Tuliskan misi-misi sanggar...">{{ old('mission', $profile->mission) }}</textarea>
                </div>
            </div>
        </div>

        <!-- BAGIAN 5: KONTAK RESMI & ALAMAT -->
        <div>
            <h3 class="font-headline-md text-2xl font-bold admin-accent-color mb-6 pb-3 border-b admin-border-color flex items-center gap-2">
                <span class="material-symbols-outlined text-2xl">call</span> Kontak & Informasi Resmi
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="phone" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">No. Telepon / WhatsApp</label>
                    <input type="text" name="phone" id="phone" class="w-full" value="{{ old('phone', $profile->phone) }}" placeholder="Contoh: 081234567890">
                </div>

                <div>
                    <label for="email" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Alamat Email Resmi</label>
                    <input type="email" name="email" id="email" class="w-full" value="{{ old('email', $profile->email) }}" placeholder="contoh: halo@gsbkcandi.art">
                </div>
            </div>

            <div class="mt-6">
                <label for="address" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Alamat Lengkap Fisik Sanggar</label>
                <input type="text" name="address" id="address" class="w-full" value="{{ old('address', $profile->address) }}" placeholder="Tulis alamat sanggar...">
            </div>
        </div>

        <!-- BAGIAN 6: SOSIAL MEDIA (USERNAME RESMI) -->
        <div>
            <h3 class="font-headline-md text-2xl font-bold admin-accent-color mb-6 pb-3 border-b admin-border-color flex items-center gap-2">
                <span class="material-symbols-outlined text-2xl">share</span> Media Sosial (Username Saja)
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="instagram" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Username Instagram (Tanpa @)</label>
                    <input type="text" name="instagram" id="instagram" class="w-full" value="{{ old('instagram', $profile->instagram) }}" placeholder="Contoh: gsbkcandi">
                </div>

                <div>
                    <label for="facebook" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Username Facebook (Tanpa @)</label>
                    <input type="text" name="facebook" id="facebook" class="w-full" value="{{ old('facebook', $profile->facebook) }}" placeholder="Contoh: gsbkcandi">
                </div>

                <div>
                    <label for="tiktok" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Username TikTok (Tanpa @)</label>
                    <input type="text" name="tiktok" id="tiktok" class="w-full" value="{{ old('tiktok', $profile->tiktok) }}" placeholder="Contoh: gsbkcandi">
                </div>
            </div>
        </div>

        <!-- BAGIAN 7: UPLOAD LOGO SANGGAR -->
        <div>
            <h3 class="font-headline-md text-2xl font-bold admin-accent-color mb-6 pb-3 border-b admin-border-color flex items-center gap-2">
                <span class="material-symbols-outlined text-2xl">image</span> Logo Sanggar
            </h3>
            
            <div class="flex items-center gap-6 admin-card-alt-color p-4 rounded-xl border admin-border-color">
                @if($profile->logo_url)
                    <img src="{{ Str::startsWith($profile->logo_url, ['http://', 'https://']) ? $profile->logo_url : Storage::url($profile->logo_url) }}" alt="Logo Current" class="w-16 h-16 rounded-full object-cover border border-[#b8860b]">
                @endif
                <input type="file" name="logo" id="logo" class="text-sm admin-muted-color file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#b8860b] dark:file:bg-[#f2ca50] file:text-white dark:file:text-[#3c2f00] hover:file:opacity-90">
            </div>
        </div>

        <button type="submit" class="bg-[#b8860b] dark:bg-[#f2ca50] text-white dark:text-[#3c2f00] px-8 py-3.5 rounded-xl font-bold text-sm hover:opacity-95 transition-all shadow-sm inline-flex items-center gap-2">
            <span class="material-symbols-outlined text-lg">save</span> Simpan Perubahan Profil & Konten
        </button>
    </form>
</div>
@endsection