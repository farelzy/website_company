<x-layouts.app :title="$page->title ?? 'Hubungi Kami'" :metaTitle="$page->meta_title ?? null" :metaDescription="$page->meta_description ?? null" :metaKeywords="$page->meta_keywords ?? null">
    <x-slot:title>{{ $page->meta_title ?? ($page->title ?? 'Kontak Kami') }} - PO. Dinamis</x-slot>

    <!-- Header -->
    <section class="pt-32 pb-16 relative z-10 overflow-hidden {{ empty($page->banner_image_path) ? 'bg-gray-50' : '' }}">
        @if(!empty($page->banner_image_path))
            <div class="absolute inset-0 -z-10">
                <img src="{{ asset('storage/app/public/' . $page->banner_image_path) }}" class="h-full w-full object-cover opacity-40" alt="Banner">
                <div class="absolute inset-0 bg-gradient-to-b from-white/80 to-gray-50/90"></div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">{{ $page->title ?? 'Hubungi Kami' }}</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ $page->subtitle ?? 'Punya pertanyaan tentang sewa bus pariwisata? Tim kami siap membantu Anda 24/7.' }}
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

    <!-- Contact Content -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                <!-- Info -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Informasi Kontak</h2>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center text-red-600 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 text-lg">Kantor Pusat & Garasi</h3>
                                <p class="text-gray-600 mt-1">{{ $page->extra_data['contact_address'] ?? 'Jl. Raya Bus Dinamis No. 88, Jawa Tengah' }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center text-red-600 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 text-lg">Telepon / WhatsApp</h3>
                                <p class="text-gray-600 mt-1">{{ $page->extra_data['contact_phone'] ?? '0800-1-BUS-DINAMIS' }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center text-red-600 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 text-lg">Email</h3>
                                <p class="text-gray-600 mt-1">{{ $page->extra_data['contact_email'] ?? 'hello@podinamis.co.id' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 p-8 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Kirim Pesan atau Pertanyaan</h2>
                    
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-50 text-green-700 rounded-xl border border-green-200">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border-gray-300 bg-gray-50 focus:border-red-500 focus:ring-red-500 outline-none focus:bg-white transition-colors">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">No. HP / WhatsApp (atau Email)</label>
                            <input type="text" name="phone" required class="w-full px-4 py-3 rounded-xl border-gray-300 bg-gray-50 focus:border-red-500 focus:ring-red-500 outline-none focus:bg-white transition-colors">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Bus</label>
                            <select name="type" required class="w-full px-4 py-3 rounded-xl border-gray-300 bg-gray-50 focus:border-red-500 focus:ring-red-500 outline-none focus:bg-white transition-colors">
                                <option value="Big Bus (50 Seat)">Big Bus (50 Seat)</option>
                                <option value="Medium Bus (31 Seat)">Medium Bus (31 Seat)</option>
                                <option value="Minibus / Hiace (14 Seat)">Minibus / Hiace (14 Seat)</option>
                                <option value="Belum Tahu / Konsultasi">Belum Tahu / Konsultasi</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tujuan</label>
                            <input type="text" name="destination" required class="w-full px-4 py-3 rounded-xl border-gray-300 bg-gray-50 focus:border-red-500 focus:ring-red-500 outline-none focus:bg-white transition-colors" placeholder="Contoh: Jogja, Bali, dll.">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Berangkat</label>
                            <input type="date" name="departure_date" required class="w-full px-4 py-3 rounded-xl border-gray-300 bg-gray-50 focus:border-red-500 focus:ring-red-500 outline-none focus:bg-white transition-colors">
                        </div>
                        <button type="submit" class="w-full py-4 bg-gradient-to-r from-red-600 to-red-800 text-white rounded-xl font-bold hover:shadow-lg hover:shadow-red-500/30 transition-all duration-300">
                            Kirim Pesan via WhatsApp
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps -->
    @if(!empty($page->extra_data['google_maps_embed']))
    <section class="w-full h-96 bg-gray-200">
        <iframe src="{{ $page->extra_data['google_maps_embed'] }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    @endif
</x-layouts.app>
