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

///// Currency Table Controller Form Routes /////

    Route::get('/currency',[AdminController::class,'view_currency']);
    Route::post('/add_currency',[AdminController::class,'add_currency']);

    Route::get('/edit_currency/{currencyId}',[AdminController::class,'edit_currency']);
    Route::post('/update_currency/{currencyId}',[AdminController::class,'update_currency']);

    Route::get('/delete_currency/{currencyId}',[AdminController::class,'delete_currency']);

///// Area Table Controller Form Routes /////

    Route::get('/area',[AdminController::class,'view_area']);
    Route::post('/add_area',[AdminController::class,'add_area']);

    Route::get('/edit_area/{areaId}',[AdminController::class,'edit_area']);
    Route::post('/update_area/{areaId}',[AdminController::class,'update_area']);

    Route::get('/delete_area/{areaId}',[AdminController::class,'delete_area']);

///// Accounts Type Table Controller Form Routes /////

    Route::get('/acctype',[AdminController::class,'view_acctype']);
    Route::post('/add_acctype',[AdminController::class,'add_acctype']);

    Route::get('/edit_acctype/{accTypeId}',[AdminController::class,'edit_acctype']);
    Route::post('/update_acctype/{accTypeId}',[AdminController::class,'update_acctype']);

    Route::get('/delete_acctype/{accTypeId}',[AdminController::class,'delete_acctype']);

///// Accounts Parent Table Controller Form Routes /////

    Route::get('/accparent',[AdminController::class,'view_accparent']);
    Route::post('/add_accparent',[AdminController::class,'add_accparent']);

    Route::get('/edit_accparent/{parentId}',[AdminController::class,'edit_accparent']);
    Route::post('/update_accparent/{parentId}',[AdminController::class,'update_accparent']);

    Route::get('/delete_accparent/{parentId}',[AdminController::class,'delete_accparent']);

///// Accounts Table Controller Form Routes /////

    Route::get('/accounts',[AdminController::class,'view_accounts']);
    Route::post('/add_account',[AdminController::class,'add_account']);

    Route::get('/edit_account/{acId}',[AdminController::class,'edit_account']);
    Route::post('/update_account/{acId}',[AdminController::class,'update_account']);

    Route::get('/delete_account/{acId}',[AdminController::class,'delete_account']);

///// Vouchers Table Controller Form Routes /////

    // Route::get('/crv/{uid}/{voucherPrefix?}', [AdminController::class, 'view_vouchers']);
    // Route::get('/crv/{voucherPrefix}', [AdminController::class, 'view_vouchers']);

    Route::get('/crv', [AdminController::class, 'view_vouchersCR']);
    Route::get('/cpv', [AdminController::class, 'view_vouchersCP']);
    Route::get('/jv', [AdminController::class, 'view_vouchersJV']);

    Route::post('/add_crv/{CR}',[AdminController::class,'add_voucher']);
    Route::post('/add_cpv/{CP}',[AdminController::class,'add_voucher']);
    Route::post('/add_jv/{JV}',[AdminController::class,'add_voucher']);

    Route::get('/edit_crv/{voucherId}',[AdminController::class,'edit_crv']);
    Route::get('/edit_cpv/{voucherId}',[AdminController::class,'edit_cpv']);
    Route::get('/edit_jv/{voucherId}',[AdminController::class,'edit_jv']);

    Route::post('/update_crv/{voucherId}',[AdminController::class,'update_voucher']);
    Route::post('/update_cpv/{voucherId}',[AdminController::class,'update_voucher']);
    Route::post('/update_jv/{voucherId}',[AdminController::class,'update_voucher']);

    Route::get('/delete_voucher/{voucherId}',[AdminController::class,'delete_voucher']);    

///// Reports Controller Form Routes /////

    Route::get('/ac_ledger',[AdminController::class,'ac_ledger']);
    Route::get('/cash_book',[AdminController::class,'cash_book']);
    Route::get('/trail_balance',[AdminController::class,'trail_balance']);


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