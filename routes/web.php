<?php
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
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



Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('master');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Uploader
Route::post('/aiz-uploader', [UploadController::class, 'show_uploader'])->name('aiz.uploader');
Route::post('/aiz-uploader/upload', [UploadController::class, 'upload']);
Route::get('/aiz-uploader/get_uploaded_files', [UploadController::class, 'get_uploaded_files']);
Route::post('/aiz-uploader/get_file_by_ids', [UploadController::class, 'get_preview_files']);
Route::get('/aiz-uploader/download/{id}', [UploadController::class, 'attachment_download'])->name('download_attachment');

Auth::routes();

Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/category/{slug}', [HomeController::class, 'getProductByCategory'])->name('product_by_category');
Route::get('/item/{slug}', [HomeController::class, 'getProductDetailsBySlug'])->name('product_details');
Route::get('/offer/{slug}', [HomeController::class, 'getOfferDetailsBySlug'])->name('offer.details');

Route::post('/checkout/buynow', [HomeController::class, 'checkout'])->name('checkout.buyNow');

Route::post('/checkout/store', [HomeController::class, 'checkout_done'])->name('checkout.done');

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/orders', [UserDashboardController::class, 'orders'])->name('user.orders');
    Route::get('/order/detail/{id}', [UserDashboardController::class, 'orderDetails'])->name('user.order_details');

    Route::get('/account', [UserDashboardController::class, 'account'])->name('user.accounts');
    Route::post('/update-info', [UserDashboardController::class, 'updateInfo'])->name('user.update_info');
    Route::post('/update-password', [UserDashboardController::class, 'updatePassword'])->name('user.update_password');

    Route::post('/product/review/store', [ReviewController::class, 'store'])->name('product.review_store');
});

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => ['auth', 'admin']], function() {

        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

        // Menus
        Route::resource('categories', CategoryController::class);
        Route::resource('subcategories', SubCategoryController::class);


        // Product  Offer ...
        Route::get('/products/offers', [OfferController::class, 'index'])->name('products.combo_offer');
        Route::get('/products/offer_create', [OfferController::class, 'create'])->name('products.offer_create');
        Route::post('/selected-products-total', [OfferController::class, 'getSelectedProductsTotal'])->name('get_total');
        Route::post('/products/offer_store', [OfferController::class, 'store'])->name('products.offer_store');
        Route::get('/products/offer_edit/{id}', [OfferController::class, 'edit'])->name('products.offer_edit');
        Route::post('/products/offer_update/{id}', [OfferController::class, 'update'])->name('products.offer_update');
        Route::post('/products/offer_delete/{id}', [OfferController::class, 'delete'])->name('products.offer_delete');

        // Product
        Route::resource('products', ProductController::class);
        Route::post('/get_subcategories', [ProductController::class, 'getSubcategoryById'])->name('get_subcategories');

        Route::resource('orders', OrderController::class);

        // Website Settings
        Route::get('/website/header', [SettingsController::class, 'index'])->name('settings.header');
        Route::get('/website/footer', [SettingsController::class, 'footer'])->name('settings.footer');

        Route::resource('pages', PageController::class);
        Route::get('/settings', [SettingsController::class, 'settings'])->name('profile.settings');
        Route::post('/settings', [SettingsController::class, 'update_settings'])->name('profile.update_settings');

        Route::get('/setting/banner', [SettingsController::class, 'banner'])->name('settings.banner');

        Route::post('/settings/update_password', [SettingsController::class, 'update_password'])->name('profile.update_password');
        Route::post('/update/business_setting', [SettingsController::class, 'update'])->name('update.business_setting');


        // Product Review
        Route::get('/product/review/', [ReviewController::class, 'index'])->name('products.review-get');
        Route::get('/product/review-approve/{id}', [ReviewController::class, 'approve'])->name('review-approve');
        Route::get('/product/review-delete/{id}', [ReviewController::class, 'delete'])->name('review-delete');
    });



});
