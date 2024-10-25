<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

///// index Home Page Routes /////

Route::get('/',[HomeController::class,'my_home']);
Route::get('/home',[HomeController::class,'index']);

///// Admin Controller Form Routes /////

Route::get('/add_food',[AdminController::class,'add_food']);                // to display add_food Form
Route::get('/view_food',[AdminController::class,'view_food']);              // to view All Data from food table view_food Form
Route::post('/upload_food',[AdminController::class,'upload_food']);         // to add record in food table via upload_food route

Route::get('/update_food/{id}',[AdminController::class,'update_food']);     // to get record from food table via update_food form
Route::post('/edit_food/{id}',[AdminController::class,'edit_food']);        // to update record in food table via edit_food route

Route::get('/delete_food/{id}',[AdminController::class,'delete_food']);     // to delete record from food table via delete_food route

///// Home Controller Form Routes /////

Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);           // to add record in cart table via add_cart route
Route::get('/my_cart',[HomeController::class,'my_cart']);                   // to view record from cart table via my_cart route
Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);      // to delete record from food table via delete_food route

///// Order Controller Form Routes /////

Route::post('/confirm_order',[HomeController::class,'confirm_order']);      // to view record from cart table & post in order table via user login route
Route::get('/orders',[AdminController::class,'orders']);                    // to view record from order table via admin login route

Route::get('/on_the_way/{id}',[AdminController::class,'on_the_way']);       // to change order status record in order table via admin login route
Route::get('/delivered/{id}',[AdminController::class,'delivered']);         // to change order status record in order table via admin login route
Route::get('/cancelled/{id}',[AdminController::class,'cancelled']);         // to change order status record in order table via admin login route

///// Book Table Controller Form Routes /////

Route::post('/book_table',[HomeController::class,'book_table']);            // to add record in book table via user login route
Route::get('/reservations',[AdminController::class,'reservations']);        // to view booking record from book table via admin login route

Route::get('/table_pending/{id}',[AdminController::class,'table_pending']);       // to change order status record in book table via admin login route
Route::get('/table_confirm/{id}',[AdminController::class,'table_confirm']);       // to change order status record in book table via admin login route
Route::get('/table_cancelled/{id}',[AdminController::class,'table_cancelled']);   // to change order status record in book table via admin login route


///// Theme Default Routes /////

Route::middleware([    
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',    
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
