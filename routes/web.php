<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\USerCartController;
use App\Http\Controllers\User\CheckOutController;

require base_path('routes/Admin.php');


Route::get('/',[dashboardcontroller::class,'dashboard'])->name('dashboard');



Route::get('Register',[AuthController::class,'Register'])->name('Register');
Route::post('UserRegister',[Authcontroller::class,'UserRegister'])->name('UserRegister');

Route::get('login',[Authcontroller::class,'login'])->name('Auth.login');
Route::post('getlogin',[Authcontroller::class,'getlogin'])->name('getlogin');
Route::get('Logout',[Authcontroller::class,'Logout'])->name('Logout');


// --------------------------------

Route::get('SingleProduct/{id}',[ShopController::class,'SingleProduct'])->name('SingleProduct');
Route::get('checkout',[CheckOutController::class,'checkout'])->name('checkout');

Route::middleware(['User'])->group(function(){

    Route::get('Shop',[ShopController::class,'Shop'])->name('Shop');
    Route::post('AddToCart',[USerCartController::class,'AddToCart'])->name('User.AddToCart');
    Route::post('descproduct',[USerCartController::class,'descproduct'])->name('User.descproduct');
    Route::post('Incproduct',[USerCartController::class,'Incproduct'])->name('User.Incproduct');
    Route::post('DeleteproId',[USerCartController::class,'DeleteproId'])->name('User.DeleteproId');

    Route::post('Primary_mobile_update',[CheckOutController::class,'Primary_mobile_update'])->name('User.Primary_mobile_update');
    Route::post('Secondary_mobile_update',[CheckOutController::class,'Secondary_mobile_update'])->name('User.Secondary_mobile_update');

    Route::post('delete_secondary',[CheckOutController::class,'delete_secondary'])->name('User.delete_secondary');


});