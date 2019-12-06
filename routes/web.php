<?php

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


Route::group(["namespace" => "Login"], function ()
{
    Route::get("/register", "LoginController@showRegisterForm")->name("register");
    Route::post("/register", "LoginController@register")->name("register");


    Route::get("/sign-in", "LoginController@showLoginForm")->name("login");
    Route::post("/sign-in", "LoginController@login")->name("login");

    Route::get("/logout", "LoginController@logout")->name("logout");
});




Route::group(["namespace" => "Front"], function ()
{
    Route::get("/", "HomeController@index")->name("/");

    Route::get("/category-products/{slug}", "HomeController@categoryProducts")->name("category-products");
    Route::get("/product-details/{slug}", "HomeController@productDetails")->name("product-details");

    Route::get("/offerProduct/show", "HomeController@offerProductShow")->name("offer_product.show");
    Route::get("/popularProduct/show", "HomeController@popularProductShow")->name("popular_product.show");

    Route::resource('/carts', 'CartController');
    Route::get('/carts-removeAll', 'CartController@removeAll')->name("carts.removeAll");

    Route::get('/checkout', 'CheckoutController@checkout')->name("checkout");
    Route::post('/checkout', 'CheckoutController@saveOrder')->name("checkout");

    Route::post('/comment', 'HomeController@saveComment')->name("comment.store");

    Route::get('/about-us', 'HomeController@aboutUs')->name("about-us");
    Route::get('/contact-us', 'HomeController@contactUs')->name("contact-us");

    Route::get('/security-policy', 'HomeController@securityPolicy')->name("security-policy");
    Route::get('/shipping-and-replace', 'HomeController@shippingAndReplace')->name("shipping-and-replace");
    Route::get('/privacy-policy', 'HomeController@privacyPolicy')->name("privacy-policy");
    Route::get('/terms-of-use', 'HomeController@termOfUse')->name("terms-of-use");

    Route::get('/developer_info', 'HomeController@developerInfo')->name("developer_info");
});




Route::group(["prefix" => "admin", "namespace" => "Admin", "as" => "admin.", "middleware" => ["auth", "admin"]], function ()
{
    Route::get("/dashboard", "DashboardController@index")->name("dashboard");

    Route::resource("/category", "CategoryController");

    Route::resource("/product", "ProductController");

    Route::resource("/orders", "OrderController");

    Route::resource("/comments", "CommentController");
});

