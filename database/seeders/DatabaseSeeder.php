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
        // Create Admin
        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin PO. Dinamis',
                'password' => Hash::make('password'),
            ]
        );

        // Create Settings
        $settings = [
            ['key' => 'site_title', 'value' => 'PO. Dinamis - Sewa Bus Pariwisata Premium', 'label' => 'Site Title'],
            ['key' => 'site_description', 'value' => 'Melayani sewa bus pariwisata eksekutif dengan fasilitas lengkap, aman, dan nyaman untuk keperluan wisata, ziarah, dan study tour.', 'label' => 'Site Description'],
            ['key' => 'site_keywords', 'value' => 'sewa bus, pariwisata, po dinamis, bus murah, ziarah, wisata', 'label' => 'Site Keywords'],
            ['key' => 'company_email', 'value' => 'hello@podinamis.co.id', 'label' => 'Company Email'],
            ['key' => 'company_phone', 'value' => '0800-1-BUS-DINAMIS', 'label' => 'Company Phone'],
            ['key' => 'company_address', 'value' => 'Jl. Raya Pariwisata No. 88, Semarang, Jawa Tengah', 'label' => 'Company Address'],
        ];
        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], ['value' => $setting['value'], 'label' => $setting['label']]);
        }

        // Create Pages
        Page::updateOrCreate(['slug' => 'home'], [
            'title' => 'Perjalanan Nyaman dengan <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-800">PO. Dinamis</span>',
            'subtitle' => 'Melayani Setulus Hati',
            'content' => 'Nikmati perjalanan aman, nyaman, dan tepat waktu ke berbagai destinasi di Indonesia dengan armada bus pariwisata eksekutif terbaru kami.'
        ]);

        Page::updateOrCreate(['slug' => 'about'], [
            'title' => 'Tentang Kami',
            'subtitle' => 'Mengenal lebih dekat PO. Dinamis, penyedia layanan bus pariwisata terpercaya sejak 2010.',
            'content' => '<p>PO. Dinamis didirikan dengan komitmen untuk memberikan layanan transportasi pariwisata yang aman, nyaman, dan terpercaya. Kami melayani berbagai kebutuhan perjalanan wisata Anda, mulai dari study tour, ziarah wali, hingga gathering perusahaan.</p><p>Armada kami dilengkapi dengan fasilitas premium untuk memastikan kenyamanan Anda sepanjang perjalanan. Dengan pengemudi yang berpengalaman dan ramah, kami siap mengantar Anda menuju destinasi impian dengan selamat dan menyenangkan.</p>'
        ]);

        // Create Armadas (Bus Mania)
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
            Armada::updateOrCreate(['name' => $bus['name']], $bus);
        }
    }
}
