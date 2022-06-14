<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('theme.home');
});

// Uploader
Route::post('/aiz-uploader', [UploadController::class, 'show_uploader'])->name('aiz.uploader');
Route::post('/aiz-uploader/upload', [UploadController::class, 'upload']);
Route::get('/aiz-uploader/get_uploaded_files', [UploadController::class, 'get_uploaded_files']);
Route::post('/aiz-uploader/get_file_by_ids', [UploadController::class, 'get_preview_files']);
Route::get('/aiz-uploader/download/{id}', [UploadController::class, 'attachment_download'])->name('download_attachment');

Route::prefix('admin')->group(function () {
    Auth::routes();

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('products', ProductController::class);
    Route::post('/get_subcategories', [ProductController::class, 'getSubcategoryById'])->name('get_subcategories');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
