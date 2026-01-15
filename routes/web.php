<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ServiceController;

// Admin Authentication
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('about-us');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/destinations', [PageController::class, 'destinations'])->name('destinations');
Route::get('/reviews', [PageController::class, 'reviews'])->name('reviews');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contact-us');
Route::get('/services/{id}', [PageController::class, 'servicesSinglePage'])->name('servicesSinglePage');
Route::get('/destinations/{id}', [PageController::class, 'destinationsSinglePage'])->name('destinationsSinglePage');
Route::get('/book-a-ride', [PageController::class, 'bookARide'])->name('bookARide');
Route::get('/map', function () {
    return view('pages.map-test');
});

Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contacts.store');
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');
Route::post('/reviews', [ReviewsController::class, 'store'])->name('reviews.store');


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('banners', BannerController::class);
    Route::resource('newsletters', NewsletterController::class);
    Route::resource('contact-us', ContactUsController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('reviews', ReviewsController::class);
    Route::resource('destinations', DestinationController::class);
});
