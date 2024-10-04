<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminLoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\SetLanguage;
use Illuminate\Foundation\Application;

use App\Http\Controllers\Frontend\DashboardController as Dashboard;
use App\Http\Controllers\Frontend\AnnouncementController;
use App\Http\Controllers\Frontend\HousemateController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('backend/login', [AdminLoginController::class, 'index'])->name('logging');
Route::post('backend/login', [AdminLoginController::class, 'login'])->name('admin.login');

Route::group(['prefix' => 'backend', 'middleware' => 'auth:admin'], function () {

    Route::fallback(fn() => redirect(route('backend.dashboard')));
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('/', [DashboardController::class, 'index'])->name('backend.dashboard');
    Route::resource('admin', AdminController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('languages', LanguageController::class);
});

// ---------------------------------------------------------------------------------------------------------------------------
//              FRONT
// ---------------------------------------------------------------------------------------------------------------------------
//

// routes/web.php
Route::post('/announcement', [AnnouncementController::class, 'store'])->name('announcement.store');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::post('/announcement/status/{id}', [AnnouncementController::class, 'changeStatus'])->name('announcement.changeStatus');
Route::delete('/announcement/{id}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');
Route::delete('/announcement/delete/image/{id}', [AnnouncementController::class, 'deleteImage'])->name('announcement.delete.image');
Route::post('/announcement/update/{id}', [AnnouncementController::class, 'update'])->name('announcement.update');

//Route::patch('/announcement/update/{id}', [AnnouncementController::class, 'update'])->name('announcement.update');




Route::group(['middleware' => [SetLanguage::class, HandleInertiaRequests::class], 'prefix' => '{language?}'], function () {
    Route::fallback(fn() => redirect(route('home')));
    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::get('/search', [IndexController::class, 'search'])->name('search');
    Route::get('/announcement/{slug}', [IndexController::class, 'show'])->name('announcement.detail');
    Route::get('/housemate', [HousemateController::class, 'index'])->name('housemate');
    Route::get('/rentals', [RentalController::class, 'index'])->name('rentals');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');


//    Route::get('/announcements', [IndexController::class, 'announcements'])->name('home.announcements');
//    Route::get('/sitemap.xml', [SitemapController::class, 'index']);

    Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/announcement/edit/{id}', [Dashboard::class, 'edit'])->middleware(['auth', 'verified'])->name('announcement.edit');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
