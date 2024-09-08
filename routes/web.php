<?php

use App\Enums\Role;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
//


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'role:supplier'])->group(function () {
    Route::get('/supplier/dashboard', function () {
        return view('supplier.dashboard');
    })->name('supplier.dashboard');
});



// Group routes that require authentication
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Common authenticated routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Cart routes
    Route::post('add_cart/{id}', [DashboardController::class, 'add_cart']);
    Route::get('mycart', [DashboardController::class, 'mycart']);
    Route::post('remove_cart/{id}', [DashboardController::class, 'remove_cart']);
    Route::get('paymentmethod', [DashboardController::class, 'paymentmethod']);



});

// Public routes
Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/home', [FoodItemController::class, 'index'])->name('home');
Route::get('/all-items', [FoodItemController::class, 'allItems'])->name('all-items');
Route::get('/search-items', [FoodItemController::class, 'searchItem'])->name('search-items');

Route::get('/register-supplier', [SupplierController::class, 'supplierForm'])->name('register_supplier');
Route::post('/register-supplier', [SupplierController::class, 'store'])->name('register_supplier.store');

Route::get('/pickup-scheduling', [PaymentController::class, 'showPickupSchedulingPage'])->name('pickup.scheduling');
Route::get('/online-payment', [PaymentController::class, 'showOnlinePaymentPage'])->name('online.payment');

// Resource routes
Route::resource('fooditems', FoodItemController::class);
