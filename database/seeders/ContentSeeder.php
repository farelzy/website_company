<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Models\Armada;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\Gallery;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // ===== SETTINGS =====
        Setting::truncate();
        $settings = [
            // General
            ['key' => 'company_name',   'value' => 'SewaBus Pariwisata',  'group' => 'general', 'label' => 'Nama Perusahaan'],
            ['key' => 'company_tagline','value' => 'Mitra Perjalanan Terpercaya Anda', 'group' => 'general', 'label' => 'Tagline'],
            ['key' => 'company_logo',   'value' => '',                     'group' => 'general', 'label' => 'Logo URL'],
            // Contact is now handled in the Kontak page extra_data
            // Stats
            ['key' => 'stat_years',     'value' => '10+',                  'group' => 'stats', 'label' => 'Tahun Pengalaman'],
            ['key' => 'stat_trips',     'value' => '500+',                 'group' => 'stats', 'label' => 'Perjalanan Sukses'],
            ['key' => 'stat_units',     'value' => '30+',                  'group' => 'stats', 'label' => 'Unit Armada'],
            ['key' => 'stat_customers', 'value' => '1000+',                'group' => 'stats', 'label' => 'Pelanggan Puas'],
        ];
        foreach ($settings as $s) {
            Setting::create($s);
        }

        // ===== ARMADA =====
        Armada::truncate();
        $armadas = [
            [
                'name' => 'Legacy SR3 Suites Class', 
                'capacity' => '22 Seat (Sleeper)', 
                'image_path' => null,
                'price_label' => 'Mulai Rp 5.500.000/hari', 
                'description' => 'Bus premium model sleeper untuk perjalanan jauh yang super mewah dan privasi terjamin. Cocok untuk eksekutif atau perjalanan VVIP.',
                'features' => ['Sleeper Seat', 'AVOD', 'Toilet', 'Smoking Area', 'Bantal & Selimut', 'Dispenser'], 
                'order' => 1, 
                'is_active' => true
            ],
        ];
        foreach ($armadas as $a) {
            Armada::create($a);
        }

        // ===== TESTIMONIALS =====
        Testimonial::truncate();
        $testimonials = [
            ['name' => 'Budi Santoso',  'role' => 'Wisata Keluarga',        'content' => 'Pelayanannya luar biasa! Bus bersih, sopir ramah, dan tepat waktu. Pasti bakal pesan lagi.', 'rating' => 5, 'is_active' => true],
            ['name' => 'Dewi Rahmawati','role' => 'Koordinator Sekolah',    'content' => 'Kami memesan 3 bus untuk study tour. Sangat memuaskan dan harganya pas di anggaran.', 'rating' => 5, 'is_active' => true],
            ['name' => 'Hendra Laksana','role' => 'Perusahaan Manufaktur',  'content' => 'Sudah berlangganan 2 tahun untuk karyawan. Profesional dan amanah.', 'rating' => 5, 'is_active' => true],
        ];
        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }

        // ===== TEAM MEMBERS =====
        TeamMember::truncate();
        $team = [
            ['name' => 'Bapak Ahmad Fauzi', 'role' => 'Direktur Utama',       'experience' => '15 Tahun Pengalaman', 'order' => 1, 'is_active' => true],
            ['name' => 'Ibu Sari Handayani','role' => 'Manajer Operasional',  'experience' => '10 Tahun Pengalaman', 'order' => 2, 'is_active' => true],
            ['name' => 'Bapak Hendi Kurnia','role' => 'Kepala Armada',        'experience' => '12 Tahun Pengalaman', 'order' => 3, 'is_active' => true],
        ];
        foreach ($team as $t) {
            TeamMember::create($t);
        }

        // ===== GALLERIES =====
        Gallery::truncate();
        for ($i = 1; $i <= 6; $i++) {
            Gallery::create([
                'title'      => "Galeri Foto $i",
                'image_path' => null,
                'order'      => $i,
                'is_active'  => true,
            ]);
        }
    }
}
