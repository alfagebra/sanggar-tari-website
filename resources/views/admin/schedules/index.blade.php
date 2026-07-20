@extends('layouts.admin')

@section('title', 'Kelola Jadwal Latihan')
@section('header_title', 'Kelola Jadwal Latihan Rutin')

@section('content')
<div class="admin-card-color border admin-border-color rounded-2xl p-6 md:p-8 shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h3 class="font-headline-md text-2xl font-bold admin-accent-color flex items-center gap-2">
            <span class="material-symbols-outlined text-2xl">calendar_month</span> Daftar Program & Jadwal Latihan
        </h3>
        <a href="{{ route('admin.schedules.create') }}" class="bg-[#b8860b] dark:bg-[#f2ca50] text-white dark:text-[#3c2f00] px-5 py-2.5 rounded-xl font-bold text-sm hover:opacity-95 transition-all inline-flex items-center gap-2 shadow-sm">
            <span class="material-symbols-outlined text-base">add</span> Tambah Jadwal Baru
        </a>
    </div>

    @if($schedules->isEmpty())
        <div class="text-center py-10 admin-muted-color border border-dashed admin-border-color rounded-xl bg-black/5 dark:bg-white/5">
            Belum ada jadwal latihan yang ditambahkan saat ini.
        </div>
    @else
        <div class="overflow-x-auto rounded-xl border admin-border-color">
            <table class="w-full text-left text-sm admin-text-color">
                <thead class="bg-amber-500/10 text-[#8b6508] dark:text-[#f2ca50] uppercase text-xs font-bold tracking-wider border-b admin-border-color">
                    <tr>
                        <th class="p-4">Hari</th>
                        <th class="p-4">Waktu / Jam</th>
                        <th class="p-4">Nama Kelas / Program</th>
                        <th class="p-4">Pelatih / Pengajar</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y admin-border-color admin-card-color">
                    @foreach($schedules as $schedule)
                        <tr class="hover:bg-black/5 dark:hover:bg-white/5 transition-colors">
                            <td class="p-4 font-bold admin-accent-color uppercase text-base">{{ $schedule->day }}</td>
                            <td class="p-4 admin-muted-color font-medium">{{ $schedule->time }}</td>
                            <td class="p-4 font-bold text-base admin-text-color">{{ $schedule->class_name }}</td>
                            <td class="p-4 admin-muted-color font-medium">{{ $schedule->instructor ?? '-' }}</td>
                            <td class="p-4 flex items-center gap-2">
                                <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="inline-flex items-center gap-1.5 bg-[#b8860b] dark:bg-[#f2ca50] text-white dark:text-[#3c2f00] px-3.5 py-1.5 rounded-lg text-xs font-bold hover:opacity-95 shadow-sm transition-all">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                                </a>
                                <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1.5 bg-red-500/10 text-red-600 border border-red-500/20 px-3.5 py-1.5 rounded-lg text-xs font-bold hover:bg-red-500/20 transition-all">
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