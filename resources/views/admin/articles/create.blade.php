@extends('layouts.admin')

@section('title', 'Buat Artikel Baru')
@section('header_title', 'Buat Artikel Kebudayaan Baru')

@section('content')
<div class="bg-surface-container-low border border-gold-subtle rounded-xl p-6 md:p-8 max-w-3xl">
    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="title" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Judul Artikel</label>
            <input type="text" name="title" id="title" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-primary transition-all" value="{{ old('title') }}" required placeholder="Masukkan judul artikel kebudayaan...">
        </div>

        <div>
            <label for="image" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Gambar Utama Artikel (Opsional)</label>
            <input type="file" name="image" id="image" class="text-sm text-on-surface-variant file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-primary file:text-on-primary hover:file:brightness-110">
        </div>

        <div>
            <label for="content" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Isi Lengkap Artikel</label>
            <textarea name="content" id="content" rows="10" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg p-4 text-sm text-white focus:outline-none focus:border-primary transition-all" required placeholder="Tuliskan cerita atau isi artikel di sini...">{{ old('content') }}</textarea>
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" class="bg-primary text-on-primary px-6 py-3 rounded-lg font-bold text-sm hover:brightness-110 transition-all inline-flex items-center gap-2">
                <span class="material-symbols-outlined text-base">save</span> Terbitkan Artikel
            </button>
            <a href="{{ route('admin.articles') }}" class="border border-outline-variant text-on-surface-variant px-6 py-3 rounded-lg font-bold text-sm hover:bg-surface-container-high transition-all">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection