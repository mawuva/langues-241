<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\PasswordForgotController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(), 
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function() {
    
    Route::get('/', [PagesController::class, 'home']) ->name('app.home');
    Route::get('/about', [PagesController::class, 'about']) ->name('app.about');

    Route::group(['prefix' =>'register'], function() {
        Route::get('/', [RegisterController::class, 'view']) ->name('app.auth.register');
        Route::post('/', [RegisterController::class, 'handle']) ->name('app.auth.register');
    });

    Route::match(['get', 'post'], '/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed'])
        ->name('verification.verify');

    Route::group(['prefix' =>'login'], function() {
        Route::get('/', [LoginController::class, 'view']) ->name('app.auth.login');
        Route::post('/', [LoginController::class, 'handle']) ->name('app.auth.login');
    });

    Route::prefix('/forgot-password')->group(function () {
        Route::get('/', [PasswordForgotController::class, 'view']) ->name('app.password.request');
        Route::post('/', [PasswordForgotController::class, 'handle']) ->name('app.password.email');
    });

    Route::prefix('/reset-password')->group(function () {
        Route::get('/{token}', [PasswordResetController::class, 'view']) ->name('app.password.reset');
        Route::post('/', [PasswordResetController::class, 'handle']) ->name('app.password.update');
    });

    Route::group(['middleware' =>'auth'], function () {
        Route::get('profile/me', [ProfileController::class, 'index']) ->name('app.user.profile');
        Route::get('dashboard/me', [DashboardController::class, 'index']) ->name('app.user.dashboard');
        Route::get('courses/me', [DashboardController::class, 'index']) ->name('app.user.dashboard');
        
        Route::get('/verify-email', [EmailVerificationNotificationController::class, 'view']) ->name('app.verification.notice');
        Route::post('/verify-email/request', [EmailVerificationNotificationController::class, 'request']) ->name('app.verification.request');
        
        Route::match(['post', 'get'], 'logout', [LogoutController::class, 'handle']) ->name('app.auth.logout');
    });

    Route::group(['prefix' =>'courses'], function() {
        Route::get('/', [CourseController::class, 'index']) ->name('app.course.index');
        Route::get('info', [CourseController::class, 'info']) ->name('app.course.info');
        Route::get('category/{category_id}', [CourseController::class, 'category']) ->name('app.course.category');
        Route::get('level/{level_id}', [CourseController::class, 'level']) ->name('app.course.level');
        Route::get('language/{language_id}', [CourseController::class, 'language']) ->name('app.course.language');

        Route::group(['prefix' =>'{id}'], function() {
            Route::get('/show', [CourseController::class, 'show']) ->name('app.course.show');
            Route::get('/enroll', [CourseController::class, 'enroll']) ->name('app.course.enroll');
        });
    });

    Route::group(['prefix' =>'shop'], function() {
        Route::get('/', [ShopController::class, 'index']) ->name('app.shop.index');
    });

    Route::group(['prefix' =>'blog'], function() {
        Route::get('/', [BlogController::class, 'index']) ->name('app.blog.index');
    });

    Route::group(['prefix' =>'contact'], function() {
        Route::get('/', [ContactController::class, 'view']) ->name('app.contact.form');
        Route::post('/', [ContactController::class, 'handle']) ->name('app.contact.send');
        Route::post('/', [ContactController::class, 'newsletter']) ->name('app.contact.newsletter');
    });
});
