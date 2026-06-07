<x-layouts.app>
    <x-slot:title>Tentang Kami - PO. Dinamis</x-slot>

    <!-- Header -->
    <section class="pt-32 pb-16 bg-gray-50 relative">
        @if(!empty($page->banner_image_path))
            <div class="absolute inset-0 -z-10 h-full w-full object-cover">
                <img src="{{ asset('storage/' . $page->banner_image_path) }}" class="h-full w-full object-cover opacity-20" alt="Banner">
                <div class="absolute inset-0 bg-white/80"></div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">{{ $page->title ?? 'Tentang Kami' }}</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ $page->subtitle ?? 'Mengenal lebih dekat PO. Dinamis, penyedia layanan bus pariwisata terpercaya.' }}
            </p>
        </div>
    </section>

    <!-- Content -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-lg prose-red">
            {!! $page->content ?? '<p>PO. Dinamis didirikan dengan komitmen untuk memberikan layanan transportasi pariwisata yang aman, nyaman, dan terpercaya. Kami melayani berbagai kebutuhan perjalanan wisata Anda, mulai dari study tour, ziarah wali, hingga gathering perusahaan.</p><p>Armada kami dilengkapi dengan fasilitas premium untuk memastikan kenyamanan Anda sepanjang perjalanan.</p>' !!}
        </div>
    </section>

    <!-- Visi & Misi -->
    <section class="py-16 bg-red-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Visi -->
                <div class="bg-white rounded-2xl p-8 shadow-xl shadow-gray-200/50 border border-gray-100">
                    <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center text-red-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Visi Kami</h2>
                    <div class="text-gray-600 leading-relaxed prose prose-sm prose-red">
                        {!! $page->extra_data['visi'] ?? 'Menjadi perusahaan penyedia jasa transportasi pariwisata terbaik, teraman, dan paling nyaman di Indonesia, yang senantiasa mengutamakan kepuasan pelanggan melalui pelayanan sepenuh hati.' !!}
                    </div>
                </div>
                <!-- Misi -->
                <div class="bg-white rounded-2xl p-8 shadow-xl shadow-gray-200/50 border border-gray-100">
                    <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center text-red-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Misi Kami</h2>
                    <div class="text-gray-600 leading-relaxed prose prose-sm prose-red">
                        {!! $page->extra_data['misi'] ?? '<ul><li>Menyediakan armada bus pariwisata yang selalu prima, bersih, dan berfasilitas lengkap.</li><li>Mengedepankan keselamatan, kenyamanan, dan ketepatan waktu dalam setiap perjalanan.</li><li>Memberikan pelayanan terbaik dan profesional dari seluruh kru dan staf.</li></ul>' !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kru / Team -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Kru & Pengemudi Kami</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                @forelse($team as $member)
                    <div class="bg-white rounded-xl shadow p-6 text-center">
                        @if($member->photo_path)
                            <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                        @else
                            <div class="w-24 h-24 rounded-full bg-gray-200 mx-auto mb-4 flex items-center justify-center text-gray-400">
                                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            </div>
                        @endif
                        <h3 class="font-bold text-gray-900">{{ $member->name }}</h3>
                        <p class="text-red-600 text-sm font-medium">{{ $member->role }}</p>
                        @if($member->experience)
                            <p class="text-gray-500 text-xs mt-2">{{ $member->experience }}</p>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-500 text-center col-span-full">Data kru belum ditambahkan.</p>
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
                    <div class="bg-red-50 rounded-2xl p-8">
                        <div class="text-red-400 mb-4">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                        </div>
                        <p class="text-gray-700 mb-6">"{{ $testi->content }}"</p>
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
