<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Setting;
use App\Models\Armada;
use App\Models\Page;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Super Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Superadmin',
                'username' => 'WebsiteBusIndo3108*!',
                'password' => Hash::make('SukAfotOBUsIndoNesia3108*@!'),
                'role' => 'superadmin',
                'is_active' => true,
            ]
        );

        // Create Settings
        $settings = [
            ['key' => 'site_title', 'value' => 'PO. Dinamis - Sewa Bus Pariwisata Premium', 'label' => 'Site Title'],
            ['key' => 'site_description', 'value' => 'Melayani sewa bus pariwisata eksekutif dengan fasilitas lengkap, aman, dan nyaman untuk keperluan wisata, ziarah, dan study tour.', 'label' => 'Site Description'],
            ['key' => 'site_keywords', 'value' => 'sewa bus, pariwisata, po dinamis, bus murah, ziarah, wisata', 'label' => 'Site Keywords'],
        ];
        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], ['value' => $setting['value'], 'label' => $setting['label']]);
        }

        // Create Pages
        Page::updateOrCreate(['slug' => 'home'], [
            'title' => 'Perjalanan Nyaman dengan <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-800">PO. Dinamis</span>',
            'subtitle' => 'Melayani Setulus Hati',
            'content' => 'Nikmati perjalanan aman, nyaman, dan tepat waktu ke berbagai destinasi di Indonesia dengan armada bus pariwisata eksekutif terbaru kami.',
            'extra_data' => [
                'features' => [
                    ['title' => 'Tepat Waktu', 'description' => 'Keberangkatan & kedatangan sesuai jadwal.', 'icon' => 'heroicon-o-clock'],
                    ['title' => 'Aman & Nyaman', 'description' => 'Armada prima dan pengemudi berpengalaman.', 'icon' => 'heroicon-o-shield-check'],
                    ['title' => 'Fasilitas Premium', 'description' => 'Reclining seat, AC, Karaoke, dan Bantal.', 'icon' => 'heroicon-o-star'],
                ],
                'why_choose_us' => [
                    ['title' => 'Armada Terbaru & Terawat', 'description' => 'Kami selalu melakukan peremajaan armada dan servis rutin untuk memastikan keamanan serta kenyamanan Anda selama di perjalanan.', 'icon' => 'heroicon-o-truck'],
                    ['title' => 'Kru Berpengalaman', 'description' => 'Sopir dan kru kami telah terlatih, memiliki jam terbang tinggi, serta berdedikasi melayani setulus hati.', 'icon' => 'heroicon-o-users'],
                    ['title' => 'Harga Kompetitif', 'description' => 'Dapatkan layanan fasilitas premium dan mewah dengan harga yang sangat bersaing dan transparan.', 'icon' => 'heroicon-o-currency-dollar'],
                    ['title' => 'Pemesanan Mudah', 'description' => 'Tim layanan pelanggan kami siap membantu proses reservasi Anda dengan cepat, kapan pun Anda butuhkan.', 'icon' => 'heroicon-o-phone'],
                ]
            ]
        ]);

        Page::updateOrCreate(['slug' => 'about-us'], [
            'title' => 'Tentang Kami',
            'subtitle' => 'Mengenal lebih dekat PO. Dinamis, penyedia layanan bus pariwisata terpercaya sejak 2010.',
            'content' => '<p>PO. Dinamis didirikan dengan komitmen untuk memberikan layanan transportasi pariwisata yang aman, nyaman, dan terpercaya.</p>',
            'extra_data' => [
                'visi' => 'Menjadi perusahaan penyedia jasa transportasi pariwisata terbaik, teraman, dan paling nyaman di Indonesia, yang senantiasa mengutamakan kepuasan pelanggan melalui pelayanan sepenuh hati.',
                'misi' => '<ul><li>Menyediakan armada bus pariwisata yang selalu prima, bersih, dan berfasilitas lengkap.</li><li>Mengedepankan keselamatan, kenyamanan, dan ketepatan waktu dalam setiap perjalanan.</li><li>Memberikan pelayanan terbaik dan profesional dari seluruh kru dan staf.</li></ul>'
            ]
        ]);

        Page::updateOrCreate(['slug' => 'armada'], [
            'title' => 'Armada & Layanan',
            'subtitle' => 'Pilihan armada bus pariwisata terbaik untuk segala kebutuhan perjalanan Anda.',
            'content' => '<p>Kami menyediakan berbagai tipe bus mulai dari Hiace hingga Big Bus SHD.</p>'
        ]);

        Page::updateOrCreate(['slug' => 'kontak'], [
            'title' => 'Kontak Kami',
            'subtitle' => 'Hubungi tim kami untuk konsultasi dan pemesanan sewa bus pariwisata.',
            'content' => '<p>Layanan pelanggan kami siap melayani Anda 24/7.</p>',
            'extra_data' => [
                'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126514.86470438313!2d110.66986505051917!3d-7.558359489279093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a16627cd1aa63%3A0x6b4fb6c9ecda4210!2sKartasura%2C%20Sukoharjo%20Regency%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1717812000000!5m2!1sen!2sid',
            ]
        ]);

        Page::updateOrCreate(['slug' => 'blog'], [
            'title' => 'Blog & Promo',
            'subtitle' => 'Informasi terbaru, promo menarik, dan tips perjalanan wisata dari PO. Dinamis.',
            'content' => '<p>Dapatkan berbagai informasi menarik dan penawaran spesial dari kami.</p>'
        ]);

        // ===== ARMADAS =====
        Armada::truncate();
        $armadas = [
            [
                'name' => 'Legacy SR3 Suites Class',
                'type' => 'Premium Class',
                'capacity' => '22 Seat (Sleeper)',
                'price_label' => 'Mulai Rp 5.500.000/hari',
                'description' => 'Bus premium model sleeper untuk perjalanan jauh yang super mewah dan privasi terjamin. Cocok untuk eksekutif atau perjalanan VVIP.',
                'features' => ['Sleeper Seat', 'AVOD', 'Toilet', 'Smoking Area', 'Bantal & Selimut', 'Dispenser'],
            ],
            [
                'name' => 'Jetbus 5 SHD (Super High Decker)',
                'type' => 'Big Bus',
                'capacity' => '50 Seat (2-2)',
                'price_label' => 'Mulai Rp 3.500.000/hari',
                'description' => 'Bus pariwisata eksekutif dengan kabin luas dan lega. Bagasi sangat luas sehingga cocok untuk study tour dan perjalanan wisata rombongan besar.',
                'features' => ['AC', 'Reclining Seat 2-2', 'TV LCD', 'Karaoke/Audio', 'Bantal', 'USB Charger'],
            ],
            [
                'name' => 'Tourista Medium Bus',
                'type' => 'Medium Bus',
                'capacity' => '31 Seat',
                'price_label' => 'Mulai Rp 2.000.000/hari',
                'description' => 'Bus ukuran sedang yang cocok untuk rombongan keluarga besar atau acara kantor. Sangat lincah menembus jalanan wisata pegunungan.',
                'features' => ['AC', 'Reclining Seat 2-2', 'Audio/Karaoke', 'Bagasi Samping'],
            ],
            [
                'name' => 'Toyota Hiace Premio',
                'type' => 'Mini Bus / Hiace',
                'capacity' => '14 Seat',
                'price_label' => 'Mulai Rp 1.200.000/hari',
                'description' => 'Minibus elegan, irit, dan lincah. Solusi terbaik untuk perjalanan rombongan kecil dengan rasa aman sekelas VIP.',
                'features' => ['AC', 'Reclining Seat', 'Audio', 'Kabin Luas'],
            ],
        ];

        foreach ($armadas as $bus) {
            Armada::create($bus);
        }

        // ===== TESTIMONIALS =====
        \App\Models\Testimonial::truncate();
        $testimonials = [
            ['name' => 'Budi Santoso',  'role' => 'Wisata Keluarga',        'content' => 'Pelayanannya luar biasa! Bus bersih, sopir ramah, dan tepat waktu. Pasti bakal pesan lagi.', 'rating' => 5, 'is_active' => true],
            ['name' => 'Dewi Rahmawati','role' => 'Koordinator Sekolah',    'content' => 'Kami memesan 3 bus untuk study tour. Sangat memuaskan dan harganya pas di anggaran.', 'rating' => 5, 'is_active' => true],
            ['name' => 'Hendra Laksana','role' => 'Perusahaan Manufaktur',  'content' => 'Sudah berlangganan 2 tahun untuk karyawan. Profesional dan amanah.', 'rating' => 5, 'is_active' => true],
        ];
        foreach ($testimonials as $t) {
            \App\Models\Testimonial::create($t);
        }

        // ===== TEAM MEMBERS =====
        \App\Models\TeamMember::truncate();
        $team = [
            ['name' => 'Bapak Ahmad Fauzi', 'role' => 'Direktur Utama',       'experience' => '15 Tahun Pengalaman', 'order' => 1, 'is_active' => true],
            ['name' => 'Ibu Sari Handayani','role' => 'Manajer Operasional',  'experience' => '10 Tahun Pengalaman', 'order' => 2, 'is_active' => true],
            ['name' => 'Bapak Hendi Kurnia','role' => 'Kepala Armada',        'experience' => '12 Tahun Pengalaman', 'order' => 3, 'is_active' => true],
        ];
        foreach ($team as $t) {
            \App\Models\TeamMember::create($t);
        }

        // ===== GALLERIES =====
        \App\Models\Gallery::truncate();
        \App\Models\Gallery::create([
            'title'      => "Galeri Armada",
            'image_path' => '',
            'order'      => 1,
            'is_active'  => true,
        ]);
    }
}
