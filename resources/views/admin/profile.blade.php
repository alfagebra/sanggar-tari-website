@extends('layouts.admin')

@section('title', 'Kelola Profil Sanggar')
@section('header_title', 'Kelola Profil Sanggar')

@section('content')
    <div class="admin-card">
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="profile-form-grid">
                <!-- Left Side: Main Form Fields -->
                <div>
                    <h3 style="font-family: var(--font-body); font-weight: 700; margin-bottom: 24px; color: var(--primary); border-bottom: 1.5px solid var(--border); padding-bottom: 8px;">🏢 Konten Profil & Sejarah</h3>
                    
                    <div class="form-group">
                        <label for="history" class="form-label">Sejarah Singkat Sanggar</label>
                        <textarea name="history" id="history" class="form-control" style="min-height: 180px;" required>{{ old('history', $profile->history) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="vision" class="form-label">Visi Sanggar</label>
                        <textarea name="vision" id="vision" class="form-control" style="min-height: 80px;" required>{{ old('vision', $profile->vision) }}</textarea>
                    </div>

                    <div class="form-group" style="margin-bottom: 40px;">
                        <label for="mission" class="form-label">Misi Sanggar (Pisahkan per baris)</label>
                        <textarea name="mission" id="mission" class="form-control" style="min-height: 120px;" required>{{ old('mission', $profile->mission) }}</textarea>
                    </div>

                    <h3 style="font-family: var(--font-body); font-weight: 700; margin-bottom: 24px; color: var(--primary); border-bottom: 1.5px solid var(--border); padding-bottom: 8px;">📞 Kontak & Informasi Resmi</h3>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div class="form-group">
                            <label for="phone" class="form-label">No. Telepon / WhatsApp</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Contoh: 0812-3456-7890" value="{{ old('phone', $profile->phone) }}">
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Alamat Email Resmi</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Contoh: info@sanggar.com" value="{{ old('email', $profile->email) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-label">Alamat Lengkap Fisik</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Tuliskan nama jalan, RT/RW, kecamatan, kota/kabupaten" value="{{ old('address', $profile->address) }}">
                    </div>

                    <h3 style="font-family: var(--font-body); font-weight: 700; margin-top: 30px; margin-bottom: 24px; color: var(--primary); border-bottom: 1.5px solid var(--border); padding-bottom: 8px;">🔗 Media Sosial (Tulis Username Saja)</h3>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
                        <div class="form-group">
                            <label for="instagram" class="form-label">Username Instagram</label>
                            <input type="text" name="instagram" id="instagram" class="form-control" placeholder="Contoh: sanggar_tari_indah" value="{{ old('instagram', $profile->instagram) }}">
                        </div>

                        <div class="form-group">
                            <label for="facebook" class="form-label">Nama Halaman Facebook</label>
                            <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Contoh: Sanggar Tari Indah" value="{{ old('facebook', $profile->facebook) }}">
                        </div>

                        <div class="form-group">
                            <label for="tiktok" class="form-label">Username TikTok</label>
                            <input type="text" name="tiktok" id="tiktok" class="form-control" placeholder="Contoh: sanggar_tari_indah" value="{{ old('tiktok', $profile->tiktok) }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="height: 50px; padding: 0 40px;">
                        💾 Simpan Perubahan Profil
                    </button>
                </div>

                <!-- Right Side: Logo Upload Preview -->
                <div>
                    <h3 style="font-family: var(--font-body); font-weight: 700; margin-bottom: 24px; color: var(--primary); border-bottom: 1.5px solid var(--border); padding-bottom: 8px;">🎨 Logo Sanggar</h3>
                    
                    <div class="profile-logo-upload">
                        @if($profile->logo_url)
                            <img src="{{ Storage::url($profile->logo_url) }}" alt="Logo">
                        @else
                            <div style="background: var(--border); border-radius: 50%; width: 100px; height: 100px; line-height: 100px; font-size: 2.5rem; color: var(--text-muted); margin: 0 auto 16px;">🏢</div>
                        @endif
                        
                        <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 20px;">Logo aktif saat ini. Anda dapat mengunggah file baru untuk menggantinya.</p>
                        
                        <div class="form-group" style="text-align: left;">
                            <label for="logo" class="form-label">Pilih Logo Baru</label>
                            <input type="file" name="logo" id="logo" class="form-control" style="background: #fff; padding: 8px;">
                            <small style="color: var(--text-muted); display: block; margin-top: 6px;">Format: PNG, JPG, WebP. Maksimal 2MB.</small>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
