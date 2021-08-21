<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesArtical;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LatestPost;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ShowArticalController;

use App\Http\Controllers\UserController;
use App\Models\Permissions;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

const PAGNAITE = 12;



Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Route::get('latest_Artical', [LatestPost::class, 'index'])->name('latest_artical');

Route::get('categories/{id}', [CategoriesArtical::class, 'index'])->name('categories');

Route::get('email_verfied/{id}', [UserController::class, 'verfiled']);


Route::get('artical/{id}', [ShowArticalController::class, 'index'])->name('show_artical');

Route::post('subscribe', [mailController::class, 'subscribe'])->name('mail.subscribe');



Route::get('rss', [LandingPageController::class, 'index'])->name('RSS');
Route::get('privcy', [LandingPageController::class, 'privcy'])->name('privcy');
Route::get('contact_us', [LandingPageController::class, 'contact'])->name('contact');
Route::get('how_us', [LandingPageController::class, 'privcy'])->name('how_us');








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{blade}', [AdminController::class, 'index']);