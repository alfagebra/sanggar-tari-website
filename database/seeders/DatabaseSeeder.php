<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed default Admin user
        if (!User::where('email', 'admin@sanggar.com')->exists()) {
            User::create([
                'name' => 'Admin Sanggar',
                'email' => 'admin@sanggar.com',
                'password' => Hash::make('kiyatdiharjo123'),
            ]);
        }

        // Seed initial Profile
        if (Profile::count() === 0) {
            Profile::create([
                'history' => 'Sanggar Seni Tari ini didirikan untuk melestarikan kebudayaan dan seni tari tradisional Indonesia.',
                'vision' => 'Menjadi pusat pelestarian dan pengembangan seni tari tradisional yang unggul dan diakui secara luas.',
                'mission' => "1. Menyelenggarakan pelatihan tari tradisional berkualitas.\n2. Melibatkan masyarakat dalam pelestarian seni budaya.\n3. Mengikuti berbagai pentas seni tingkat lokal dan nasional.",
                'address' => 'Jl. Kebudayaan No. 45, Yogyakarta, Indonesia',
                'phone' => '081234567890',
                'email' => 'info@sanggartari.com',
                'instagram' => 'sanggar_tari_indah',
                'facebook' => 'Sanggar Tari Indah',
                'tiktok' => 'sanggartari.indah',
            ]);
        }
    }
}
