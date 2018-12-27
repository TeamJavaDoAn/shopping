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

Route::namespace('Frontend')->group(function () {

    Route::get("/", "HomeController@index")->name('home');
    Route::get("/cate", "CateController@index")->name('cate');
    Route::get("/laptop", "ProductController@laptop")->name('laptop');
    Route::get("/smartphone", "ProductController@smartphone")->name('smartphone');
    Route::get("/cameras", "ProductController@cameras")->name('cameras');
    Route::get("/contact", "ProductController@contact")->name('contact');

    Route::get("/register", "RegisterController@register")->name('register');
    Route::post("/handlingRegister", "RegisterController@handlingRegister")->name('handlingRegister');
    Route::get("/login", "LoginController@login")->name('login');
    Route::get("/forgotPassword", "ForgotPasswordController@forgotPassword")->name('forgotPassword');
});