<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home', ['language' => 'en']);
});

Route::prefix('{language}')->whereIn('language', ['en', 'fr'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/about', [AboutController::class, 'index'])->name('about');

    Route::get('/programmes', [ProgrammeController::class, 'index'])->name('programmes.index');
    Route::get('/programmes/{slug}', [ProgrammeController::class, 'show'])->name('programmes.show');

    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/{slug}', [EventController::class, 'show'])->name('events.show');

    Route::get('/publications', [PublicationController::class, 'index'])->name('publications.index');
    Route::get('/publications/{slug}', [PublicationController::class, 'show'])->name('publications.show');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');

    Route::get('/search', [SearchController::class, 'index'])->name('search');
});
