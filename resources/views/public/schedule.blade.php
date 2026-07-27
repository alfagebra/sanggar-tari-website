@extends('layouts.app')

@section('title', 'Jadwal Latihan & Program')

@section('content')
<section class="py-24 pt-36 md:pt-44 bg-background min-h-screen">
    <div class="max-w-container-max mx-auto px-4 md:px-margin-desktop">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-primary font-label-md text-label-md tracking-widest uppercase mb-2 block font-bold">Program Sanggar</span>
            <h1 class="font-headline-lg text-3xl md:text-5xl mb-6 font-black leading-tight text-on-background">Jadwal Latihan Rutin</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">Bergabunglah dalam sesi latihan mingguan tari dan karawitan bersama kami.</p>
        </div>

        <div class="max-w-4xl mx-auto space-y-6">
            @if($schedules->isEmpty())
                <div class="text-center py-16 bg-surface-container-low border border-gold-subtle rounded-2xl text-on-surface-variant shadow-sm">
                    Belum ada jadwal latihan yang dipublikasikan.
                </div>
            @else
                @foreach($schedules as $schedule)
                    <div class="bg-surface-container-low border border-gold-subtle p-6 md:p-8 rounded-2xl flex flex-col md:flex-row items-start md:items-center justify-between gap-6 hover:border-primary/40 transition-all shadow-sm">
                        <div class="flex items-center gap-6">
                            <div class="w-20 h-20 bg-primary/10 border border-primary/30 rounded-2xl flex flex-col items-center justify-center flex-shrink-0 text-primary">
                                <span class="font-bold text-xl uppercase">{{ strtoupper(substr($schedule->day, 0, 3)) }}</span>
                                <span class="text-[10px] uppercase tracking-widest font-bold">HARI</span>
                            </div>
                            <div>
                                <h3 class="font-headline-md text-xl md:text-2xl font-bold text-on-surface mb-2">{{ $schedule->class_name }}</h3>
                                <p class="text-sm text-on-surface-variant flex items-center gap-2">
                                    <span class="material-symbols-outlined text-primary text-base">schedule</span> {{ $schedule->time }}
                                    @if($schedule->instructor)
                                        • <span class="material-symbols-outlined text-primary text-base">person</span> Pelatih: {{ $schedule->instructor }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->phone ?? '081234567890') }}?text=Halo%20GSBK%20Candi,%20saya%20ingin%20bertanya%20mengenai%20kegiatan%20latihan%20{{ urlencode($schedule->class_name) }}" target="_blank" class="bg-primary text-on-primary px-6 py-3 rounded-xl font-bold text-sm hover:brightness-110 transition-all inline-flex items-center gap-2 self-stretch md:self-auto justify-center shadow-sm">
                            Tanya Kegiatan <span class="material-symbols-outlined text-base">send</span>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endsection