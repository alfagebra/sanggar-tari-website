@extends('layouts.admin')

@section('title', 'Edit Jadwal Latihan')
@section('header_title', 'Edit Jadwal Latihan')

@section('content')
<div class="bg-surface-container-low border border-gold-subtle rounded-xl p-6 md:p-8 max-w-xl">
    <form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="day" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Hari Latihan</label>
            <input type="text" name="day" id="day" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-primary transition-all" value="{{ old('day', $schedule->day) }}" required>
        </div>

        <div>
            <label for="time" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Waktu / Jam Latihan</label>
            <input type="text" name="time" id="time" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-primary transition-all" value="{{ old('time', $schedule->time) }}" required>
        </div>

        <div>
            <label for="class_name" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Nama Kelas / Program</label>
            <input type="text" name="class_name" id="class_name" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-primary transition-all" value="{{ old('class_name', $schedule->class_name) }}" required>
        </div>

        <div>
            <label for="instructor" class="block text-xs font-bold uppercase text-on-surface-variant mb-2">Nama Pelatih / Pengajar</label>
            <input type="text" name="instructor" id="instructor" class="w-full bg-surface-container-high border border-outline-variant/30 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-primary transition-all" value="{{ old('instructor', $schedule->instructor) }}">
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" class="bg-primary text-on-primary px-6 py-3 rounded-lg font-bold text-sm hover:brightness-110 transition-all inline-flex items-center gap-2">
                <span class="material-symbols-outlined text-base">save</span> Simpan Perubahan
            </button>
            <a href="{{ route('admin.schedules') }}" class="border border-outline-variant text-on-surface-variant px-6 py-3 rounded-lg font-bold text-sm hover:bg-surface-container-high transition-all">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection