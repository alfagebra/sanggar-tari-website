@extends('layouts.admin')

@section('title', 'Tulis Artikel Baru')
@section('header_title', 'Tulis Artikel Baru')

@section('content')
    <div class="admin-card">
        <a href="{{ route('admin.articles') }}" style="color: var(--primary); font-weight: 700; font-size: 0.9rem; display: inline-block; margin-bottom: 20px;">
            &larr; Kembali ke Daftar Artikel
        </a>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul style="list-style: none;">
                    @foreach($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 800px;">
            @csrf

            <div class="form-group">
                <label for="title" class="form-label">Judul Artikel</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Tuliskan judul artikel yang menarik" value="{{ old('title') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Gambar Utama / Banner Artikel</label>
                <input type="file" name="image" id="image" class="form-control" style="background: var(--light); padding: 8px;">
                <small style="color: var(--text-muted); display: block; margin-top: 6px;">Format: PNG, JPG, JPEG, WebP. Maksimal 4MB (Disarankan landscape).</small>
            </div>

            <div class="form-group">
                <label for="content" class="form-label">Isi Konten Artikel</label>
                <textarea name="content" id="content" class="form-control" style="min-height: 350px;" placeholder="Tulis cerita, liputan kegiatan, atau materi kebudayaan di sini..." required>{{ old('content') }}</textarea>
            </div>

            <div style="margin-top: 30px; border-top: 1px solid var(--border); padding-top: 20px;">
                <button type="submit" class="btn btn-primary" style="padding: 0 40px; height: 48px;">
                    🚀 Terbitkan Artikel
                </button>
                <a href="{{ route('admin.articles') }}" class="btn btn-outline" style="padding: 12px 28px; font-weight: 600;">Batal</a>
            </div>
        </form>
    </div>
@endsection
