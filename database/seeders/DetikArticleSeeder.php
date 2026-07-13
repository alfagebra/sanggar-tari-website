<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class DetikArticleSeeder extends Seeder
{
    public function run(): void
    {
        $title = "Melihat Luwesnya Grup Seni Margasari Asal Jepang Menabuh Gamelan di Klaten";
        $slug = Str::slug($title);

        $content = "Grup kesenian asal Osaka, Jepang berkunjung ke sanggar seni Begog Kiyatdiharjo, Desa Mlese, Kecamatan Gantiwarno, Klaten sore tadi. Mereka jauh dari Jepang ke Klaten untuk belajar menabuh gamelan.\n\n"
            . "Seniman asal salah satu kota di Jepang itu jumlahnya sekitar 15 orang. Mereka yang berasal dari berbagai lintas profesi itu menabuh gamelan dan belajar nembang.\n\n"
            . "\"Grup namanya Margasari dari Osaka,\" ungkap Manami Nishi (50), seorang peserta kepada awak media, Rabu (20/8/2025) sore.\n\n"
            . "Manami yang seorang guru di Kyoto itu menceritakan dirinya dan rombongan belajar ke ISI (institut seni Indonesia). Kebetulan Pak Bowo dari sanggar Begog Kiyatdiharjo pernah ke Jepang.\n\n"
            . "\"Pak Bowo datang ke Jepang terus berkarya di sana, kali ini mau kegiatan di Jawa ya kita pengin ketemu sekaligus bermain, latihan di sini,\" kata Manami.\n\n"
            . "\"Ya saya senang sekali bisa bermain,\" imbuh Manami dengan bahasa Indonesia meski tidak fasih.\n\n"
            . "Y Subowo, pemilik sanggar menjelaskan grup gamelan dari Osaka Jepang itu bernama Margasari. Jumlahnya sekitar 15 orang yang khusus datang ke Jogja belajar gamelan.\n\n"
            . "\"Khusus ke Jogja, ke kampus ISI belajar gamelan. Kebetulan, saya sudah bekerja sama ke Osaka bulan Maret kemarin, ini tak ampirke (diminta mampir) ke desa saya untuk beraktivitas di sini,\" terang Subowo kepada wartawan.\n\n"
            . "Menurut Subowo, ke 15 orang yang datang itu bukan seniman profesional tetapi ada yang dosen, pekerja teknik, pekerja pabrik dan lainnya. Namun grup mereka sudah lama ada.\n\n"
            . "\"Grup ini sebenarnya sudah lama sekali, mereka sudah mengalami pergantian murid banyak sekali, sampai lima periode. Grup itu juga memiliki alat gamelan sendiri.\n\n"
            . "\"Grup ini sampai mempunyai dua perangkat gamelan, membeli patungan saking tertariknya dengan gamelan. Sebab menurut saya gamelan tidak sekadar hiburan, sarana pendidikan tapi terapi, sudah diakui UNESCO,\" kata Subowo.";

        $image_url = "articles/belajar-gamelan.jpg";

        // Download image from Detik.com and store it on the public disk
        try {
            $external_img = "https://awsimages.detik.net.id/community/media/visual/2025/08/20/belajar-gamelang-1755694525732_169.jpeg?w=1200";
            
            // Bypass potential SSL verify issues in local environments
            $context = stream_context_create([
                "ssl" => [
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                ]
            ]);
            $img_content = file_get_contents($external_img, false, $context);
            if ($img_content !== false) {
                Storage::disk('public')->put($image_url, $img_content);
            }
        } catch (\Exception $e) {
            // Ignore storage errors in seed
        }

        Article::updateOrCreate(
            ['slug' => $slug],
            [
                'title' => $title,
                'content' => $content,
                'image_url' => $image_url,
                'source_url' => 'https://www.detik.com/jateng/budaya/d-8071087/melihat-luwesnya-grup-seni-margasari-asal-jepang-menabuh-gamelan-di-klaten',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}
