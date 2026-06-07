<x-layouts.app>
    <x-slot:title>{{ $post->meta_title ?? $post->title }} - PO. Dinamis</x-slot>

    <!-- Header -->
    <section class="pt-32 pb-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="text-red-600 font-semibold mb-4 flex items-center justify-center gap-4">
                <span>{{ $post->created_at->format('d M Y, H:i') }} WIB</span>
                @if($post->author)
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        {{ $post->author->name }}
                    </span>
                @endif
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">{{ $post->title }}</h1>
        </div>
    </section>

    <!-- Content -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($post->image_path)
                <div class="mb-12 rounded-2xl overflow-hidden shadow-lg">
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover">
                </div>
            @endif

            <div class="prose prose-lg prose-red max-w-none">
                {!! $post->content !!}
            </div>

            <div class="mt-12 pt-8 border-t border-gray-100 flex justify-center">
                <a href="{{ route('blog') }}" class="text-red-700 font-semibold hover:text-red-800 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Blog
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
