@extends('layouts.admin')

@section('title', 'Kelola Profil Sanggar')
@section('header_title', 'Kelola Profil Sanggar')

@section('content')
<div class="bg-surface-container-low border border-gold-subtle rounded-xl p-6 md:p-8">
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <div>
            <h3 class="font-headline-md text-xl font-bold text-primary mb-4 pb-2 border-b border-outline-variant/20 flex items-center gap-2">
                <span class="material-symbols-outlined">history_edu</span> Konten Profil & Sejarah
            </h3>
            
            <div class="space-y-6">
                <div>
                    <label for="history" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Sejarah Singkat Sanggar</label>
                    <textarea name="history" id="history" rows="5" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg p-4 text-sm text-white focus:outline-none focus:border-primary transition-all" required>{{ old('history', $profile->history) }}</textarea>
                </div>

                <div>
                    <label for="vision" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Visi Sanggar</label>
                    <textarea name="vision" id="vision" rows="3" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg p-4 text-sm text-white focus:outline-none focus:border-primary transition-all" required>{{ old('vision', $profile->vision) }}</textarea>
                </div>

                <div>
                    <label for="mission" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Misi Sanggar (Pisahkan per baris)</label>
                    <textarea name="mission" id="mission" rows="4" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg p-4 text-sm text-white focus:outline-none focus:border-primary transition-all" required>{{ old('mission', $profile->mission) }}</textarea>
                </div>
            </div>
        </div>

        <div>
            <h3 class="font-headline-md text-xl font-bold text-primary mb-4 pb-2 border-b border-outline-variant/20 flex items-center gap-2">
                <span class="material-symbols-outlined">call</span> Kontak & Informasi Resmi
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="phone" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">No. Telepon / WhatsApp</label>
                    <input type="text" name="phone" id="phone" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-primary transition-all" value="{{ old('phone', $profile->phone) }}">
                </div>

                <div>
                    <label for="email" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Alamat Email Resmi</label>
                    <input type="email" name="email" id="email" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-primary transition-all" value="{{ old('email', $profile->email) }}">
                </div>
            </div>

            <div class="mt-6">
                <label for="address" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Alamat Lengkap Fisik</label>
                <input type="text" name="address" id="address" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-primary transition-all" value="{{ old('address', $profile->address) }}">
            </div>
        </div>

        <div>
            <h3 class="font-headline-md text-xl font-bold text-primary mb-4 pb-2 border-b border-outline-variant/20 flex items-center gap-2">
                <span class="material-symbols-outlined">share</span> Media Sosial (Username Saja)
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="instagram" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Instagram</label>
                    <input type="text" name="instagram" id="instagram" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-primary transition-all" value="{{ old('instagram', $profile->instagram) }}">
                </div>

                <div>
                    <label for="facebook" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Facebook</label>
                    <input type="text" name="facebook" id="facebook" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-primary transition-all" value="{{ old('facebook', $profile->facebook) }}">
                </div>

                <div>
                    <label for="tiktok" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">TikTok</label>
                    <input type="text" name="tiktok" id="tiktok" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-primary transition-all" value="{{ old('tiktok', $profile->tiktok) }}">
                </div>
            </div>
        </div>

        <div>
            <h3 class="font-headline-md text-xl font-bold text-primary mb-4 pb-2 border-b border-outline-variant/20 flex items-center gap-2">
                <span class="material-symbols-outlined">image</span> Logo Sanggar
            </h3>
            
            <div class="flex items-center gap-6">
                @if($profile->logo_url)
                    <img src="{{ Str::startsWith($profile->logo_url, ['http://', 'https://']) ? $profile->logo_url : Storage::url($profile->logo_url) }}" alt="Logo Current" class="w-20 h-20 rounded-full object-cover border border-primary">
                @endif
                <input type="file" name="logo" id="logo" class="text-sm text-on-surface-variant file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-primary file:text-on-primary hover:file:brightness-110">
            </div>
        </div>

        <button type="submit" class="bg-primary text-on-primary px-8 py-4 rounded-lg font-bold text-sm hover:brightness-110 transition-all shadow-lg inline-flex items-center gap-2">
            <span class="material-symbols-outlined">save</span> Simpan Perubahan Profil
        </button>
    </form>
</div>
@endsection