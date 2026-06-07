<x-layouts.app :title="$page?->title ?? 'Blog & Promo'" :metaTitle="$page?->meta_title ?? null" :metaDescription="$page?->meta_description ?? null" :metaKeywords="$page?->meta_keywords ?? null">
    <x-slot:title>{{ $page?->meta_title ?? ($page?->title ?? 'Blog & Promo') }} - PO. Dinamis</x-slot>

    <!-- Header -->
    <section class="pt-32 pb-16 relative z-10 overflow-hidden {{ empty($page?->banner_image_path) ? 'bg-gray-50' : '' }}">
        @if(!empty($page?->banner_image_path))
            <div class="absolute inset-0 -z-10">
                <img src="{{ asset('storage/app/public/' . $page?->banner_image_path) }}" class="h-full w-full object-cover opacity-40" alt="Banner">
                <div class="absolute inset-0 bg-gradient-to-b from-white/80 to-gray-50/90"></div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">{{ $page?->title ?? 'Blog & Promo' }}</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ $page?->subtitle ?? 'Informasi terbaru, promo menarik, dan tips perjalanan wisata dari PO. Dinamis.' }}
            </p>
        </div>
    </section>

    <!-- Content from Admin -->
    @if(!empty(strip_tags($page?->content)))
    <section class="py-8 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-lg prose-red text-center">
            {!! $page->content !!}
        </div>
    </section>
    @endif

    <!-- Blog Posts -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($posts as $post)
                    <article class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden flex flex-col">
                        @if($post->image_path)
                            <img src="{{ asset('storage/app/public/' . $post->image_path) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex items-center text-sm text-gray-500 mb-4 gap-3">
                                <span>{{ $post->created_at->format('d M Y, H:i') }} WIB</span>
                                @if($post->author)
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        {{ $post->author->name }}
                                    </span>
                                @endif
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3">
                                <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-red-700 transition-colors">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            
                            <div class="text-gray-600 mb-4 line-clamp-3 prose prose-sm prose-red">
                                {!! strip_tags($post->content) !!}
                            </div>
                            
                            <div class="mt-auto">
                                <a href="{{ route('blog.show', $post->slug) }}" class="text-red-700 font-semibold hover:text-red-800 flex items-center gap-1">
                                    Baca Selengkapnya
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center text-gray-500 py-12">
                        Belum ada artikel atau promo yang diterbitkan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.app>
