<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Page;

class DefaultWebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::truncate();

        $pages = [
            [
                'slug' => 'home',
                'navbar_title' => 'Home',
                'title' => 'Sewa Bus Terbaik & Nyaman',
                'subtitle' => 'Perjalanan Anda adalah prioritas kami.',
                'banner_image_path' => 'https://picsum.photos/1200/600',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
                'position' => 'hero',
                'order' => 1,
                'is_default' => true,
                'meta_title' => 'Sewa Bus Terbaik',
                'meta_description' => 'Layanan sewa bus profesional dan terpercaya.',
                'meta_keywords' => 'sewa bus, bus pariwisata',
                'template' => 'home',
            ],
            [
                'slug' => 'about-us',
                'navbar_title' => 'About Us',
                'title' => 'Tentang Perusahaan Kami',
                'subtitle' => 'Lebih dari 10 tahun melayani.',
                'banner_image_path' => 'https://picsum.photos/1200/400',
                'content' => '<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>',
                'position' => 'body',
                'order' => 2,
                'is_default' => true,
                'meta_title' => 'Tentang Kami',
                'meta_description' => 'Profil perusahaan sewa bus kami.',
                'meta_keywords' => 'profil bus, tentang kami',
                'template' => 'about',
            ],
            [
                'slug' => 'armada',
                'navbar_title' => 'Armada & Galeri',
                'title' => 'Pilihan Armada Kami',
                'subtitle' => 'Dari Big Bus hingga Elf, semua tersedia.',
                'banner_image_path' => 'https://picsum.photos/1200/400',
                'content' => '<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>',
                'position' => 'body',
                'order' => 3,
                'is_default' => true,
                'meta_title' => 'Armada Bus',
                'meta_description' => 'Galeri armada bus pariwisata yang lengkap.',
                'meta_keywords' => 'armada bus, big bus, medium bus',
                'template' => 'armada',
            ],
            [
                'slug' => 'kontak',
                'navbar_title' => 'Kontak',
                'title' => 'Hubungi Kami',
                'subtitle' => 'Reservasi 24/7.',
                'banner_image_path' => 'https://picsum.photos/1200/400',
                'content' => '<p>Hubungi kami melalui nomor WA: 08123456789 atau datang langsung ke garasi kami.</p>',
                'position' => 'footer',
                'order' => 4,
                'is_default' => true,
                'meta_title' => 'Kontak Sewa Bus',
                'meta_description' => 'Hubungi kami untuk reservasi bus.',
                'meta_keywords' => 'kontak sewa bus, reservasi',
                'template' => 'kontak',
                'extra_data' => [
                    'whatsapp_number' => '6281234567890',
                    'contact_phone' => '+62 812-3456-7890',
                    'contact_email' => 'info@sewabuskami.com',
                    'contact_address' => 'Jl. Raya Pariwisata No. 123, Kota Anda, Jawa Tengah',
                    'contact_hours' => 'Senin - Minggu, 24 Jam',
                    'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.24009665511!2d106.758713!3d-6.2297401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x100c5e82dd4b820!2sJakarta!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid'
                ],
            ]
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
