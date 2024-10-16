<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

Route::get('/',[HomeController::class,'my_home']);

Route::get('/home',[HomeController::class,'index']);

Route::get('/add_food',[AdminController::class,'add_food']);                // to display add_food Form

Route::get('/view_food',[AdminController::class,'view_food']);              // to view All Foods view_food Form

Route::post('/upload_food',[AdminController::class,'upload_food']);         // to add record in table via upload_food route

Route::get('/update_food/{id}',[AdminController::class,'update_food']);     // to get record from table via update_food form

Route::post('/edit_food/{id}',[AdminController::class,'edit_food']);        // to update record in table via edit_food route

Route::get('/delete_food/{id}',[AdminController::class,'delete_food']);    // to delete record from table via delete_food route

Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);        // to update record in table via edit_food route

Route::middleware([
    
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
