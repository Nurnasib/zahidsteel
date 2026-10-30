<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::get('/', function () {
//
//})->name('home');

Route::get('/', [\App\Http\Controllers\Frontend\IndexController::class, 'index'])->name('home');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Frontend\IndexController::class, 'blog'])->name('index');
    Route::get('details/{slug?}', [\App\Http\Controllers\Frontend\IndexController::class, 'blogDetails'])->name('details');

});

Route::get('/client-list', [\App\Http\Controllers\Frontend\IndexController::class, 'clientList'])->name('client.list');
Route::get('/about-us', [\App\Http\Controllers\Frontend\IndexController::class, 'aboutUse'])->name('about-us');

// CMS pages managed in admin: /services/{key}, /products/{key}, /pages/{key}
Route::get('/{section}/{key}', [\App\Http\Controllers\Frontend\IndexController::class, 'page'])
    ->whereIn('section', array_values(\App\Models\ServicePage::TYPES))
    ->name('page.show');
Route::get('/factory', [\App\Http\Controllers\Frontend\IndexController::class, 'factory'])->name('factory');

Route::get('/complete-project', [\App\Http\Controllers\Frontend\IndexController::class, 'completeProject'])->name('complete-project');
Route::get('/running-project', [\App\Http\Controllers\Frontend\IndexController::class, 'runningProject'])->name('running-project');
Route::get('/gallery', [\App\Http\Controllers\Frontend\IndexController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{slug}', [\App\Http\Controllers\Frontend\IndexController::class, 'galleryAlbum'])->name('gallery.album');
Route::get('/contact-us', [\App\Http\Controllers\Frontend\IndexController::class, 'contactUs'])->name('contact-us');
Route::post('/send-message', [\App\Http\Controllers\Frontend\IndexController::class, 'sendMessage'])->name('send-message');

Route::get('/sitemap.xml', [\App\Http\Controllers\Frontend\SeoController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [\App\Http\Controllers\Frontend\SeoController::class, 'robots'])->name('robots');

Route::get('/brochure', [\App\Http\Controllers\Frontend\IndexController::class, 'brochure'])->name('brochure');

// Remove the old dashboard route and keep only settings
require __DIR__.'/settings.php';
