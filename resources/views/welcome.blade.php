<x-layouts.app :title="$page->title ?? 'Beranda'" :metaTitle="$page->meta_title ?? null" :metaDescription="$page->meta_description ?? null" :metaKeywords="$page->meta_keywords ?? null">
    <x-slot:title>Beranda</x-slot>

    <!-- Hero Section -->
    <section class="relative overflow-hidden pt-16 pb-32">
        @if(!empty($page->banner_image_path))
            <div class="absolute inset-0 -z-10 h-full w-full object-cover">
                @php
                    $imgSrc = str_starts_with($page->banner_image_path, 'http') 
                                ? $page->banner_image_path 
                                : asset('storage/' . $page->banner_image_path);
                @endphp
                <img src="{{ $imgSrc }}" class="h-full w-full object-cover" alt="Banner">
                <div class="absolute inset-0 bg-black/60"></div>
            </div>
        @else
            <div class="absolute inset-0 bg-white -z-10"></div>
        @endif
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 md:mt-24 relative">
            <div class="text-center max-w-4xl mx-auto">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full {{ !empty($page->banner_image_path) ? 'bg-white/10 border-white/20 text-white' : 'bg-red-50 border-red-100 text-red-700' }} font-medium text-sm mb-8 animate-fade-in-up backdrop-blur-sm">
                    <span class="flex h-2 w-2 rounded-full {{ !empty($page->banner_image_path) ? 'bg-red-500' : 'bg-red-600' }}"></span>
                    {{ $page->subtitle ?? 'Melayani Setulus Hati' }}
                </div>
                
                <h1 class="text-5xl md:text-7xl font-bold tracking-tight {{ !empty($page->banner_image_path) ? 'text-white' : 'text-gray-900' }} mb-8 leading-tight">
                    {!! $page->title ?? 'Perjalanan Nyaman dengan <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-red-400">PO. Dinamis</span>' !!}
                </h1>
                
                <div class="text-xl {{ !empty($page->banner_image_path) ? 'text-gray-200' : 'text-gray-600' }} mb-10 max-w-2xl mx-auto prose {{ !empty($page->banner_image_path) ? 'prose-invert' : 'prose-red' }}">
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
                @php
                    $features = $page->extra_data['features'] ?? [
                        ['title' => 'Tepat Waktu', 'description' => 'Keberangkatan & kedatangan sesuai jadwal.', 'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'],
                        ['title' => 'Aman & Nyaman', 'description' => 'Armada prima dan pengemudi berpengalaman.', 'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>'],
                        ['title' => 'Fasilitas Premium', 'description' => 'Reclining seat, AC, Karaoke, dan Bantal.', 'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>'],
                    ];
                @endphp
                @foreach($features as $feature)
                <div class="bg-white rounded-2xl p-6 shadow-xl shadow-gray-200/50 border border-gray-100 flex items-center gap-4 hover:-translate-y-1 transition-transform duration-300">
                    <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center text-red-600 shrink-0">
                        @if(!empty($feature['icon']) && str_starts_with($feature['icon'], 'heroicon'))
                            <x-icon name="{{ $feature['icon'] }}" class="w-6 h-6" />
                        @elseif(!empty($feature['icon']))
                            {!! $feature['icon'] !!}
                        @else
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        @endif
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900">{{ $feature['title'] ?? '' }}</h3>
                        <p class="text-sm text-gray-500">{{ $feature['description'] ?? '' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Recommended Armadas Section -->
    @php
        $recommendedIds = $page->extra_data['recommended_armadas'] ?? [];
        $recommendedArmadas = \App\Models\Armada::whereIn('id', (array) $recommendedIds)->take(3)->get();
    @endphp
    @if($recommendedArmadas->count() > 0)
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-red-700 font-semibold tracking-wide uppercase mb-3">Bus Rekomendasi Kami</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Armada Terbaik Untuk Anda</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-{{ min($recommendedArmadas->count(), 3) }} gap-8">
                @foreach($recommendedArmadas as $bus)
                <div class="bg-white rounded-3xl overflow-hidden shadow-xl border border-gray-100 flex flex-col hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                    <div class="relative h-64 md:h-72">
                        @php
                            $imgSrc = str_starts_with($bus->image_path, 'http') 
                                        ? $bus->image_path 
                                        : asset('storage/' . $bus->image_path);
                        @endphp
                        <img src="{{ $imgSrc }}" alt="{{ $bus->name }}" class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute top-4 left-4 inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/90 text-red-700 font-bold text-xs backdrop-blur-sm shadow-sm">
                            <x-icon name="heroicon-s-star" class="w-3 h-3" />
                            Rekomendasi
                        </div>
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <h4 class="text-2xl font-extrabold text-gray-900 mb-3">{{ $bus->name }}</h4>
                        <div class="flex items-center gap-2 text-gray-700 mb-4 font-semibold">
                            <x-icon name="heroicon-o-users" class="w-5 h-5 text-red-600" />
                            Kapasitas: {{ $bus->capacity }}
                        </div>
                        <p class="text-gray-600 leading-relaxed flex-1 mb-6">
                            {{ $bus->description }}
                        </p>
                        <a href="{{ route('services') }}" class="inline-flex items-center justify-center w-full px-6 py-3 text-sm font-bold text-white bg-red-600 hover:bg-red-700 rounded-xl transition-colors">
                            Lihat Detail Armada
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Why Choose Us -->
    @php
        $whyChooseUs = $page->extra_data['why_choose_us'] ?? [];
    @endphp
    @if(count($whyChooseUs) > 0)
    <section class="py-24 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-red-500 font-semibold tracking-wide uppercase mb-3">Mengapa Pilih Kami</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-white">Keunggulan PO. Dinamis</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($whyChooseUs as $reason)
                <div class="bg-gray-800 rounded-2xl p-8 border border-gray-700 hover:border-red-500 transition-all duration-300">
                    <div class="w-12 h-12 bg-gray-900 rounded-xl flex items-center justify-center text-red-500 mb-6">
                        @if(!empty($reason['icon']) && str_starts_with($reason['icon'], 'heroicon'))
                            <x-icon name="{{ $reason['icon'] }}" class="w-6 h-6" />
                        @elseif(!empty($reason['icon']))
                            {!! $reason['icon'] !!}
                        @else
                            <span class="font-bold text-xl">{{ $loop->iteration }}</span>
                        @endif
                    </div>
                    <h4 class="text-xl font-bold text-white mb-4">{{ $reason['title'] ?? '' }}</h4>
                    <p class="text-gray-400 leading-relaxed">{{ $reason['description'] ?? '' }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif



    <!-- Gallery Section -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-red-700 font-semibold tracking-wide uppercase mb-3">Galeri Armada</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Dokumentasi Perjalanan Kami</h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($galleries->take(6) as $gallery)
                    <div class="rounded-2xl overflow-hidden shadow-lg group bg-gray-100 flex items-center justify-center">
                        @if(!empty($gallery->image_path))
                            <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-64 flex flex-col items-center justify-center text-gray-400 transform group-hover:scale-110 transition-transform duration-500">
                                <x-icon name="heroicon-o-truck" class="w-20 h-20 mb-2" />
                                <span class="font-medium text-sm text-gray-500">{{ $gallery->title }}</span>
                            </div>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-500 text-center col-span-full">Belum ada galeri armada yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Testimonial -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Apa Kata Penumpang?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($testimonials as $testi)
                    <div class="bg-red-50 rounded-2xl p-8 shadow-sm">
                        <div class="text-red-400 mb-4">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                        </div>
                        <p class="text-gray-700 mb-6 font-medium">"{{ $testi->content }}"</p>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ $testi->name }}</h4>
                            <p class="text-sm text-gray-500">{{ $testi->company ?? 'Penumpang' }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center col-span-full">Belum ada ulasan.</p>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.app>
