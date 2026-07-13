@extends('layouts.admin')

@section('title', 'Unggah Foto Galeri')
@section('header_title', 'Unggah Foto Galeri')

@section('content')
    <div class="admin-card">
        <a href="{{ route('admin.galleries') }}" style="color: var(--primary); font-weight: 700; font-size: 0.9rem; display: inline-block; margin-bottom: 20px;">
            &larr; Kembali ke Galeri
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

        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 600px;">
            @csrf

            <div class="form-group">
                <label for="title" class="form-label">Judul Foto</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Contoh: Latihan Rutin Minggu Pagi" value="{{ old('title') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Deskripsi Foto (Singkat)</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Contoh: Diikuti oleh kelas tari anak-anak usia 7-10 tahun" value="{{ old('description') }}">
            </div>

            <div class="form-group" style="margin-bottom: 30px;">
                <label for="image" class="form-label">Pilih Berkas Foto</label>
                <input type="file" name="image" id="image" class="form-control" style="background: var(--light); padding: 8px;" required>
                <small style="color: var(--text-muted); display: block; margin-top: 6px;">Format: PNG, JPG, JPEG, GIF, WebP. Maksimal 4MB.</small>
            </div>

            <div style="border-top: 1px solid var(--border); padding-top: 20px;">
                <button type="submit" class="btn btn-primary" style="padding: 0 40px; height: 48px;">
                    📤 Unggah Foto
                </button>
                <a href="{{ route('admin.galleries') }}" class="btn btn-outline" style="padding: 12px 28px; font-weight: 600;">Batal</a>
            </div>
        </form>
    </div>
@endsection
