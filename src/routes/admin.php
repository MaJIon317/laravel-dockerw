<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageController;

Route::middleware('guest.admin:admin')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginExecute')->name('login.execute');
});

Route::middleware('auth.admin:admin', 'permission:admin')->group(function () {
    Route::post('/image/upload', [ImageController::class, 'upload'])->name('image.upload');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
    Route::resource('categories', CategoryController::class)
        ->missing(function (Request $request) {
            return Redirect::route('categories.index');
        });

    Route::resource('products', ProductController::class)
        ->missing(function (Request $request) {
            return Redirect::route('products.index');
        });

    Route::resource('orders', OrderController::class)
        ->missing(function (Request $request) {
            return Redirect::route('orders.index');
        });

    Route::resource('coupons', CouponController::class)
        ->missing(function (Request $request) {
            return Redirect::route('coupons.index');
        });

    Route::resource('articles', ArticleController::class)
        ->missing(function (Request $request) {
            return Redirect::route('articles.index');
        });

    Route::resource('news', NewsController::class)
        ->missing(function (Request $request) {
            return Redirect::route('news.index');
        });

    Route::resource('feedbacks', FeedbackController::class)
        ->missing(function (Request $request) {
            return Redirect::route('feedbacks.index');
        });
        
    Route::resource('users', UserController::class)
        ->missing(function (Request $request) {
            return Redirect::route('users.index');
        });

    Route::resource('admins', AdminController::class)
        ->missing(function (Request $request) {
            return Redirect::route('admins.index');
        });

    Route::resource('admin-roles', AdminRoleController::class)
        ->missing(function (Request $request) {
            return Redirect::route('admin-roles.index');
        });

    Route::resource('settings', SettingController::class)
        ->missing(function (Request $request) {
            return Redirect::route('settings.index');
        });

    Route::resource('holidays', HolidayController::class)
        ->missing(function (Request $request) {
            return Redirect::route('holidays.index');
        });

    Route::resource('informations', InformationController::class)
        ->missing(function (Request $request) {
            return Redirect::route('informations.index');
        });
    
    Route::resource('faqs', FaqController::class)
        ->missing(function (Request $request) {
            return Redirect::route('admin.faqs.index');
        });

    Route::resource('subscriptions', SubscriptionController::class)
        ->missing(function (Request $request) {
            return Redirect::route('admin.subscriptions.index');
        });

    Route::resource('email-constructor', EmailConstructorController::class)
        ->missing(function (Request $request) {
            return Redirect::route('admin.email-constructor.index');
        });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});