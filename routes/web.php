<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SocialsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentReactionController;
use App\Http\Controllers\StoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::group(['middleware' => 'check.ip.ban'], function () {
    Route::middleware(['check.ban:ban_login'])->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::middleware(['check.ban:ban_read'])->group(function () {
            Route::get('/chapter/{slug}', [HomeController::class, 'chapter'])->name('chapter');
            Route::get('/search-chapters', [HomeController::class, 'searchChapters'])->name('chapters.search');
        });

        Route::post('/comments/{comment}/react', [CommentReactionController::class, 'react'])->name('comments.react');

        Route::get('profile', [UserController::class, 'userProfile'])->name('profile');
        Route::post('update-profile/update-name-or-phone', [UserController::class, 'updateNameOrPhone'])->name('update.name.or.phone');
        Route::post('update-avatar', [UserController::class, 'updateAvatar'])->name('update.avatar');
        Route::post('update-password', [UserController::class, 'updatePassword'])->name('update.password');

        Route::group(['middleware' => 'auth'], function () {
            Route::middleware(['check.ban:ban_comment'])->group(function () {
                Route::post('comment/store', [CommentController::class, 'storeClient'])->name('comment.store.client');
            });

            Route::middleware(['check.ban:ban_rate'])->group(function () {
                Route::post('/ratings', [RatingController::class, 'storeClient'])->name('ratings.store');
                Route::get('/ratings', function () {
                    abort(404);
                });
            });

            Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

            Route::group(['middleware' => 'role.admin'], function () {
                Route::post('/comments/{comment}/pin', [CommentController::class, 'togglePin'])->name('comments.pin');
            });

            Route::group(['prefix' => 'admin'], function () {
                Route::group(['middleware' => 'role.admin'], function () {
                    Route::post('/users/{id}/banip', [UserController::class, 'banIp'])->name('users.banip');
                    Route::patch('/status/toggle', [StatusController::class, 'toggle'])->name('status.toggle');
                });

                Route::group(['middleware' => 'role.admin.mod'], function () {

                    Route::get('/dashboard', function () {
                        return view('admin.pages.dashboard');
                    })->name('admin.dashboard');

                    Route::get('users', [UserController::class, 'index'])->name('users.index');
                    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
                    Route::PATCH('users/{user}', [UserController::class, 'update'])->name('users.update');


                    Route::resource('categories', CategoryController::class);
                    Route::resource('stories', StoryController::class);

                    Route::resource('chapters', ChapterController::class);

                    Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
                    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
                
                    Route::delete('delete-comments/{comment}', [CommentController::class, 'deleteComment'])->name('delete.comments');
                });
            });

           
        });



        Route::group(['middleware' => 'guest'], function () {
            Route::get('/login', function () {
                return view('pages.auth.login');
            })->name('login');
            Route::post('/login', [AuthController::class, 'login'])->name('login');

            Route::get('/register', function () {
                return view('pages.auth.register');
            })->name('register');
            Route::post('/register', [AuthController::class, 'register'])->name('register');

            Route::get('/forgot-password', function () {
                return view('pages.auth.forgot-password');
            })->name('forgot-password');
            Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');

            Route::group(['prefix' => 'admin'], function () {
                Route::get('/login', function () {
                    return view('admin.pages.auth.login');
                })->name('admin.login');
            });
        });
    });
});
