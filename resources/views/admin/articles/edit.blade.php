@extends('layouts.admin')

@section('title', 'Edit Artikel')
@section('header_title', 'Edit Artikel')

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

        <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data" style="max-width: 800px;">
            @csrf

            <div class="form-group">
                <label for="title" class="form-label">Judul Artikel</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Tuliskan judul artikel" value="{{ old('title', $article->title) }}" required>
            </div>

            <div class="form-group" style="display: grid; grid-template-columns: 150px 1fr; gap: 20px; align-items: center; background: var(--light); padding: 16px; border-radius: var(--radius); border: 1px solid var(--border);">
                <div>
                    @if($article->image_url)
                        <img src="{{ Storage::url($article->image_url) }}" alt="Current Image" style="width: 100%; height: 90px; object-fit: cover; border-radius: var(--radius-sm); border: 2px solid var(--white); box-shadow: var(--shadow-sm);">
                    @else
                        <div style="background: var(--border); width: 100%; height: 90px; border-radius: var(--radius-sm); line-height: 90px; text-align: center; font-size: 0.8rem; color: var(--text-muted);">No Image</div>
                    @endif
                </div>
                <div>
                    <label for="image" class="form-label" style="margin-bottom: 4px;">Ganti Gambar Utama (Opsional)</label>
                    <input type="file" name="image" id="image" class="form-control" style="background: #white; padding: 6px;">
                    <small style="color: var(--text-muted); display: block; margin-top: 6px;">Format: PNG, JPG, JPEG, WebP. Maksimal 4MB.</small>
                </div>
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="content" class="form-label">Isi Konten Artikel</label>
                <textarea name="content" id="content" class="form-control" style="min-height: 350px;" required>{{ old('content', $article->content) }}</textarea>
            </div>

            <div style="margin-top: 30px; border-top: 1px solid var(--border); padding-top: 20px;">
                <button type="submit" class="btn btn-primary" style="padding: 0 40px; height: 48px;">
                    💾 Simpan Artikel
                </button>
                <a href="{{ route('admin.articles') }}" class="btn btn-outline" style="padding: 12px 28px; font-weight: 600;">Batal</a>
            </div>
        </form>
    </div>
@endsection
