<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $page = \App\Models\Page::where('slug', 'home')->first();
    $galleries = \App\Models\Gallery::latest()->take(6)->get();
    $testimonials = \App\Models\Testimonial::all();
    return view('welcome', compact('page', 'galleries', 'testimonials'));
})->name('home');

Route::get('/about', function () {
    $page = \App\Models\Page::where('slug', 'about-us')->first();
    $team = \App\Models\TeamMember::all();
    return view('about', compact('page', 'team'));
})->name('about');

Route::get('/services', function () {
    $page = \App\Models\Page::where('slug', 'armada')->first();
    $armadas = \App\Models\Armada::all();
    return view('services', compact('page', 'armadas'));
})->name('services');

Route::get('/contact', function () {
    $page = \App\Models\Page::where('slug', 'kontak')->first();
    return view('contact', compact('page'));
})->name('contact');

Route::get('/blog', function () {
    $page = \App\Models\Page::where('slug', 'blog')->first();
    $posts = \App\Models\Post::where('is_published', true)
        ->where(function($query) {
            $query->whereNull('published_at')->orWhere('published_at', '<=', now());
        })
        ->latest()->get();
    return view('blog', compact('page', 'posts'));
})->name('blog');

Route::get('/blog/{slug}', function ($slug) {
    $post = \App\Models\Post::where('slug', $slug)
        ->where('is_published', true)
        ->where(function($query) {
            $query->whereNull('published_at')->orWhere('published_at', '<=', now());
        })
        ->firstOrFail();
    return view('blog-detail', compact('post'));
})->name('blog.show');

Route::post('/contact/submit', function (\Illuminate\Http\Request $request) {
    \App\Models\Inquiry::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'bus_type' => $request->type,
        'destination' => $request->destination,
        'departure_date' => $request->departure_date,
    ]);

    $page = \App\Models\Page::where('slug', 'kontak')->first();
    $adminPhone = $page?->extra_data['whatsapp_number'] ?? \App\Models\Setting::get('company_phone', '6281234567890');
    
    // Clean phone number (remove non-digits)
    $adminPhone = preg_replace('/[^0-9]/', '', $adminPhone);
    if (str_starts_with($adminPhone, '0')) {
        $adminPhone = '62' . substr($adminPhone, 1);
    }
    
    $text = "Halo PO. Dinamis, saya *{$request->name}*.\n";
    $text .= "Saya ingin menyewa bus dengan detail berikut:\n";
    $text .= "- Jenis Bus: *{$request->type}*\n";
    $text .= "- Tujuan: *{$request->destination}*\n";
    $text .= "- Tanggal: *{$request->departure_date}*";
    
    $waUrl = "https://wa.me/{$adminPhone}?text=" . urlencode($text);

    return redirect()->away($waUrl);
})->name('contact.submit');

Route::get('/{slug}', function ($slug) {
    // Redirect known slugs to their static routes if they differ
    $redirects = [
        'home' => '/',
        'about-us' => '/about',
        'armada' => '/services',
        'kontak' => '/contact',
        'blog' => '/blog',
    ];

    if (array_key_exists($slug, $redirects)) {
        return redirect($redirects[$slug]);
    }

    $page = \App\Models\Page::where('slug', $slug)->firstOrFail();
    $template = $page->template ?? 'default';

    if (view()->exists($template)) {
        return view($template, compact('page'));
    }

    // Fallback to default template, not welcome, to avoid missing variables
    return view('default', compact('page'));
})->name('page.show');
