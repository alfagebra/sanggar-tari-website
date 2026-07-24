@extends('layouts.admin')

@section('title', 'Kelola Profil Sanggar')
@section('header_title', 'Kelola Profil Sanggar')

@section('content')
<div class="admin-card-color border admin-border-color rounded-2xl p-6 md:p-8 shadow-sm">
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <div>
            <h3 class="font-headline-md text-2xl font-bold admin-accent-color mb-6 pb-3 border-b admin-border-color flex items-center gap-2">
                <span class="material-symbols-outlined text-2xl">history_edu</span> Konten Profil & Sejarah
            </h3>
            
            <div class="space-y-6">
                <!-- SANGGAR BRAND NAME (Nama Sanggar di samping logo) -->
                <div>
                    <label for="name" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Nama Sanggar (Di Samping Logo)</label>
                    <input type="text" name="name" id="name" class="w-full admin-card-alt-color border admin-border-color rounded-xl px-4 py-3.5 text-sm admin-text-color focus:outline-none focus:border-[#b8860b] transition-all" value="{{ old('name', $profile->name) }}" required placeholder="Contoh: GSBK Candi">
                </div>

                <div>
                    <label for="history" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Sejarah Singkat Sanggar</label>
                    <textarea name="history" id="history" rows="5" class="w-full admin-card-alt-color border admin-border-color rounded-xl p-4 text-sm admin-text-color focus:outline-none focus:border-[#b8860b] transition-all" required>{{ old('history', $profile->history) }}</textarea>
                </div>

                <div>
                    <label for="vision" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Visi Sanggar</label>
                    <textarea name="vision" id="vision" rows="3" class="w-full admin-card-alt-color border admin-border-color rounded-xl p-4 text-sm admin-text-color focus:outline-none focus:border-[#b8860b] transition-all" required>{{ old('vision', $profile->vision) }}</textarea>
                </div>

                <div>
                    <label for="mission" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Misi Sanggar (Pisahkan per baris)</label>
                    <textarea name="mission" id="mission" rows="4" class="w-full admin-card-alt-color border admin-border-color rounded-xl p-4 text-sm admin-text-color focus:outline-none focus:border-[#b8860b] transition-all" required>{{ old('mission', $profile->mission) }}</textarea>
                </div>
            </div>
        </div>

        <div>
            <h3 class="font-headline-md text-2xl font-bold admin-accent-color mb-6 pb-3 border-b admin-border-color flex items-center gap-2">
                <span class="material-symbols-outlined text-2xl">call</span> Kontak & Informasi Resmi
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="phone" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">No. Telepon / WhatsApp</label>
                    <input type="text" name="phone" id="phone" class="w-full admin-card-alt-color border admin-border-color rounded-xl px-4 py-3.5 text-sm admin-text-color focus:outline-none focus:border-[#b8860b] transition-all" value="{{ old('phone', $profile->phone) }}">
                </div>

                <div>
                    <label for="email" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Alamat Email Resmi</label>
                    <input type="email" name="email" id="email" class="w-full admin-card-alt-color border admin-border-color rounded-xl px-4 py-3.5 text-sm admin-text-color focus:outline-none focus:border-[#b8860b] transition-all" value="{{ old('email', $profile->email) }}">
                </div>
            </div>

            <div class="mt-6">
                <label for="address" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Alamat Lengkap Fisik</label>
                <input type="text" name="address" id="address" class="w-full admin-card-alt-color border admin-border-color rounded-xl px-4 py-3.5 text-sm admin-text-color focus:outline-none focus:border-[#b8860b] transition-all" value="{{ old('address', $profile->address) }}">
            </div>
        </div>

        <div>
            <h3 class="font-headline-md text-2xl font-bold admin-accent-color mb-6 pb-3 border-b admin-border-color flex items-center gap-2">
                <span class="material-symbols-outlined text-2xl">share</span> Media Sosial (Username Saja)
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="instagram" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Instagram</label>
                    <input type="text" name="instagram" id="instagram" class="w-full admin-card-alt-color border admin-border-color rounded-xl px-4 py-3.5 text-sm admin-text-color focus:outline-none focus:border-[#b8860b] transition-all" value="{{ old('instagram', $profile->instagram) }}">
                </div>

                <div>
                    <label for="facebook" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Facebook</label>
                    <input type="text" name="facebook" id="facebook" class="w-full admin-card-alt-color border admin-border-color rounded-xl px-4 py-3.5 text-sm admin-text-color focus:outline-none focus:border-[#b8860b] transition-all" value="{{ old('facebook', $profile->facebook) }}">
                </div>

                <div>
                    <label for="tiktok" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">TikTok</label>
                    <input type="text" name="tiktok" id="tiktok" class="w-full admin-card-alt-color border admin-border-color rounded-xl px-4 py-3.5 text-sm admin-text-color focus:outline-none focus:border-[#b8860b] transition-all" value="{{ old('tiktok', $profile->tiktok) }}">
                </div>
            </div>
        </div>

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
            <span class="material-symbols-outlined text-lg">save</span> Simpan Perubahan Profil
        </button>
    </form>
</div>
@endsection