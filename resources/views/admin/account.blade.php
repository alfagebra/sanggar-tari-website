@extends('layouts.admin')

@section('title', 'Pengaturan Akun Admin')
@section('header_title', 'Pengaturan Akun Admin')

@section('content')
<div class="admin-card-color border admin-border-color rounded-2xl p-6 md:p-8 shadow-sm max-w-2xl">
    <form action="{{ route('admin.account.update') }}" method="POST" class="space-y-6">
        @csrf
        
        <div>
            <h3 class="font-headline-md text-2xl font-bold admin-accent-color mb-6 pb-3 border-b admin-border-color flex items-center gap-2">
                <span class="material-symbols-outlined text-2xl">manage_accounts</span> Akun Login Pengelola
            </h3>
            
            <div class="space-y-6">
                <!-- Username / Nama Admin -->
                <div>
                    <label for="name" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Nama Admin / Username</label>
                    <input type="text" name="name" id="name" class="w-full" value="{{ old('name', $user->name) }}" required placeholder="Contoh: Admin Sanggar">
                </div>

                <!-- Email Login -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Email Login Admin</label>
                    <input type="email" name="email" id="email" class="w-full" value="{{ old('email', $user->email) }}" required placeholder="Contoh: admin@gsbkcandi.com">
                </div>

                <!-- Password Baru (Optional) -->
                <div class="pt-4 border-t admin-border-color">
                    <h4 class="text-sm font-bold admin-accent-color mb-4">Ganti Kata Sandi (Kosongkan jika tidak ingin diubah)</h4>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="password" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Kata Sandi Baru</label>
                            <input type="password" name="password" id="password" class="w-full" placeholder="Minimal 8 karakter">
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-xs font-bold uppercase admin-muted-color mb-2 tracking-wider">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full" placeholder="Ulangi kata sandi baru">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="bg-[#b8860b] dark:bg-[#f2ca50] text-white dark:text-[#3c2f00] px-8 py-3.5 rounded-xl font-bold text-sm hover:opacity-95 transition-all shadow-sm inline-flex items-center gap-2">
            <span class="material-symbols-outlined text-lg">save</span> Simpan Perubahan Akun
        </button>
    </form>
</div>
@endsection