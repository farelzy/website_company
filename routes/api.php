<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Pages & Navigation
Route::get('/navigation', [ApiController::class, 'navigation']);
Route::get('/pages', [ApiController::class, 'pages']);
Route::get('/pages/{slug}', [ApiController::class, 'page']);

// Posts (Blog/Promo)
Route::get('/posts', [ApiController::class, 'posts']);
Route::get('/posts/{slug}', [ApiController::class, 'post']);

// Content endpoints
Route::get('/settings', [ApiController::class, 'settings']);
Route::get('/armadas', [ApiController::class, 'armadas']);
Route::get('/testimonials', [ApiController::class, 'testimonials']);
Route::get('/team', [ApiController::class, 'teamMembers']);
Route::get('/galleries', [ApiController::class, 'galleries']);

// Aggregate Page Data (satu request = semua data yang dibutuhkan halaman)
Route::get('/page-data/home', [ApiController::class, 'homeData']);
Route::get('/page-data/about/{slug}', [ApiController::class, 'aboutData']);
Route::get('/page-data/armada/{slug}', [ApiController::class, 'armadaData']);
Route::get('/page-data/kontak/{slug}', [ApiController::class, 'kontakData']);

Route::post('/inquiries', [ApiController::class, 'submitInquiry']);

