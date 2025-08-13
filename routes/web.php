<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\User\UserOrderController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Admin\PromotionController;


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

Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return 'DONE'; //Return anything
});
Auth::routes();

foreach (config('redirects', []) as $from => $to) {
    Route::permanentRedirect($from, $to);
}


Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/detail', [FrontController::class, 'detail'])->name('detail');
Route::get('/ourProduct', [FrontController::class, 'showAllProducts'])->name('allproduct');
Route::get('/categoryProduct/{name}', [FrontController::class, 'showCategoryProducts'])->name('catProduct');
Route::get('/product-detail/{slug}', [FrontController::class, 'productDetail'])->name('product-detail');
Route::post('/submit-review', [FrontController::class, 'review'])->name('submit.review');

Route::get('/quick_view/{id}', [FrontController::class, 'getProduct']);
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');

Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/view', [CartController::class, 'viewCart'])->name('cart.view');
Route::get('/cart/items', [CartController::class, 'getCartItems'])->name('cart.items');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
 
Route::post('/wishlist/add', [CartController::class, 'addToWishlist'])->name('wishlist.add');
Route::get('/wishlist/count', [CartController::class, 'wishlistCount'])->name('wishlist.count');
Route::get('/wishlist', [FrontController::class, 'wishlistPage'])->name('wishlist.page');

Route::post('/compare/add', [CartController::class, 'addTocompare'])->name('product.compare');
Route::get('/compare/count', [CartController::class, 'compareCount'])->name('product.compare.count');
Route::get('/compare/product', [FrontController::class, 'comparePage'])->name('compare.page');

Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
Route::get('/payment/callback', [OrderController::class, 'paymentCallback'])->name('payment.callback');
Route::get('/thank-you', [OrderController::class, 'thankYou'])->name('thank-you');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/help', [FrontController::class, 'help'])->name('help');
Route::get('/getEstimate', [FrontController::class, 'getEstimate'])->name('getEstimate');
 
Route::get('/filter-products', [FrontController::class, 'filterProducts'])->name('products.filter');

Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');
Route::get('/privacy-policy', [FrontController::class, 'PrivacyPolicy'])->name('privacyPolicy');

// Admin Routes

Route::get('/admin/login', [PageController::class, 'adminlogin'])->name('admin')->middleware('guest:admin');

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/profile', [PageController::class, 'AdminProfile'])->name('profile');
    Route::post('/profile', [PageController::class, 'profilesave'])->name('profile');
    Route::post('/profileupdate', [PageController::class, 'profileupdate'])->name('profileupdate');
    Route::get('/adminchangepassword', [PageController::class, 'adminchangepassword'])->name('adminchangepassword');
    Route::post('/adminupdatepassword', [PageController::class, 'adminupdatepassword'])->name('adminupdatepassword');

    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::resource('/category', CategoryController::class);
    Route::resource('product', ProductController::class);

    Route::resource('/order', AdminOrderController::class);
    Route::get('/admin/orders/{id1}/update-status/{id2}', [AdminOrderController::class, 'updateStatus'])->name('order-st');
    Route::get('/subscribers', [PageController::class, 'subscribers'])->name('subscribers.index');
    Route::delete('/subscriber/{id}', [PageController::class, 'subscriberDestroy'])->name('subscriber.destroy');


    Route::get('/promotion', [PromotionController::class, 'index'])->name('promotion.index');
    Route::post('/promotion', [PromotionController::class, 'store'])->name('promotion.store');

});


// User Routes
Route::get('/login', [FrontController::class, 'login'])->name('login');

Route::post('/userlogin', [UserLoginController::class, 'login'])->name('user.login');
Route::post('/userlogout', [UserLoginController::class, 'logout'])->name('user.logout');

Route::get('/register', [FrontController::class, 'register_form'])->name('register_user');
Route::post('/user-register', [UserController::class, 'userregister'])->name('user.register');

Route::prefix('user')->middleware('auth:user')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('user-profile');
    Route::post('/profile', [UserController::class, 'profilesave'])->name('user-profile');
    Route::post('/profileupdate', [UserController::class, 'profileupdate'])->name('userprofileupdate');
    Route::get('/changepassword', [UserController::class, 'userchangepassword'])->name('userchangepassword');
    Route::post('/updatepassword', [UserController::class, 'userupdatepassword'])->name('userupdatepassword');

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user-dashboard');
    Route::resource('/userOrder', UserOrderController::class);

});
