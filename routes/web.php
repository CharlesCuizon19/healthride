<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('about-us');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/destinations', [PageController::class, 'destinations'])->name('destinations');
Route::get('/reviews', [PageController::class, 'reviews'])->name('reviews');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contact-us');
Route::get('/services/{id}', [PageController::class, 'servicesSinglePage'])->name('servicesSinglePage');
Route::get('/destinations/{id}', [PageController::class, 'destinationsSinglePage'])->name('destinationsSinglePage');
Route::get('/book-a-ride', [PageController::class, 'bookARide'])->name('bookARide');
