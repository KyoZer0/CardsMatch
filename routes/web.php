<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/play', function () {
    return view('game');
})->name('game');

// SEO & Information Pages
Route::view('/privacy-policy', 'pages.privacy')->name('pages.privacy');
Route::view('/parents-guide', 'pages.parents')->name('pages.parents');
Route::view('/contact-us', 'pages.contact')->name('pages.contact');
Route::view('/faq', 'pages.faq')->name('pages.faq');
Route::view('/about', 'pages.about')->name('pages.about');
Route::view('/terms', 'pages.terms')->name('pages.terms');

Route::get('/blogs', [\App\Http\Controllers\BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blogs.show');

Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

