<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmailConfigController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WriterController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {

        Route::prefix('customer')->name('customer.')->group(function () {
            Route::get('/',[\App\Http\Controllers\Admin\CustomerController::class,'index'])->name('index');
            Route::get('/details/{id}',[\App\Http\Controllers\Admin\CustomerController::class,'details'])->name('details');
            Route::post('add/update/info/{id?}',[\App\Http\Controllers\Admin\CustomerController::class,'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\CustomerController::class, 'dataInfoDelete'])->name('delete');
        });
        Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);

        Route::prefix('permission')->name('permission.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\PermissionController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [\App\Http\Controllers\Admin\PermissionController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\PermissionController::class, 'dataInfoDelete'])->name('delete');

        });

        Route::prefix('dashboard')->name('dashboard.')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');

        });

        Route::prefix('slider')->name('slider.')->group(function () {
            Route::get('/', [SliderController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [SliderController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [SliderController::class, 'dataInfoDelete'])->name('delete');

        });

        Route::prefix('faq')->name('faq.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\FaqController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [\App\Http\Controllers\Admin\FaqController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\FaqController::class, 'dataInfoDelete'])->name('delete');

        });

        Route::prefix('patner')->name('patner.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\PatnerController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [\App\Http\Controllers\Admin\PatnerController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\PatnerController::class, 'dataInfoDelete'])->name('delete');

        });
        Route::prefix('client')->name('client.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ClientController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [\App\Http\Controllers\Admin\ClientController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\ClientController::class, 'dataInfoDelete'])->name('delete');

        });

        Route::prefix('service')->name('service.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [\App\Http\Controllers\Admin\ServiceController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\ServiceController::class, 'dataInfoDelete'])->name('delete');

        });

        Route::prefix('service-page')->name('service-page.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ServicePageController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [\App\Http\Controllers\Admin\ServicePageController::class, 'addOrUpdateInfo'])->name('add.update.info');
        });

        Route::prefix('product-page')->name('product-page.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ServicePageController::class, 'productIndex'])->name('index');
        });

        Route::prefix('review')->name('review.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [\App\Http\Controllers\Admin\ReviewController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\ReviewController::class, 'dataInfoDelete'])->name('delete');

        });

        Route::prefix('banner')->name('banner.')->group(function () {
            Route::get('/', [BannerController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [BannerController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [BannerController::class, 'dataInfoDelete'])->name('delete');

        });

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [UserController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [UserController::class, 'dataInfoDelete'])->name('delete');

        });
        Route::prefix('role')->name('role.')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [RoleController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [RoleController::class, 'dataInfoDelete'])->name('delete');

        });

        Route::prefix('project-category')->name('project-category.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ProjectCategoryController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [\App\Http\Controllers\Admin\ProjectCategoryController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\ProjectCategoryController::class, 'dataInfoDelete'])->name('delete');

        });
        Route::prefix('project')->name('project.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [\App\Http\Controllers\Admin\ProjectController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\ProjectController::class, 'dataInfoDelete'])->name('delete');

        });
        Route::prefix('why-choose-us')->name('why-choose-us.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\WhyChooseUsController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [\App\Http\Controllers\Admin\WhyChooseUsController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\WhyChooseUsController::class, 'dataInfoDelete'])->name('delete');

        });

        Route::prefix('team')->name('team.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\TeamController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [\App\Http\Controllers\Admin\TeamController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\TeamController::class, 'dataInfoDelete'])->name('delete');
            Route::post('/reorder', [\App\Http\Controllers\Admin\TeamController::class, 'reorder'])->name('reorder');

        });

        Route::prefix('product')->name('product.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [\App\Http\Controllers\Admin\ProductController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'dataInfoDelete'])->name('delete');

        });

        Route::prefix('factory')->name('factory.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\FactoryController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [\App\Http\Controllers\Admin\FactoryController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\FactoryController::class, 'dataInfoDelete'])->name('delete');

        });
        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [\App\Http\Controllers\Admin\GalleryController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\GalleryController::class, 'dataInfoDelete'])->name('delete');

        });

        Route::prefix('generalSetting')->name('generalSetting.')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('index');
            Route::post('add/update/info', [SettingController::class, 'addOrUpdateInfo'])->name('add.update.info');

        });



        Route::prefix('email')->name('email.')->group(function () {
            Route::get('/', [EmailConfigController::class, 'index'])->name('index');
            Route::post('add/update/info', [EmailConfigController::class, 'addOrUpdateInfo'])->name('add.update.info');

        });

        Route::prefix('blog')->name('blog.')->group(function () {
            Route::get('/', [BlogController::class, 'index'])->name('index');
            Route::get('/info/{id?}', [BlogController::class, 'dataInfo'])->name('blog');
            Route::post('add/update/info/{id?}', [BlogController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [BlogController::class, 'dataInfoDelete'])->name('delete');

            Route::prefix('writer')->name('writer.')->group(function () {
                Route::get('/', [WriterController::class, 'index'])->name('index');
                Route::post('add/update/info/{id?}', [WriterController::class, 'addOrUpdateInfo'])->name('add.update.info');
                Route::delete('/delete/{id}', [WriterController::class, 'dataInfoDelete'])->name('delete');
            });

            Route::prefix('tag')->name('tag.')->group(function () {
                Route::get('/', [TagController::class, 'index'])->name('index');
                Route::post('add/update/info/{id?}', [TagController::class, 'addOrUpdateInfo'])->name('add.update.info');
                Route::delete('/delete/{id}', [TagController::class, 'dataInfoDelete'])->name('delete');
            });

            Route::prefix('category')->name('category.')->group(function () {
                Route::get('/', [BlogCategoryController::class, 'index'])->name('index');
                Route::post('add/update/info/{id?}', [BlogCategoryController::class, 'addOrUpdateInfo'])->name('add.update.info');
                Route::delete('/delete/{id}', [BlogCategoryController::class, 'dataInfoDelete'])->name('delete');
            });

        });
        Route::prefix('subscriber')->name('subscriber.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\SubscriberController::class, 'index'])->name('index');
            Route::post('add/update/info/{id?}', [\App\Http\Controllers\Admin\SubscriberController::class, 'addOrUpdateInfo'])->name('add.update.info');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\SubscriberController::class, 'dataInfoDelete'])->name('delete');
        });

    });
});


