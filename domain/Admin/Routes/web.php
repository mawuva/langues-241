<?php

use Domain\Admin\Http\Controllers\AdminController;
use Domain\Admin\Http\Controllers\Auth\LoginController;
use Domain\Admin\Http\Controllers\Auth\LogoutController;
use Domain\Admin\Http\Controllers\ContentTypeController;
use Domain\Admin\Http\Controllers\CourseChapterController;
use Domain\Admin\Http\Controllers\CourseController;
use Domain\Admin\Http\Controllers\DashboardController;
use Domain\Admin\Http\Controllers\GroupingController;
use Domain\Admin\Http\Controllers\LanguageController;
use Domain\Admin\Http\Controllers\LevelController;
use Domain\Admin\Http\Controllers\UserController;
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
    
    Route::prefix('admin')->group(function() {
        Route::get('/', [LoginController::class, 'view']) ->name('app.admin.auth.login');
        Route::post('/', [LoginController::class, 'handle']) ->name('app.admin.auth.login');

        Route::group(['middleware' =>['auth_admin', 'admin']], function () {
            Route::get('/dashboard', [DashboardController::class, 'index']) ->name('app.admin.dashboard');
            Route::match(['post', 'get'], 'logout', [LogoutController::class, 'handle']) ->name('app.admin.auth.logout');

            Route::get('/index', [AdminController::class, 'index']) ->name('app.admin.admins.index');
            Route::get('deleted', [AdminController::class, 'deleted']) ->name('app.admin.admins.deleted');
            Route::get('create', [AdminController::class, 'create']) ->name('app.admin.admins.create');
            Route::post('create', [AdminController::class, 'store']) ->name('app.admin.admins.store');

            Route::group(['prefix' => '{id}'], function () {
                Route::get('show', [AdminController::class, 'show']) ->name('app.admin.admins.show');
                Route::get('edit', [AdminController::class, 'edit']) ->name('app.admin.admins.edit');
                Route::post('edit', [AdminController::class, 'update']) ->name('app.admin.admins.update');
                Route::get('edit-password', [AdminController::class, 'editPassword']) ->name('app.admin.admins.edit-password');
                Route::post('edit-password', [AdminController::class, 'updatePassword']) ->name('app.admin.admins.update-password');
                Route::get('edit-profile', [AdminController::class, 'editProfile']) ->name('app.admin.admins.edit-profile');
                Route::post('edit-profile', [AdminController::class, 'updateProfile']) ->name('app.admin.admins.update-profile');
                Route::get('delete', [AdminController::class, 'delete']) ->name('app.admin.admins.delete');
                Route::get('restore', [AdminController::class, 'restore']) ->name('app.admin.admins.restore');
                Route::get('remove', [AdminController::class, 'remove']) ->name('app.admin.admins.remove');
            });

            Route::group(['prefix' => 'users'], function () {
                Route::get('/', [UserController::class, 'index']) ->name('app.admin.users.index');
                Route::get('deleted', [UserController::class, 'deleted']) ->name('app.admin.users.deleted');

                Route::group(['prefix' => '{id}'], function () {
                    Route::get('show', [UserController::class, 'show']) ->name('app.admin.users.show');
                });
            });

            Route::group(['prefix' => 'languages'], function () {
                Route::get('/index', [LanguageController::class, 'index']) ->name('app.admin.languages.index');
                Route::get('deleted', [LanguageController::class, 'deleted']) ->name('app.admin.languages.deleted');
                Route::get('create', [LanguageController::class, 'create']) ->name('app.admin.languages.create');
                Route::post('create', [LanguageController::class, 'store']) ->name('app.admin.languages.store');

                Route::group(['prefix' => '{id}'], function () {
                    Route::get('show', [LanguageController::class, 'show']) ->name('app.admin.languages.show');
                    Route::get('edit', [LanguageController::class, 'edit']) ->name('app.admin.languages.edit');
                    Route::post('edit', [LanguageController::class, 'update']) ->name('app.admin.languages.update');
                    Route::get('delete', [LanguageController::class, 'delete']) ->name('app.admin.languages.delete');
                    Route::get('restore', [LanguageController::class, 'restore']) ->name('app.admin.languages.restore');
                    Route::get('remove', [LanguageController::class, 'remove']) ->name('app.admin.languages.remove');
                });
            });
            
            Route::group(['prefix' => 'levels'], function () {
                Route::get('/index', [LevelController::class, 'index']) ->name('app.admin.levels.index');
                Route::get('deleted', [LevelController::class, 'deleted']) ->name('app.admin.levels.deleted');
                Route::get('create', [LevelController::class, 'create']) ->name('app.admin.levels.create');
                Route::post('create', [LevelController::class, 'store']) ->name('app.admin.levels.store');

                Route::group(['prefix' => '{id}'], function () {
                    Route::get('show', [LevelController::class, 'show']) ->name('app.admin.levels.show');
                    Route::get('edit', [LevelController::class, 'edit']) ->name('app.admin.levels.edit');
                    Route::post('edit', [LevelController::class, 'update']) ->name('app.admin.levels.update');
                    Route::get('delete', [LevelController::class, 'delete']) ->name('app.admin.levels.delete');
                    Route::get('restore', [LevelController::class, 'restore']) ->name('app.admin.levels.restore');
                    Route::get('remove', [LevelController::class, 'remove']) ->name('app.admin.levels.remove');
                });
            });

            Route::group(['prefix' => 'groupings'], function () {
                Route::get('/index', [GroupingController::class, 'index']) ->name('app.admin.groupings.index');
                Route::get('deleted', [GroupingController::class, 'deleted']) ->name('app.admin.groupings.deleted');
                Route::get('create', [GroupingController::class, 'create']) ->name('app.admin.groupings.create');
                Route::post('create', [GroupingController::class, 'store']) ->name('app.admin.groupings.store');

                Route::group(['prefix' => '{id}'], function () {
                    Route::get('show', [GroupingController::class, 'show']) ->name('app.admin.groupings.show');
                    Route::get('edit', [GroupingController::class, 'edit']) ->name('app.admin.groupings.edit');
                    Route::post('edit', [GroupingController::class, 'update']) ->name('app.admin.groupings.update');
                    Route::get('delete', [GroupingController::class, 'delete']) ->name('app.admin.groupings.delete');
                    Route::get('restore', [GroupingController::class, 'restore']) ->name('app.admin.groupings.restore');
                    Route::get('remove', [GroupingController::class, 'remove']) ->name('app.admin.groupings.remove');
                });
            });

            Route::group(['prefix' => 'content-types'], function () {
                Route::get('/index', [ContentTypeController::class, 'index']) ->name('app.admin.content-types.index');
                Route::get('deleted', [ContentTypeController::class, 'deleted']) ->name('app.admin.content-types.deleted');
                Route::get('create', [ContentTypeController::class, 'create']) ->name('app.admin.content-types.create');
                Route::post('create', [ContentTypeController::class, 'store']) ->name('app.admin.content-types.store');

                Route::group(['prefix' => '{id}'], function () {
                    Route::get('show', [ContentTypeController::class, 'show']) ->name('app.admin.content-types.show');
                    Route::get('edit', [ContentTypeController::class, 'edit']) ->name('app.admin.content-types.edit');
                    Route::post('edit', [ContentTypeController::class, 'update']) ->name('app.admin.content-types.update');
                    Route::get('delete', [ContentTypeController::class, 'delete']) ->name('app.admin.content-types.delete');
                    Route::get('restore', [ContentTypeController::class, 'restore']) ->name('app.admin.content-types.restore');
                    Route::get('remove', [ContentTypeController::class, 'remove']) ->name('app.admin.content-types.remove');
                });
            });

            Route::group(['prefix' => 'courses'], function () {
                Route::get('/index', [CourseController::class, 'index']) ->name('app.admin.courses.index');
                Route::get('deleted', [CourseController::class, 'deleted']) ->name('app.admin.courses.deleted');
                Route::get('create', [CourseController::class, 'create']) ->name('app.admin.courses.create');
                Route::post('create', [CourseController::class, 'store']) ->name('app.admin.courses.store');

                    Route::group(['prefix' => '{id}'], function () {
                        Route::get('show', [CourseController::class, 'show']) ->name('app.admin.courses.show');
                        Route::get('edit', [CourseController::class, 'edit']) ->name('app.admin.courses.edit');
                        Route::post('edit', [CourseController::class, 'update']) ->name('app.admin.courses.update');
                        Route::get('delete', [CourseController::class, 'delete']) ->name('app.admin.courses.delete');
                        Route::get('restore', [CourseController::class, 'restore']) ->name('app.admin.courses.restore');
                        Route::get('remove', [CourseController::class, 'remove']) ->name('app.admin.courses.remove');

                        Route::group(['prefix' => 'course-chapters'], function () {
                        Route::get('/index', [CourseChapterController::class, 'index']) ->name('app.admin.course-chapters.index');
                        Route::get('deleted', [CourseChapterController::class, 'deleted']) ->name('app.admin.course-chapters.deleted');
                        Route::get('create', [CourseChapterController::class, 'create']) ->name('app.admin.course-chapters.create');
                        Route::post('create', [CourseChapterController::class, 'store']) ->name('app.admin.course-chapters.store');

                        Route::group(['prefix' => '{chapter_id}'], function () {
                            Route::get('show', [CourseChapterController::class, 'show']) ->name('app.admin.course-chapters.show');
                            Route::get('edit', [CourseChapterController::class, 'edit']) ->name('app.admin.course-chapters.edit');
                            Route::post('edit', [CourseChapterController::class, 'update']) ->name('app.admin.course-chapters.update');
                            Route::get('delete', [CourseChapterController::class, 'delete']) ->name('app.admin.course-chapters.delete');
                            Route::get('restore', [CourseChapterController::class, 'restore']) ->name('app.admin.course-chapters.restore');
                            Route::get('remove', [CourseChapterController::class, 'remove']) ->name('app.admin.course-chapters.remove');
                        });
                    });
                });
            });
        });
    });

});