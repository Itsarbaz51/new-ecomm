<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\AuthAdmin;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

use App\Http\Controllers\Auth\OtpController;

Route::get('otp/verify', [OtpController::class, 'showOtpForm'])->name('otp.verify');
Route::post('otp/verify', [OtpController::class, 'verifyOtp'])->name('otp.verify.submit');
Route::get('otp/resend', [OtpController::class, 'resendOtp'])->name('otp.resend');


// Forgot Password
Route::get('password/forgot', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('password/forgot', [ForgotPasswordController::class, 'sendOtp'])->name('password.email');

Route::get('password/verify-otp', [ForgotPasswordController::class, 'showOtpForm'])->name('password.otp.verify');
Route::post('password/verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('password.otp.verify.submit');

Route::get('password/reset', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset.custom');
Route::post('password/reset', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');





Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('home.privacyPolicy');
Route::get('/refund-policy', [HomeController::class, 'refundPolicy'])->name('home.refundPolicy');
Route::get('/shipping-policy', [HomeController::class, 'shippingPolicy'])->name('home.shippingPolicy');
Route::get('/terms-of-service', [HomeController::class, 'termsOfService'])->name('home.termsOfService');
Route::get('/faqs', [HomeController::class, 'faqs'])->name('home.faqs');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::post('/contact-us/store', [HomeController::class, 'store_contact'])->name('home.contact.store');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');

Route::get('/shop', [ShopeController::class, 'index'])->name('shop.index');
Route::get('/product/details/{product_slug}', [ShopeController::class, 'product_details'])->name('shop.product.details');
Route::post('/reviews/store', [ShopeController::class, 'review_store'])->name('user.reviews.store');


Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart.index');
    Route::post('/cart/add', 'add_to_cart')->name('cart.add');
    Route::put('/cart/increase-quantity/{rowId}', 'increase_cart_quantity')->name('cart.qty.increase');
    Route::put('/cart/decrease-quantity/{rowId}', 'decrease_cart_quantity')->name('cart.qty.decrease');
    Route::delete('/cart/remove/{rowId}', 'remove_item')->name('cart.item.remove');
    Route::delete('/cart/clear', 'empty_cart')->name('cart.empty');

    Route::post('/cart/apply-coupon', 'apply_coupon_code')->name('cart.coupon.apply');
    Route::delete('/cart/coupon/remove', 'remove_coupon_code')->name('cart.coupon.remove');

    Route::get('/checkout', 'checkout')->name('cart.checkout');
    Route::post('/place-an-order', 'place_an_order')->name('cart.place.an.order');
    Route::get('/order_confirmation', 'order_confirmation')->name('cart.order.confirmation');
});
Route::post('/create-razorpay-order', [CartController::class, 'createRazorpayOrder']);


// Route::controller(WishlistController::class)->group(function () {
//     Route::post('/wishlist/add', 'add_to_wishlist')->name('wishlist.add');
//     Route::get('/wishlist', 'index')->name('wishlist.index');
//     Route::delete('/wishlist/item/remove/{rowId}', 'remove_item')->name('wishlist.item.remove');
//     Route::delete('/wishlist/clear', 'empty_wishlist')->name('wishlist.items.clear');
//     Route::post('/wishlist/move-to-cart/{rowId}', 'move_to_cart')->name('wishlist.move.to.cart');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');
    Route::get('/account-orders', [UserController::class, 'orders'])->name('user.orders');
    Route::get('/account-order/{order_id}/details', [UserController::class, 'details_order'])->name('user.order.details');
    Route::put('/account-order/cancel-order', [UserController::class, 'cancel_order'])->name('user.order.cancel');

    Route::get('/account-address', [UserController::class, 'address'])->name('user.address');
    Route::get('/account-address/add', [UserController::class, 'add_address'])->name('user.address.add');
    Route::post('/account-address/store', [UserController::class, 'store_address'])->name('user.address.store');
    Route::get('/account-address/edit/{id}', [UserController::class, 'edit_address'])->name('user.address.edit');
    Route::put('/account-address/update', [UserController::class, 'update_address'])->name('user.address.update');
    Route::delete('/account-address/{id}/delete', [UserController::class, 'delete_address'])->name('user.address.delete');


    // Route::get('/account-details', [UserController::class, 'account_details'])->name('user.account.details');
    Route::get('/account-details/edit/{id}', [UserController::class, 'edit_account_details'])->name('user.account.details.edit');
    Route::put('/account-details/update', [UserController::class, 'update_account_details'])->name('user.account.details.update');



    // Route::get('/account-wishlists', [UserController::class, 'account_wishlists'])->name('user.account.wishlists');



});
Route::post('/newsletter/subscribe', [UserController::class, 'subscribe'])->name('newsletter.subscribe');

