<x-layouts.app>
    <x-slot:title>{{ $page->meta_title ?? $page->title }} - PO. Dinamis</x-slot>

    <!-- Header -->
    <section class="pt-32 pb-16 bg-gray-50 relative">
        @if(!empty($page->banner_image_path))
            <div class="absolute inset-0 -z-10 h-full w-full object-cover">
                <img src="{{ asset('storage/' . $page->banner_image_path) }}" class="h-full w-full object-cover opacity-20" alt="Banner">
                <div class="absolute inset-0 bg-white/80"></div>
            </div>
        @endif
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">{{ $page->title }}</h1>
            @if($page->subtitle)
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ $page->subtitle }}
                </p>
            @endif
        </div>
    </section>

    <!-- Content -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg prose-red max-w-none">
                {!! $page->content !!}
            </div>
        </div>
    </section>
</x-layouts.app>
