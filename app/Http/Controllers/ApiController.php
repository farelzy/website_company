<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Armada;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\Gallery;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // ===== NAVIGATION =====
    public function navigation()
    {
        return response()->json(
            Page::orderBy('order')
                ->take(4)
                ->get(['id', 'slug', 'navbar_title', 'order'])
        );
    }

    // ===== PAGES =====
    public function pages()
    {
        return response()->json(Page::orderBy('order')->get());
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if (!$page) {
            return response()->json(['message' => 'Page not found'], 404);
        }
        return response()->json($page);
    }

    // ===== POSTS =====
    public function posts()
    {
        return response()->json(
            Post::where('is_published', true)
                ->orderBy('published_at', 'desc')
                ->get()
        );
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->first();
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        return response()->json($post);
    }

    // ===== SETTINGS =====
    public function settings()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return response()->json($settings);
    }

    // ===== ARMADA =====
    public function armadas()
    {
        return response()->json(
            Armada::where('is_active', true)->orderBy('order')->get()
        );
    }

    // ===== TESTIMONIALS =====
    public function testimonials()
    {
        return response()->json(
            Testimonial::where('is_active', true)->get()
        );
    }

    // ===== TEAM MEMBERS =====
    public function teamMembers()
    {
        return response()->json(
            TeamMember::where('is_active', true)->orderBy('order')->get()
        );
    }

    // ===== GALLERIES =====
    public function galleries()
    {
        return response()->json(
            Gallery::where('is_active', true)->orderBy('order')->get()
        );
    }

    // ===== AGGREGATE (semua data sekaligus untuk halaman tertentu) =====
    public function homeData()
    {
        return response()->json([
            'page'         => Page::where('template', 'home')->first(),
            'kontak_page'  => Page::where('template', 'kontak')->first(),
            'settings'     => Setting::all()->pluck('value', 'key'),
            'armadas'      => Armada::where('is_active', true)->orderBy('order')->get(),
            'testimonials' => Testimonial::where('is_active', true)->get(),
        ]);
    }

    public function aboutData($slug)
    {
        return response()->json([
            'page'    => Page::where('slug', $slug)->first(),
            'team'    => TeamMember::where('is_active', true)->orderBy('order')->get(),
        ]);
    }

    public function armadaData($slug)
    {
        return response()->json([
            'page'    => Page::where('slug', $slug)->first(),
            'armadas' => Armada::where('is_active', true)->orderBy('order')->get(),
            'gallery' => Gallery::where('is_active', true)->orderBy('order')->get(),
        ]);
    }

    public function kontakData($slug)
    {
        return response()->json([
            'page'    => Page::where('slug', $slug)->first(),
            'settings'=> Setting::all()->pluck('value', 'key'),
        ]);
    }

    // ===== INQUIRIES =====
    public function submitInquiry(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'bus_type' => 'nullable|string|max:100',
            'departure_date' => 'nullable|date',
            'message' => 'nullable|string',
        ]);

        $inquiry = \App\Models\Inquiry::create($validated);

        return response()->json([
            'message' => 'Pesan berhasil disimpan.',
            'data' => $inquiry
        ], 201);
    }
}
