@extends('layouts.admin')

@section('title', 'Kelola Galeri Foto')
@section('header_title', 'Kelola Galeri Foto')

@section('content')
    <div class="admin-card">
        <div class="d-flex justify-between align-center" style="margin-bottom: 30px;">
            <h3 style="font-family: var(--font-body); font-weight: 700; font-size: 1.2rem;">📸 Galeri Foto Aktif</h3>
            <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary btn-sm">+ Unggah Foto Baru</a>
        </div>

        @if($galleries->isEmpty())
            <div style="text-align: center; padding: 40px; color: var(--text-muted);">
                Belum ada foto galeri. Klik tombol di atas untuk mengunggah dokumentasi foto pertama Anda!
            </div>
        @else
            <!-- Grid displaying photos with overlay and delete options -->
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px;">
                @foreach($galleries as $gallery)
                    <div style="background: var(--light); border: 1px solid var(--border); border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm); display: flex; flex-direction: column;">
                        <img src="{{ Storage::url($gallery->image_url) }}" alt="{{ $gallery->title }}" style="width: 100%; height: 160px; object-fit: cover;">
                        <div style="padding: 16px; flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                            <div>
                                <h4 style="font-size: 1rem; color: var(--dark); font-family: var(--font-body); font-weight: 700; margin-bottom: 4px;">{{ $gallery->title }}</h4>
                                <p style="font-size: 0.8rem; color: var(--text-muted); line-height: 1.4; margin-bottom: 12px;">{{ $gallery->description ?? 'Tidak ada deskripsi' }}</p>
                            </div>
                            
                            <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini dari galeri?')" style="margin-top: 10px;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" style="width: 100%; font-size: 0.75rem; padding: 6px 12px;">
                                    🗑️ Hapus Foto
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Custom Pagination -->
            @if($galleries->lastPage() > 1)
                <div class="pagination-wrapper" style="margin-top: 45px;">
                    @if ($galleries->onFirstPage())
                        <span class="btn btn-outline btn-sm" style="opacity: 0.5; cursor: not-allowed;">&larr; Prev</span>
                    @else
                        <a href="{{ $galleries->previousPageUrl() }}" class="btn btn-outline btn-sm">&larr; Prev</a>
                    @endif

                    <span style="align-self: center; font-weight: 600; color: var(--text-muted); font-size: 0.85rem; margin: 0 15px;">
                        {{ $galleries->currentPage() }} / {{ $galleries->lastPage() }}
                    </span>

                    @if ($galleries->hasMorePages())
                        <a href="{{ $galleries->nextPageUrl() }}" class="btn btn-outline btn-sm">Next &rarr;</a>
                    @else
                        <span class="btn btn-outline btn-sm" style="opacity: 0.5; cursor: not-allowed;">Next &rarr;</span>
                    @endif
                </div>
            @endif
        @endif
    </div>
@endsection
