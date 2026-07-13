@extends('layouts.admin')

@section('title', 'Kelola Artikel')
@section('header_title', 'Kelola Artikel')

@section('content')
    <div class="admin-card">
        <div class="d-flex justify-between align-center" style="margin-bottom: 30px;">
            <h3 style="font-family: var(--font-body); font-weight: 700; font-size: 1.2rem;">📰 Daftar Artikel Terbit</h3>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-sm">+ Tulis Artikel Baru</a>
        </div>

        @if($articles->isEmpty())
            <div style="text-align: center; padding: 40px; color: var(--text-muted);">
                Belum ada artikel. Klik tombol di atas untuk menulis artikel pertama Anda!
            </div>
        @else
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">Gambar</th>
                        <th>Judul Artikel</th>
                        <th style="width: 150px;">Tanggal Terbit</th>
                        <th style="width: 180px; text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>
                                @if($article->image_url)
                                    <img src="{{ Storage::url($article->image_url) }}" alt="Preview" class="admin-img-preview">
                                @else
                                    <span style="font-size: 0.75rem; color: var(--text-muted); background: var(--light); padding: 4px 8px; border-radius: var(--radius-sm);">No Image</span>
                                @endif
                            </td>
                            <td style="font-weight: 600;">
                                <a href="{{ route('articles.show', $article->slug) }}" target="_blank" style="color: var(--dark);">
                                    {{ $article->title }}
                                </a>
                            </td>
                            <td>{{ $article->created_at->format('d M Y') }}</td>
                            <td style="text-align: right;">
                                <div class="admin-actions" style="justify-content: flex-end;">
                                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-secondary btn-sm" style="padding: 6px 12px; font-size: 0.8rem;">✏️ Edit</a>
                                    
                                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" style="padding: 6px 12px; font-size: 0.8rem;">🗑️ Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Custom Pagination -->
            @if($articles->lastPage() > 1)
                <div class="pagination-wrapper" style="margin-top: 30px;">
                    @if ($articles->onFirstPage())
                        <span class="btn btn-outline btn-sm" style="opacity: 0.5; cursor: not-allowed;">&larr; Prev</span>
                    @else
                        <a href="{{ $articles->previousPageUrl() }}" class="btn btn-outline btn-sm">&larr; Prev</a>
                    @endif

                    <span style="align-self: center; font-weight: 600; color: var(--text-muted); font-size: 0.85rem; margin: 0 15px;">
                        {{ $articles->currentPage() }} / {{ $articles->lastPage() }}
                    </span>

                    @if ($articles->hasMorePages())
                        <a href="{{ $articles->nextPageUrl() }}" class="btn btn-outline btn-sm">Next &rarr;</a>
                    @else
                        <span class="btn btn-outline btn-sm" style="opacity: 0.5; cursor: not-allowed;">Next &rarr;</span>
                    @endif
                </div>
            @endif
        @endif
    </div>
@endsection
