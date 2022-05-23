<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDestinationController;
use App\Http\Controllers\DashboardImageGalleryController;
use App\Http\Controllers\DashboardTourPackageController;
use App\Http\Controllers\DashboardVideoGalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VideoController;
use App\Models\TourPackage;
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
Route::get('/destination', [HomeController::class, 'destination']);
Route::get('/tour-package', [HomeController::class, 'tour_package']);

Route::get('/images', [ImageController::class, 'index']);
Route::get('/images/show', [ImageController::class, 'show']);
Route::get('/images/getMore', [ImageController::class, 'getMore']);

Route::get('/videos', [VideoController::class, 'index']);
Route::get('/videos/show', [VideoController::class, 'show']);
Route::get('/videos/getMore', [VideoController::class, 'getMore']);



Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/admin/gallery/images', DashboardImageGalleryController::class)->parameters([
    'images' => 'imageGallery:slug'
])->middleware('auth');

Route::resource('/admin/gallery/videos', DashboardVideoGalleryController::class)->parameters([
    'videos' => 'videoGallery:slug'
])->middleware('auth');

Route::resource('/admin/destinations', DashboardDestinationController::class)->parameters([
    'destinations' => 'destination:slug'
])->middleware('auth');

Route::resource('/admin/tour-packages', DashboardTourPackageController::class)->parameters([
    'tour-packages' => 'tour-package:slug'
])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
