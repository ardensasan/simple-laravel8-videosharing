<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('videos', VideoController::class);

Route::get('upload', [VideoController::class,'create']);
Route::post('upload', [VideoController::class,'store'])->name('upload.store');
Route::post('details', [VideoController::class,'update']);

// Route::get('watch/{url}', [VideoController::class,'show'])->name('watch');
Route::get('watch/{url}', [VideoController::class,'watch']);
Route::get('show/{url}', [VideoController::class,'show'])->name('videos.show');
Route::get('details/{url}', [VideoController::class,'details'])->name('videos.details');
