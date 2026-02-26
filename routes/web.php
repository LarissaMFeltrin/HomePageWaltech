<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/sitemap.xml', function () {
    return response()->file(public_path('sitemap.xml'), [
        'Content-Type' => 'application/xml',
    ]);
});

Route::get('/robots.txt', function () {
    return response()->file(public_path('robots.txt'), [
        'Content-Type' => 'text/plain',
    ]);
});
