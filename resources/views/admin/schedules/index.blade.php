@extends('layouts.admin')

@section('title', 'Kelola Jadwal Latihan')
@section('header_title', 'Kelola Jadwal Latihan Rutin')

@section('content')
<div class="bg-surface-container-low border border-gold-subtle rounded-xl p-6 md:p-8">
    <div class="flex justify-between items-center mb-6">
        <h3 class="font-headline-md text-xl font-bold text-primary flex items-center gap-2">
            <span class="material-symbols-outlined">calendar_month</span> Daftar Program & Jadwal Latihan
        </h3>
        <a href="{{ route('admin.schedules.create') }}" class="bg-primary text-on-primary px-5 py-2 rounded-lg font-bold text-sm hover:brightness-110 transition-all inline-flex items-center gap-2">
            <span class="material-symbols-outlined text-base">add</span> Tambah Jadwal
        </a>
    </div>

    @if($schedules->isEmpty())
        <div class="text-center py-10 text-on-surface-variant border border-dashed border-outline-variant/30 rounded-xl">
            Belum ada jadwal latihan yang ditambahkan saat ini.
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-on-surface">
                <thead class="bg-surface-container-high text-primary uppercase text-xs tracking-wider border-b border-gold-subtle">
                    <tr>
                        <th class="p-4">Hari</th>
                        <th class="p-4">Waktu / Jam</th>
                        <th class="p-4">Nama Kelas / Program</th>
                        <th class="p-4">Pelatih / Pengajar</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/20">
                    @foreach($schedules as $schedule)
                        <tr class="hover:bg-surface-container-high/50 transition-colors">
                            <td class="p-4 font-bold text-primary uppercase">{{ $schedule->day }}</td>
                            <td class="p-4 text-on-surface-variant">{{ $schedule->time }}</td>
                            <td class="p-4 font-bold text-on-surface">{{ $schedule->class_name }}</td>
                            <td class="p-4 text-on-surface-variant">{{ $schedule->instructor ?? '-' }}</td>
                            <td class="p-4 flex items-center gap-2">
                                <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="border border-primary text-primary px-3 py-1 rounded text-xs hover:bg-primary/10 transition-all inline-flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                                </a>
                                <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border border-red-500/50 text-red-400 px-3 py-1 rounded text-xs hover:bg-red-500/10 transition-all inline-flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">delete</span> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection