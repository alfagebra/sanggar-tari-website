@extends('layouts.admin')

@section('title', 'Kelola Jadwal Latihan')
@section('header_title', 'Kelola Jadwal Latihan')

@section('content')
    <div class="admin-card">
        <div class="d-flex justify-between align-center" style="margin-bottom: 30px;">
            <h3 style="font-family: var(--font-body); font-weight: 700; font-size: 1.2rem;">📅 Daftar Kelas & Jadwal Tari</h3>
            <a href="{{ route('admin.schedules.create') }}" class="btn btn-primary btn-sm">+ Tambah Jadwal Latihan</a>
        </div>

        @if($schedules->isEmpty())
            <div style="text-align: center; padding: 40px; color: var(--text-muted);">
                Belum ada jadwal latihan. Klik tombol di atas untuk menambah kelas pertama Anda!
            </div>
        @else
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Nama Kelas</th>
                        <th>Waktu (Jam)</th>
                        <th>Pelatih (Instruktur)</th>
                        <th>Keterangan</th>
                        <th style="width: 180px; text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $schedule)
                        <tr>
                            <td>
                                <span class="day-badge">{{ $schedule->day }}</span>
                            </td>
                            <td style="font-weight: 600; color: var(--primary);">{{ $schedule->class_name }}</td>
                            <td style="font-weight: 600;">{{ $schedule->time }}</td>
                            <td>👤 {{ $schedule->instructor ?? 'Staf Sanggar' }}</td>
                            <td style="color: var(--text-muted); font-size: 0.9rem;">{{ $schedule->description ?? '-' }}</td>
                            <td style="text-align: right;">
                                <div class="admin-actions" style="justify-content: flex-end;">
                                    <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="btn btn-secondary btn-sm" style="padding: 6px 12px; font-size: 0.8rem;">✏️ Edit</a>
                                    
                                    <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal kelas ini?')">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" style="padding: 6px 12px; font-size: 0.8rem;">🗑️ Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
