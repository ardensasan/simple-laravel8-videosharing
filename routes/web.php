<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VideoController;
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

Route::get('/',[VideoController::class,'index'])->name('home');
Route::get('/home',[VideoController::class,'index'])->name('home');
// Route::resource('videos', VideoController::class);

Route::get('upload', [VideoController::class,'create'])->name('upload.show');
Route::post('upload', [VideoController::class,'store'])->name('upload.store');
Route::post('details', [VideoController::class,'update']);

// Route::get('watch/{url}', [VideoController::class,'show'])->name('watch');
Route::get('watch/{url}', [VideoController::class,'watch'])->name('videos.watch');
Route::get('show/{url}', [VideoController::class,'show'])->name('videos.show');
Route::get('details/{url}', [VideoController::class,'details'])->name('videos.details');
Route::get('thumbnail/{image}', [VideoController::class,'thumbnail'])->name('videos.thumbnail');

//search routes
Route::get('search/{term}', [VideoController::class,'search'])->name('search.results');

//user routes
Route::get('sign-up',[RegistrationController::class,'create']);
Route::post('sign-up',[RegistrationController::class,'store'])->name('user.signup');

Route::get('sign-in',[LoginController::class,'create'])->name('login');
Route::post('sign-in',[LoginController::class,'login'])->name('user.signin');

Route::get('myvideos',[PagesController::class,'myvideos'])->name('pages.myvideos');

Route::get('logout',[LoginController::class,'logout'])->name('user.logout');
