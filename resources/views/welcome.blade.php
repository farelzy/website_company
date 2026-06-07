<x-layouts.app>
    <x-slot:title>Beranda</x-slot>

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-white pt-16 pb-32">
        @if(!empty($page->banner_image_path))
            <div class="absolute inset-0 -z-10 h-full w-full object-cover">
                <img src="{{ asset('storage/' . $page->banner_image_path) }}" class="h-full w-full object-cover opacity-20" alt="Banner">
                <div class="absolute inset-0 bg-white/80"></div>
            </div>
        @else
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-red-50 via-red-50/20 to-white -z-10"></div>
        @endif
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 md:mt-24 relative">
            <div class="text-center max-w-4xl mx-auto">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-50 border border-red-100 text-red-700 font-medium text-sm mb-8 animate-fade-in-up">
                    <span class="flex h-2 w-2 rounded-full bg-red-600"></span>
                    {{ $page->subtitle ?? 'Melayani Setulus Hati' }}
                </div>
                
                <h1 class="text-5xl md:text-7xl font-bold tracking-tight text-gray-900 mb-8 leading-tight">
                    {!! $page->title ?? 'Perjalanan Nyaman dengan <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-800">PO. Dinamis</span>' !!}
                </h1>
                
                <div class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto prose prose-red">
                    {!! $page->content ?? 'Nikmati perjalanan aman, nyaman, dan tepat waktu ke berbagai destinasi di Indonesia dengan armada bus pariwisata eksekutif terbaru kami.' !!}
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('services') }}" class="px-8 py-4 rounded-full bg-gradient-to-r from-red-600 to-red-800 text-white font-medium hover:shadow-lg hover:shadow-red-500/30 transition-all duration-300 transform hover:-translate-y-1">
                        Katalog Bus Pariwisata
                    </a>
                    <a href="{{ route('contact') }}" class="px-8 py-4 rounded-full bg-white text-gray-900 font-medium border border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition-all duration-300">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Features -->
    <section class="py-12 bg-white relative -mt-16 z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-6 shadow-xl shadow-gray-200/50 border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center text-red-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900">Tepat Waktu</h3>
                        <p class="text-sm text-gray-500">Keberangkatan & kedatangan sesuai jadwal.</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-xl shadow-gray-200/50 border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center text-red-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900">Aman & Nyaman</h3>
                        <p class="text-sm text-gray-500">Armada prima dan pengemudi berpengalaman.</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-xl shadow-gray-200/50 border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center text-red-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900">Fasilitas Premium</h3>
                        <p class="text-sm text-gray-500">Reclining seat, AC, Karaoke, dan Bantal.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-red-700 font-semibold tracking-wide uppercase mb-3">Galeri Armada</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Dokumentasi Perjalanan Kami</h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($galleries as $gallery)
                    <div class="rounded-2xl overflow-hidden shadow-lg group">
                        <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500">
                    </div>
                @empty
                    <!-- Placeholders from Unsplash -->
                    <div class="rounded-2xl overflow-hidden shadow-lg group">
                        <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?q=80&w=1000&auto=format&fit=crop" class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="rounded-2xl overflow-hidden shadow-lg group">
                        <img src="https://images.unsplash.com/photo-1494515843206-f3117d3f51b7?q=80&w=1000&auto=format&fit=crop" class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="rounded-2xl overflow-hidden shadow-lg group">
                        <img src="https://images.unsplash.com/photo-1570125909232-eb263c188f7e?q=80&w=1000&auto=format&fit=crop" class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500">
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.app>
