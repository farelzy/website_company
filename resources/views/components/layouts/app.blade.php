<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        @php
            $siteName = \App\Models\Setting::get('site_name', 'PO. Dinamis');
            $siteLogo = \App\Models\Setting::get('site_logo');
            $siteTitle = \App\Models\Setting::get('site_title', $siteName . ' - Sewa Bus Pariwisata Premium');
            $siteDesc = \App\Models\Setting::get('site_description', $siteName . ' melayani sewa bus pariwisata eksekutif dengan fasilitas lengkap, aman, dan nyaman untuk keperluan wisata, ziarah, dan study tour.');
            $siteKeywords = \App\Models\Setting::get('site_keywords', 'sewa bus pariwisata, bus pariwisata murah, po dinamis, bus ziarah, study tour');
            $siteEmail = \App\Models\Setting::get('company_email', 'hello@podinamis.co.id');
            $sitePhone = \App\Models\Setting::get('company_phone', '0800-1-BUS-DINAMIS');
            $siteAddress = \App\Models\Setting::get('company_address', 'Jl. Raya Bus Dinamis No. 88, Jawa Tengah');
        @endphp

        <title>{{ $title ?? $siteTitle }}</title>
        <meta name="description" content="{{ $siteDesc }}">
        <meta name="keywords" content="{{ $siteKeywords }}">
        <meta name="author" content="PO. Dinamis">
        
        <!-- Open Graph / SEO -->
        <meta property="og:title" content="{{ $title ?? $siteTitle }}">
        <meta property="og:description" content="{{ $siteDesc }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Styles / Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
                        },
                        animation: {
                            'fade-in-up': 'fade-in-up 1s ease-out',
                            'blob': 'blob 7s infinite',
                        },
                        keyframes: {
                            'fade-in-up': {
                                '0%': { opacity: '0', transform: 'translateY(20px)' },
                                '100%': { opacity: '1', transform: 'translateY(0)' },
                            },
                            blob: {
                                '0%': { transform: 'translate(0px, 0px) scale(1)' },
                                '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                                '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                                '100%': { transform: 'translate(0px, 0px) scale(1)' },
                            }
                        }
                    }
                }
            }
        </script>
        <style>
            .animation-delay-2000 {
                animation-delay: 2s;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900 selection:bg-red-700 selection:text-white">
        
        <!-- Navbar -->
        <header class="fixed w-full top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 shadow-sm transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer group">
                        @if($siteLogo)
                            <img src="{{ Storage::url($siteLogo) }}" alt="{{ $siteName }}" class="h-10 w-auto rounded-xl shadow-lg transition-all duration-300 transform group-hover:scale-105">
                        @else
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white font-bold text-xl shadow-lg group-hover:shadow-red-500/30 transition-all duration-300 transform group-hover:scale-105">
                                {{ substr($siteName, 0, 1) }}
                            </div>
                        @endif
                        <span class="font-bold text-xl tracking-tight text-gray-900">{{ $siteName }}</span>
                    </div>

                    <!-- Desktop Menu -->
                    <nav class="hidden md:flex space-x-8">
                        <a href="{{ route('home') }}" class="text-gray-600 hover:text-red-700 font-medium transition-colors">Beranda</a>
                        <a href="{{ route('about') }}" class="text-gray-600 hover:text-red-700 font-medium transition-colors">Tentang Kami</a>
                        <a href="{{ route('services') }}" class="text-gray-600 hover:text-red-700 font-medium transition-colors">Armada & Layanan</a>
                        <a href="{{ route('blog') }}" class="text-gray-600 hover:text-red-700 font-medium transition-colors">Blog & Promo</a>
                        <a href="{{ route('contact') }}" class="text-gray-600 hover:text-red-700 font-medium transition-colors">Kontak</a>
                    </nav>

                    <!-- CTA Button -->
                    <div class="hidden md:flex items-center">
                        <a href="{{ route('contact') }}" class="px-6 py-2.5 rounded-full bg-red-700 text-white font-medium hover:bg-red-800 transition-all duration-300 shadow-md hover:shadow-red-500/30 transform hover:-translate-y-0.5">
                            Sewa Sekarang
                        </a>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden flex items-center">
                        <button type="button" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="min-h-screen pt-20">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-gray-300 py-12 border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center gap-2 mb-4">
                            @if($siteLogo)
                                <img src="{{ Storage::url($siteLogo) }}" alt="{{ $siteName }}" class="h-8 w-auto rounded-lg">
                            @else
                                <div class="w-8 h-8 rounded-lg bg-red-700 flex items-center justify-center text-white font-bold text-lg">{{ substr($siteName, 0, 1) }}</div>
                            @endif
                            <span class="font-bold text-xl text-white">{{ $siteName }}</span>
                        </div>
                        <p class="text-gray-400 text-sm max-w-sm mb-6">
                            {{ $siteDesc }}
                        </p>
                        <div class="flex flex-col space-y-2 text-sm text-gray-400 mb-6">
                            <p>Email: {{ $siteEmail }}</p>
                            <p>Telp: {{ $sitePhone }}</p>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold mb-4">Layanan Kami</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ route('about') }}" class="hover:text-red-400 transition-colors">Tentang PO. Dinamis</a></li>
                            <li><a href="{{ route('services') }}" class="hover:text-red-400 transition-colors">Armada Pariwisata</a></li>
                            <li><a href="{{ route('blog') }}" class="hover:text-red-400 transition-colors">Artikel & Promo</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:text-red-400 transition-colors">Hubungi Kami</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold mb-4">Legal</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="hover:text-red-400 transition-colors">Syarat & Ketentuan Sewa</a></li>
                            <li><a href="#" class="hover:text-red-400 transition-colors">Kebijakan Privasi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mt-12 pt-8 border-t border-gray-800 text-sm text-center">
                    <p>&copy; {{ date('Y') }} {{ $siteName }}. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
