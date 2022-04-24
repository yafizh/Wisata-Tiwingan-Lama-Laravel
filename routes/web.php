<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardImageGalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/images', [ImageController::class, 'index']);
Route::get('/videos', [VideoController::class, 'index']);
Route::get('/admin', [DashboardController::class, 'index']);

Route::resource('/admin/gallery/images', DashboardImageGalleryController::class)->parameters([
    'images' => 'imageGallery:slug'
]);