Route::middleware(['auth', AuthAdmin::class])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin-dashboard', 'index')->name('admin.index');
        Route::get('/admin/brands', 'brands')->name('admin.brands');
        Route::get('/admin/brand/add', 'add_brand')->name('admin.brand.add');
        Route::post('/admin/brand/store', 'store_brand')->name('admin.brand.store');
        Route::get('/admin/brand/edit/{id}', 'edit_brand')->name('admin.brand.edit');
        Route::put('/admin/brand/update', 'update_brand')->name('admin.brand.update');
        Route::delete('/admin/brand/{id}/delete', 'delete_brand')->name('admin.brand.delete');

        Route::get('/admin/categories', 'categories')->name('admin.categories');
        Route::get('/admin/category/add', 'add_category')->name('admin.category.add');
        Route::post('/admin/category/store', 'store_category')->name('admin.category.store');
        Route::get('/admin/category/edit/{id}', 'edit_category')->name('admin.category.edit');
        Route::put('/admin/category/update', 'update_category')->name('admin.category.update');
        Route::delete('/admin/category/{id}/delete', 'delete_category')->name('admin.category.delete');

        Route::get('/admin/products', 'products')->name('admin.products');
        Route::get('/admin/product/add', 'add_products')->name('admin.product.add');
        Route::post('/admin/product/store', 'store_product')->name('admin.product.store');
        Route::get('/admin/product/edit/{id}', 'edit_product')->name('admin.product.edit');
        Route::put('/admin/product/update', 'update_product')->name('admin.product.update');
        Route::delete('/admin/product/{id}/delete', 'delete_product')->name('admin.product.delete');

        Route::get('/admin/coupons', 'coupons')->name('admin.coupons');
        Route::get('/admin/coupon/add', 'add_coupon')->name('admin.coupon.add');
        Route::post('/admin/coupon/store', 'store_coupon')->name('admin.coupon.store');
        Route::get('/admin/coupon/{id}/edit', 'edit_coupon')->name('admin.coupon.edit');
        Route::put('/admin/coupon/update', 'update_coupon')->name('admin.coupon.update');
        Route::delete('/admin/coupon/{id}/delete', 'delete_coupon')->name('admin.coupon.delete');

        Route::get('/admin/orders', 'orders')->name('admin.orders');
        Route::get('/admin/order/{order_id}/details', 'details_order')->name('admin.order.details');
        Route::put('/admin/order/update-status', 'update_order_status')->name('admin.order.status.update');


        // Route::get('/order-tracking', 'trackingPage')->name('order.tracking');

        // Handle the tracking request
        // Route::get('/track', 'track')->name('track');


        Route::get('/admin/slides', 'slides')->name('admin.slides');
        Route::get('/admin/slide/add', 'add_slide')->name('admin.slide.add');
        Route::post('/admin/slide/add', 'store_slide')->name('admin.slide.store');
        Route::get('/admin/slide/edit/{id}', 'edit_slide')->name('admin.slide.edit');
        Route::put('/admin/slide/update', 'update_slide')->name('admin.slide.update');
        Route::delete('/admin/slide/{id}/delete', 'delete_slide')->name('admin.slide.delete');

        Route::get('/admin/contacts', 'contacts')->name('admin.contacts');
        Route::delete('/admin/contact/{id}/details', 'delete_contact')->name('admin.contact.details');

        Route::get('/admin/search', 'search')->name('admin.search');

        Route::get('/admin/users', 'users')->name('admin.users');

        Route::get('/admin/account/edit/{id}', 'edit_account_details')->name('admin.account.edit');
        Route::put('/admin/account/update', 'update_account_details')->name('admin.account.update');


        Route::get('/admin/profile', 'profile')->name('admin.profile');
        // Route::get('/admin/inbox', 'inboxs')->name('admin.inbox');

        Route::get('/users-reviews', 'users_reviews')->name('admin.uses-reviews');
        Route::delete('/users-reviews/{id}/delete', 'delete_reviews')->name('admin.uses-reviews.delete');

        Route::get('/admin/orders/count', function () {
            return response()->json([
                'count' => Order::whereDate('created_at', today())->count()
            ]);
        })->name('admin.orders.count');

    });


});
