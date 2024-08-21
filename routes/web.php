<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\PaymentController;

use Illuminate\Support\Facades\Route;





Route::get('/login', function (){
    return view('auth.login');
})->name('login');

Route::get('/register', function (){
    return view('auth.register');
})->name('register');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

//Route::get('/profile', function () {
//    return view('profile.show');
//})->name('profile.show');

Route::get('/home', [FoodItemController::class, 'index'])->name('home');

Route::get('/home', [DashboardController::class, 'index'])->name('home');

//search functionality routing
Route::get('/home', [FoodItemController::class, 'searchItem'])->name('all-items');


Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('/all-items', [FoodItemController::class, 'allItems'])->name('all-items');

Route::get('/register-supplier', [
    \App\Http\Controllers\SupplierController::class,
    'supplierForm'
])->name('register_supplier');

Route::post('/register-supplier', [
    \App\Http\Controllers\SupplierController::class,
    'updateSupplier'
])->name('register_supplier.update');

Route::get('/choose-role', function () {
    return view('choose-role');
})->name('choose-role');


Route::get('/authentication', function () {
    return view('home');
})
    ->middleware(['auth'])
    ->name('dashboard');






Route::post('add_cart/{id}', [DashboardController::class, 'add_cart'])
    ->middleware(['auth', 'verified']);

Route::get('mycart', [DashboardController::class, 'mycart'])
    ->middleware(['auth', 'verified']);

Route::post('remove_cart/{id}', [DashboardController::class, 'remove_cart'])
    ->middleware(['auth', 'verified']);

Route::get('paymentmethod', [DashboardController::class, 'paymentmethod'])
    ->middleware(['auth', 'verified']);


Route::get('/order-confirmation', [PaymentController::class, 'showOrderConfirmationPage'])
    ->name('order.confirmation');

Route::get('order-confirmation', [PaymentController::class, 'confirmationSummary'])
    ->name('order.confirmation');

Route::post('confirm_order',[PaymentController::class, 'confirm_order'])
    ->middleware(['auth', 'verified']);

Route::get('/online-payment', [PaymentController::class, 'showOnlinePaymentPage'])
    ->name('online.payment');




Route::get('/supplier/dashboard', [SupplierDashboardController::class, 'index'])->name('supplier.dashboard');

Route::middleware(['auth', 'role:supplier'])->group(function () {
    Route::get('/supplier/dashboard', function () {
        return view('supplier.dashboard'); // Assuming 'supplier.dashboard' is the view file
    })->name('supplier.dashboard');
});

