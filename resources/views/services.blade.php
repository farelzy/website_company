<x-layouts.app :title="$page->title ?? 'Armada & Layanan'" :metaTitle="$page->meta_title ?? null" :metaDescription="$page->meta_description ?? null" :metaKeywords="$page->meta_keywords ?? null">
    <x-slot:title>{{ $page->meta_title ?? ($page->title ?? 'Armada Pariwisata') }} - PO. Dinamis</x-slot>

    <!-- Header -->
    <section class="pt-32 pb-16 relative z-10 overflow-hidden {{ empty($page->banner_image_path) ? 'bg-gray-50' : '' }}">
        @if(!empty($page->banner_image_path))
            <div class="absolute inset-0 -z-10">
                <img src="{{ asset('storage/' . $page->banner_image_path) }}" class="h-full w-full object-cover opacity-40" alt="Banner">
                <div class="absolute inset-0 bg-gradient-to-b from-white/80 to-gray-50/90"></div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">{{ $page->title ?? 'Katalog Armada Pariwisata' }}</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ $page->subtitle ?? 'Pilihan bus pariwisata terbaik dari PO. Dinamis untuk perjalanan wisata, ziarah, dan study tour Anda.' }}
            </p>
        </div>
    </section>

    <!-- Content from Admin -->
    @if(!empty(strip_tags($page->content)))
    <section class="py-8 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-lg prose-red text-center">
            {!! $page->content !!}
        </div>
    </section>
    @endif

    <!-- Fleet / Armada -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($armadas as $bus)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 group">
                        <div class="relative h-64 bg-gray-200 overflow-hidden">
                            @if($bus->image_path)
                                <img src="{{ asset('storage/' . $bus->image_path) }}" alt="{{ $bus->name }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            @else
                                <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            @endif
                            <div class="absolute top-4 right-4 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                {{ $bus->type ?? 'Big Bus' }}
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $bus->name }}</h3>
                            <p class="text-red-700 font-semibold mb-4">Kapasitas: {{ $bus->capacity ?? '50' }} Kursi</p>
                            <div class="text-gray-600 text-sm mb-6 line-clamp-3">
                                {{ $bus->description ?? 'Bus pariwisata eksekutif dengan fasilitas lengkap untuk kenyamanan maksimal penumpang.' }}
                            </div>
                            
                            @if($bus->price_label)
                                <div class="mb-4 p-3 bg-red-50 rounded-xl">
                                    <span class="text-sm text-red-800 block">Harga Sewa</span>
                                    <span class="text-lg font-bold text-red-600">{{ $bus->price_label }}</span>
                                </div>
                            @endif
                            
                            @if($bus->features)
                                <div class="mb-6">
                                    <h4 class="text-sm font-semibold text-gray-900 mb-2">Fasilitas:</h4>
                                    <div class="flex flex-wrap gap-2">
                                        @php $facilities = is_array($bus->features) ? $bus->features : explode(',', $bus->features); @endphp
                                        @foreach($facilities as $facility)
                                            <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">{{ trim($facility) }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            
                            <a href="{{ route('contact') }}" class="block w-full text-center px-4 py-3 bg-red-50 text-red-700 font-medium rounded-xl hover:bg-red-600 hover:text-white transition-colors">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500 py-12">
                        Belum ada armada bus yang ditambahkan dari panel Admin.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.app>
