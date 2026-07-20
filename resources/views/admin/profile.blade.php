@extends('layouts.admin')

@section('title', 'Kelola Profil Sanggar')
@section('header_title', 'Kelola Profil Sanggar')

@section('content')
<div class="bg-[#1e1c18] border-2 border-[#d4af37] rounded-2xl p-6 md:p-8 shadow-2xl">
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <div>
            <h3 class="font-headline-md text-2xl font-black text-[#f2ca50] mb-6 pb-3 border-b-2 border-[#d4af37]/30 flex items-center gap-3">
                <span class="material-symbols-outlined text-3xl">history_edu</span> Konten Profil & Sejarah
            </h3>
            
            <div class="space-y-6">
                <div>
                    <label for="history" class="block text-xs font-black uppercase text-[#f2ca50] mb-2 tracking-wider">Sejarah Singkat Sanggar</label>
                    <textarea name="history" id="history" rows="5" class="w-full bg-[#2a261f] border-2 border-[#d4af37]/40 rounded-xl p-4 text-sm text-white focus:outline-none focus:border-[#f2ca50] transition-all" required>{{ old('history', $profile->history) }}</textarea>
                </div>

                <div>
                    <label for="vision" class="block text-xs font-black uppercase text-[#f2ca50] mb-2 tracking-wider">Visi Sanggar</label>
                    <textarea name="vision" id="vision" rows="3" class="w-full bg-[#2a261f] border-2 border-[#d4af37]/40 rounded-xl p-4 text-sm text-white focus:outline-none focus:border-[#f2ca50] transition-all" required>{{ old('vision', $profile->vision) }}</textarea>
                </div>

                <div>
                    <label for="mission" class="block text-xs font-black uppercase text-[#f2ca50] mb-2 tracking-wider">Misi Sanggar (Pisahkan per baris)</label>
                    <textarea name="mission" id="mission" rows="4" class="w-full bg-[#2a261f] border-2 border-[#d4af37]/40 rounded-xl p-4 text-sm text-white focus:outline-none focus:border-[#f2ca50] transition-all" required>{{ old('mission', $profile->mission) }}</textarea>
                </div>
            </div>
        </div>

        <div>
            <h3 class="font-headline-md text-2xl font-black text-[#f2ca50] mb-6 pb-3 border-b-2 border-[#d4af37]/30 flex items-center gap-3">
                <span class="material-symbols-outlined text-3xl">call</span> Kontak & Informasi Resmi
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="phone" class="block text-xs font-black uppercase text-[#f2ca50] mb-2 tracking-wider">No. Telepon / WhatsApp</label>
                    <input type="text" name="phone" id="phone" class="w-full bg-[#2a261f] border-2 border-[#d4af37]/40 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none focus:border-[#f2ca50] transition-all" value="{{ old('phone', $profile->phone) }}">
                </div>

                <div>
                    <label for="email" class="block text-xs font-black uppercase text-[#f2ca50] mb-2 tracking-wider">Alamat Email Resmi</label>
                    <input type="email" name="email" id="email" class="w-full bg-[#2a261f] border-2 border-[#d4af37]/40 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none focus:border-[#f2ca50] transition-all" value="{{ old('email', $profile->email) }}">
                </div>
            </div>

            <div class="mt-6">
                <label for="address" class="block text-xs font-black uppercase text-[#f2ca50] mb-2 tracking-wider">Alamat Lengkap Fisik</label>
                <input type="text" name="address" id="address" class="w-full bg-[#2a261f] border-2 border-[#d4af37]/40 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none focus:border-[#f2ca50] transition-all" value="{{ old('address', $profile->address) }}">
            </div>
        </div>

        <div>
            <h3 class="font-headline-md text-2xl font-black text-[#f2ca50] mb-6 pb-3 border-b-2 border-[#d4af37]/30 flex items-center gap-3">
                <span class="material-symbols-outlined text-3xl">share</span> Media Sosial (Username Saja)
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="instagram" class="block text-xs font-black uppercase text-[#f2ca50] mb-2 tracking-wider">Instagram</label>
                    <input type="text" name="instagram" id="instagram" class="w-full bg-[#2a261f] border-2 border-[#d4af37]/40 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none focus:border-[#f2ca50] transition-all" value="{{ old('instagram', $profile->instagram) }}">
                </div>

                <div>
                    <label for="facebook" class="block text-xs font-black uppercase text-[#f2ca50] mb-2 tracking-wider">Facebook</label>
                    <input type="text" name="facebook" id="facebook" class="w-full bg-[#2a261f] border-2 border-[#d4af37]/40 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none focus:border-[#f2ca50] transition-all" value="{{ old('facebook', $profile->facebook) }}">
                </div>

                <div>
                    <label for="tiktok" class="block text-xs font-black uppercase text-[#f2ca50] mb-2 tracking-wider">TikTok</label>
                    <input type="text" name="tiktok" id="tiktok" class="w-full bg-[#2a261f] border-2 border-[#d4af37]/40 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none focus:border-[#f2ca50] transition-all" value="{{ old('tiktok', $profile->tiktok) }}">
                </div>
            </div>
        </div>

        <div>
            <h3 class="font-headline-md text-2xl font-black text-[#f2ca50] mb-6 pb-3 border-b-2 border-[#d4af37]/30 flex items-center gap-3">
                <span class="material-symbols-outlined text-3xl">image</span> Logo Sanggar
            </h3>
            
            <div class="flex items-center gap-6 bg-[#2a261f] p-4 rounded-xl border-2 border-[#d4af37]/40">
                @if($profile->logo_url)
                    <img src="{{ Str::startsWith($profile->logo_url, ['http://', 'https://']) ? $profile->logo_url : Storage::url($profile->logo_url) }}" alt="Logo Current" class="w-20 h-20 rounded-full object-cover border-2 border-[#f2ca50]">
                @endif
                <input type="file" name="logo" id="logo" class="text-sm text-[#d0c5af] file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#f2ca50] file:text-[#3c2f00] hover:file:brightness-110">
            </div>
        </div>

        <button type="submit" class="bg-[#f2ca50] text-[#3c2f00] px-8 py-4 rounded-xl font-black text-base hover:brightness-110 transition-all shadow-xl inline-flex items-center gap-2">
            <span class="material-symbols-outlined text-xl">save</span> Simpan Perubahan Profil
        </button>
    </form>
</div>
@endsection