@extends('layouts.admin')

@section('title', 'Edit Jadwal Latihan')
@section('header_title', 'Edit Jadwal Latihan')

@section('content')
    <div class="admin-card">
        <a href="{{ route('admin.schedules') }}" style="color: var(--primary); font-weight: 700; font-size: 0.9rem; display: inline-block; margin-bottom: 20px;">
            &larr; Kembali ke Jadwal
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

        <form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST" style="max-width: 600px;">
            @csrf

            <div class="form-group">
                <label for="class_name" class="form-label">Nama Kelas Tari</label>
                <input type="text" name="class_name" id="class_name" class="form-control" placeholder="Contoh: Kelas Tari" value="{{ old('class_name', $schedule->class_name) }}" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label for="day" class="form-label">Hari Latihan</label>
                    <select name="day" id="day" class="form-control" required>
                        <option value="">-- Pilih Hari --</option>
                        <option value="Senin" {{ old('day', $schedule->day) === 'Senin' ? 'selected' : '' }}>Senin</option>
                        <option value="Selasa" {{ old('day', $schedule->day) === 'Selasa' ? 'selected' : '' }}>Selasa</option>
                        <option value="Rabu" {{ old('day', $schedule->day) === 'Rabu' ? 'selected' : '' }}>Rabu</option>
                        <option value="Kamis" {{ old('day', $schedule->day) === 'Kamis' ? 'selected' : '' }}>Kamis</option>
                        <option value="Jumat" {{ old('day', $schedule->day) === 'Jumat' ? 'selected' : '' }}>Jumat</option>
                        <option value="Sabtu" {{ old('day', $schedule->day) === 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                        <option value="Minggu" {{ old('day', $schedule->day) === 'Minggu' ? 'selected' : '' }}>Minggu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="time" class="form-label">Waktu / Jam Latihan</label>
                    <input type="text" name="time" id="time" class="form-control" placeholder="Contoh: 15:30 - 17:30 WIB" value="{{ old('time', $schedule->time) }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="instructor" class="form-label">Instruktur / Nama Pelatih</label>
                <input type="text" name="instructor" id="instructor" class="form-control" placeholder="Contoh: Ibu Sekar Arum" value="{{ old('instructor', $schedule->instructor) }}">
            </div>

            <div class="form-group" style="margin-bottom: 30px;">
                <label for="description" class="form-label">Keterangan Singkat (Opsional)</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Contoh: Terbuka untuk umum" value="{{ old('description', $schedule->description) }}">
            </div>

            <div style="border-top: 1px solid var(--border); padding-top: 20px;">
                <button type="submit" class="btn btn-primary" style="padding: 0 40px; height: 48px;">
                    💾 Simpan Perubahan
                </button>
                <a href="{{ route('admin.schedules') }}" class="btn btn-outline" style="padding: 12px 28px; font-weight: 600;">Batal</a>
            </div>
        </form>
    </div>
@endsection
