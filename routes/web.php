<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

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

Route::controller(PageController::class)->group(function() {
    Route::get('/',                'home')->name('home');
    Route::get('blog/{post:slug}', 'post')->name('post');
});

Route::redirect('/dashboard', 'posts')->name('dashboard');

// except(['show']) -> Work with evertything except Show view
// To check route ist avaiables -> php artisan route:list
Route::resource('posts', PostController::class)->middleware(['auth', 'verified'])->except(['show']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
