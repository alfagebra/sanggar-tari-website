@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')
@section('header_title', 'Edit Foto Galeri')

@section('content')
<div class="admin-card-color border admin-border-color rounded-2xl p-6 md:p-8 shadow-sm max-w-2xl">
    <div class="flex justify-between items-center mb-6 pb-3 border-b admin-border-color">
        <h3 class="font-headline-md text-2xl font-bold admin-accent-color flex items-center gap-2">
            <span class="material-symbols-outlined text-2xl">edit</span> Edit Informasi Foto
        </h3>
        <a href="{{ route('admin.galleries') }}" class="text-xs font-bold admin-muted-color hover:text-primary transition-all flex items-center gap-1">
            <span class="material-symbols-outlined text-base">arrow_back</span> Kembali
        </a>
    </div>

    <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <!-- Judul Foto -->
        <div>
            <label for="title" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Judul Foto Dokumentasi</label>
            <input type="text" name="title" id="title" class="w-full" value="{{ old('title', $gallery->title) }}" required placeholder="Contoh: Pentas Tari Merak di Candi Prambanan">
        </div>

        <!-- Deskripsi/Keterangan Singkat -->
        <div>
            <label for="description" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Keterangan / Deskripsi Singkat</label>
            <textarea name="description" id="description" rows="3" class="w-full" placeholder="Keterangan pentas, tanggal, atau detail singkat lainnya">{{ old('description', $gallery->description) }}</textarea>
        </div>

        <!-- Tampilan Foto Saat Ini -->
        <div>
            <label class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Foto Saat Ini</label>
            <div class="w-48 h-32 rounded-lg overflow-hidden border admin-border-color mb-3">
                <img src="{{ Str::startsWith($gallery->image_url, ['http://', 'https://']) ? $gallery->image_url : Storage::url($gallery->image_url) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Unggah Foto Baru (Optional) -->
        <div>
            <label for="image" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Ganti File Foto (Kosongkan jika tidak ingin diganti)</label>
            <input type="file" name="image" id="image" class="w-full" accept="image/*">
            <p class="text-xs admin-muted-color mt-1">Format file: JPG, JPEG, PNG, WEBP. Ukuran maks: 4MB.</p>
        </div>

        <button type="submit" class="bg-[#b8860b] dark:bg-[#f2ca50] text-white dark:text-[#3c2f00] px-8 py-3.5 rounded-xl font-bold text-sm hover:opacity-95 transition-all shadow-sm inline-flex items-center gap-2">
            <span class="material-symbols-outlined text-lg">save</span> Simpan Perubahan
        </button>
    </form>
</div>
@endsection