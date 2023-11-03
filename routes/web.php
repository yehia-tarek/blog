<?php

use App\Livewire\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Fronted\BlogController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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


Auth::routes();

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::get('/', function () {
            if (Auth::check()) {
                // User is already logged in, redirect to the dashboard or another page
                return redirect(route('home')); // Change '/dashboard' to the desired URL
            }
            return view('auth.login');
        });



        Route::group(['middleware' => ['auth']], function() {

            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
            // category routes
            Route::get('category', [CategoryController::class, 'index'] )->name('category.index');
            Route::get('category/create', [CategoryController::class, 'create'] )->name('category.create');
            Route::post('category/store', [CategoryController::class, 'store'] )->name('category.store');
            Route::post('category/update/{id}', [CategoryController::class, 'update'] )->name('category.update');
            Route::post('category/destroy/{id}', [CategoryController::class, 'destroy'] )->name('category.destroy');

            // tags routes
            Route::get('tag', [TagController::class, 'index'] )->name('tag.index');
            Route::post('tag/store', [TagController::class, 'store'] )->name('tag.store');
            Route::post('tag/update/{id}', [TagController::class, 'update'] )->name('tag.update');
            Route::post('tag/destroy/{id}', [TagController::class, 'destroy'] )->name('tag.destroy');

            // posts routes
            Route::get('posts', [PostController::class, 'index'] )->name('posts.index');
            Route::get('posts/create', [PostController::class, 'create'] )->name('posts.create');
            Route::post('posts/store', [PostController::class, 'store'] )->name('posts.store');
            Route::get('posts/edit/{id}', [PostController::class, 'edit'] )->name('posts.edit');
            Route::post('posts/update/{id}', [PostController::class, 'update'] )->name('posts.update');
            Route::post('posts/destroy/{id}', [PostController::class, 'destroy'] )->name('posts.destroy');

            Route::resource('roles', RoleController::class);
            Route::resource('users', UserController::class);

            // Route::get('/{page}',[ AdminController::class,'index']);
        });
        Route::get('/livewire/profile', Profile::class);
        // Route::get('profile',function(){
        //     return view('livewire.empty');
        // });
        Route::get('blog',[BlogController::class, 'index']);
        Route::get('blog/{id}',[BlogController::class, 'show']);

        // Route::view('/profile', 'livewire.empty');
        // Route::get('profile',[ProfileController::class, 'index']);
        // Route::get('profile/update',[ProfileController::class, 'update']);
    });
//     Route::group(
//         [
//             // 'prefix' => LaravelLocalization::setLocale(),
//             // 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//         ], function(){
//     Route::get('/profile',function(){
//         return view('livewire.empty')->prefix(LaravelLocalization::setLocale());
//     });
// });
