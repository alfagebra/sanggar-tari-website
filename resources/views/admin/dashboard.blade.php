@extends('layouts.admin')

@section('title', 'Ikhtisar Dashboard')
@section('header_title', 'Ikhtisar Dashboard')

@section('content')
    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-info">
                <h4>Total Artikel</h4>
                <p>{{ $articlesCount }}</p>
            </div>
            <div class="stat-icon">📰</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-info">
                <h4>Foto Galeri</h4>
                <p>{{ $galleriesCount }}</p>
            </div>
            <div class="stat-icon">📸</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-info">
                <h4>Kelas Tari (Jadwal)</h4>
                <p>{{ $schedulesCount }}</p>
            </div>
            <div class="stat-icon">📅</div>
        </div>
    </div>

    <!-- Quick Access Section -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 40px;">
        <!-- Welcome Card -->
        <div class="admin-card" style="background: linear-gradient(135deg, var(--primary), var(--primary-hover)); color: var(--white);">
            <h3 style="color: var(--secondary); font-family: var(--font-body); margin-bottom: 12px; font-weight: 700;">Selamat Bekerja!</h3>
            <p style="font-size: 0.95rem; line-height: 1.6; margin-bottom: 24px; color: #f5f0eb;">
                Melalui panel ini, Anda dapat mengelola profil sanggar tari, memperbarui jadwal latihan mingguan, mengunggah foto pentas, dan menulis artikel kebudayaan secara langsung dan gratis.
            </p>
            <a href="{{ route('admin.profile') }}" class="btn btn-secondary btn-sm" style="color: var(--dark);">Edit Profil Sanggar &rarr;</a>
        </div>

        <!-- System Status Card -->
        <div class="admin-card">
            <h3 style="font-family: var(--font-body); margin-bottom: 16px; font-weight: 700; font-size: 1.2rem;">⚡ Status Integrasi Cloud</h3>
            <ul style="list-style: none; display: flex; flex-direction: column; gap: 12px; font-size: 0.95rem;">
                <li style="display: flex; justify-content: space-between; border-bottom: 1px solid var(--border); padding-bottom: 8px;">
                    <span>Hosting Aplikasi:</span>
                    <strong style="color: #28a745;">Vercel Serverless (Gratis)</strong>
                </li>
                <li style="display: flex; justify-content: space-between; border-bottom: 1px solid var(--border); padding-bottom: 8px;">
                    <span>Database Engine:</span>
                    <strong style="color: #28a745;">Supabase PostgreSQL (Gratis)</strong>
                </li>
                <li style="display: flex; justify-content: space-between;">
                    <span>Penyimpanan Foto (Bucket):</span>
                    <strong style="color: #28a745;">Supabase Storage (Gratis)</strong>
                </li>
            </ul>
        </div>
    </div>

    <!-- Recent Articles Table -->
    <div class="admin-card">
        <div class="d-flex justify-between align-center" style="margin-bottom: 20px;">
            <h3 style="font-family: var(--font-body); font-weight: 700; font-size: 1.2rem;">📰 Artikel Terbaru yang Diterbitkan</h3>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-sm">+ Buat Artikel</a>
        </div>

        @if($recentArticles->isEmpty())
            <p style="color: var(--text-muted); text-align: center; padding: 20px 0;">Belum ada artikel yang dibuat saat ini.</p>
        @else
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Judul Artikel</th>
                        <th>Tanggal Rilis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentArticles as $article)
                        <tr>
                            <td>
                                @if($article->image_url)
                                    <img src="{{ Storage::url($article->image_url) }}" alt="Preview" class="admin-img-preview">
                                @else
                                    <span style="font-size: 0.8rem; color: var(--text-muted);">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td style="font-weight: 600; color: var(--dark);">{{ $article->title }}</td>
                            <td>{{ $article->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="admin-actions">
                                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-secondary btn-sm" style="padding: 6px 12px; font-size: 0.8rem;">✏️ Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
