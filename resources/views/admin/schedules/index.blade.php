@extends('layouts.admin')

@section('title', 'Kelola Jadwal Latihan')
@section('header_title', 'Kelola Jadwal Latihan Rutin')

@section('content')
<div class="bg-[#1e1c18] border-2 border-[#d4af37] rounded-2xl p-6 md:p-8 shadow-2xl">
    <div class="flex justify-between items-center mb-6">
        <h3 class="font-headline-md text-2xl font-black text-[#f2ca50] flex items-center gap-3">
            <span class="material-symbols-outlined text-3xl">calendar_month</span> Daftar Program & Jadwal Latihan
        </h3>
        <a href="{{ route('admin.schedules.create') }}" class="bg-[#f2ca50] text-[#3c2f00] px-6 py-3 rounded-xl font-black text-sm hover:brightness-110 transition-all inline-flex items-center gap-2 shadow-lg">
            <span class="material-symbols-outlined text-base">add</span> Tambah Jadwal Baru
        </a>
    </div>

    @if($schedules->isEmpty())
        <div class="text-center py-10 text-[#d0c5af] border-2 border-dashed border-[#d4af37]/40 rounded-xl bg-[#24211b]">
            Belum ada jadwal latihan yang ditambahkan saat ini.
        </div>
    @else
        <div class="overflow-x-auto rounded-xl border border-[#d4af37]/30">
            <table class="w-full text-left text-sm text-[#e5e2e1]">
                <thead class="bg-[#2d281e] text-[#f2ca50] uppercase text-xs font-black tracking-wider border-b-2 border-[#d4af37]">
                    <tr>
                        <th class="p-4">Hari</th>
                        <th class="p-4">Waktu / Jam</th>
                        <th class="p-4">Nama Kelas / Program</th>
                        <th class="p-4">Pelatih / Pengajar</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#d4af37]/20 bg-[#1e1c18]">
                    @foreach($schedules as $schedule)
                        <tr class="hover:bg-[#2c271e] transition-colors">
                            <td class="p-4 font-black text-[#f2ca50] uppercase text-base">{{ $schedule->day }}</td>
                            <td class="p-4 text-[#d0c5af] font-medium">{{ $schedule->time }}</td>
                            <td class="p-4 font-bold text-white text-base">{{ $schedule->class_name }}</td>
                            <td class="p-4 text-[#d0c5af] font-medium">{{ $schedule->instructor ?? '-' }}</td>
                            <td class="p-4 flex items-center gap-2">
                                <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="inline-flex items-center gap-1.5 bg-[#f2ca50] text-[#3c2f00] px-4 py-2 rounded-lg text-xs font-black hover:brightness-110 shadow transition-all">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                                </a>
                                <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1.5 bg-red-900/60 text-red-300 border border-red-500/50 px-4 py-2 rounded-lg text-xs font-black hover:bg-red-800 transition-all">
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