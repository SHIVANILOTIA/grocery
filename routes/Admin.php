<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\adminController;
use  App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;

Route::middleware(['Admin'])->group(function() {
    Route::get('AdminDashboard', [adminController::class, 'AdminDashboard'])->name('Admin.Dashboard');

    Route::get('Userlist', [UserController::class, 'Userlist'])->name('Admin.Userlist');
    
    Route::get('product',[ProductController::class,'product'])->name('Admin.ProductList');
    Route::post('Addproduct',[ProductController::class,'Addproduct'])->name('Admin.Addproduct');

    Route::get('Active/{id}',[ProductController::class,'Active'])->name('Admin.Active');
    Route::get('InActive/{id}',[ProductController::class,'InActive'])->name('Admin.InActive');

    Route::post('EditProduct',[ProductController::class,'EditProduct'])->name('Admin.EditProduct');
    Route::post('updateproduct',[ProductController::class,'updateproduct'])->name('Admin.updateproduct');

    Route::get('delete/{id}',[ProductController::class,'delete'])->name('Admin.delete');
    
});

