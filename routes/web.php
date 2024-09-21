<?php

use App\Enums\Role;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InventoryController;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



//authentication routes

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


//----------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------



//NEW CODES

// Common authentication middleware to ensure users are authenticated, with Jetstream and email verification checks
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {


    // Role-specific routes for suppliers
    Route::middleware(['role:supplier'])->group(function () {
        Route::get('/supplier/dashboard', function () {
            return view('supplier.dashboard');
        })->name('supplier.dashboard');
    });

    // Role-specific routes for admins (if applicable)
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    // Role-specific routes for customer
    Route::middleware(['role:customer'])->group(function () {
        Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    });


});




//-----------------------------------------------------------------------------------------------------------------



//search functionality routing
//Route::get('/home', [FoodItemController::class, 'searchItem'])->name('all-items');

Route::get('/search-items', [FoodItemController::class, 'searchItem'])->name('search-items');

Route::get('/home', [FoodItemController::class, 'index'])->name('home');

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('/all-items', [FoodItemController::class, 'allItems'])->name('all-items');


Route::get('/dashboard', [DashboardController::class, 'authenticated'])->name('dashboard');

//Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/register-supplier', [
    \App\Http\Controllers\SupplierController::class,
    'supplierForm'
])->name('register_supplier');

//Route::post('/register-supplier', [
//    \App\Http\Controllers\SupplierController::class,
//    'updateSupplier'
//])->name('register_supplier.update');

Route::post('/register-supplier', [SupplierController::class, 'store'])->name('register_supplier.store');



// Cart & Payment Routes

Route::post('add_cart/{id}', [DashboardController::class, 'add_cart'])
    ->middleware(['auth', 'verified']);

Route::get('mycart', [DashboardController::class, 'mycart'])
    ->middleware(['auth', 'verified']);

Route::post('remove_cart/{id}', [DashboardController::class, 'remove_cart'])
    ->middleware(['auth', 'verified']);

Route::get('paymentmethod', [DashboardController::class, 'paymentmethod'])
    ->middleware(['auth', 'verified']);

Route::post('confirm_order', [PaymentController::class, 'confirm_order'])
    ->name('confirm_order');

Route::controller(PaymentController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});


// Inventory Routes
//Route::get('/inventory', [InventoryController::class, 'getInventory'])
//    ->name('inventory.index');
//
//Route::get('/inventory/discount', [InventoryController::class, 'applyDiscount'])
//    ->name('inventory.discount');



Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/supplier/dashboard', [SupplierController::class, 'dashboard'])->name('supplier.dashboard');



Route::get('/supplier/food-items', [SupplierController::class, 'foodItems'])->name('supplier.food-items');

Route::get('/supplier/orders', [SupplierController::class, 'orders'])->name('supplier.supplier-orders');

//route for the supplier.edit page
Route::get('/supplier/edit', [SupplierController::class, 'edit'])->name('supplier.edit');

//route for the supplier.update page
Route::post('/supplier/update', [SupplierController::class, 'update'])->name('supplier.update');

//route for the supplier.create page
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');

//route for the supplier.store page
Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');


//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------




// Common Middleware Group (Authentication & Jetstream)
//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//
//    // Role-specific routes
//    Route::middleware('role:supplier')->group(function () {
//        Route::get('/supplier/dashboard', [SupplierController::class, 'dashboard'])->name('supplier.dashboard');
//
//    });
//
//    Route::middleware('role:admin')->group(function () {
//        Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
//    });
//
//    Route::middleware('role:customer')->group(function () {
//        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//    });
//
//
//});
//
//// General Routes
//Route::get('/', [DashboardController::class, 'index'])->name('home');
//Route::get('/home', [FoodItemController::class, 'index'])->name('home');
//Route::get('/all-items', [FoodItemController::class, 'allItems'])->name('all-items');
//Route::get('/search-items', [FoodItemController::class, 'searchItem'])->name('search-items');
//Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//
//
//// Cart & Payment Routes
//Route::post('add_cart/{id}', [DashboardController::class, 'add_cart'])
//    ->middleware(['auth', 'verified']);
//
//Route::get('mycart', [DashboardController::class, 'mycart'])
//    ->middleware(['auth', 'verified']);
//
//Route::post('remove_cart/{id}', [DashboardController::class, 'remove_cart'])
//    ->middleware(['auth', 'verified']);
//
//Route::get('paymentmethod', [DashboardController::class, 'paymentmethod'])
//    ->middleware(['auth', 'verified']);
//
//Route::post('confirm_order', [PaymentController::class, 'confirm_order'])->name('confirm_order');
//
//// Inventory Routes
//Route::get('/inventory', [InventoryController::class, 'getInventory'])->name('inventory.index');
//Route::get('/inventory/discount', [InventoryController::class, 'applyDiscount'])->name('inventory.discount');
//
//// Stripe Payment
//Route::controller(PaymentController::class)->group(function() {
//    Route::get('stripe/{value}', 'stripe');
//    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
//});
//
//
//// Supplier Routes
//Route::get('/supplier/food-items', [SupplierController::class, 'foodItems'])->name('supplier.food-items');
//Route::get('/supplier/orders', [SupplierController::class, 'orders'])->name('supplier.supplier-orders');
//Route::get('/supplier/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
//Route::post('/supplier/update', [SupplierController::class, 'update'])->name('supplier.update');
//Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
//Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
//
//
////Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
////Route::get('/supplier/dashboard', [SupplierController::class, 'dashboard'])->name('supplier.dashboard');
////Route::get('/home', [DashboardController::class, 'index'])->name('home');
//
//
//
//// Supplier Registration
//Route::get('/register-supplier', [SupplierController::class, 'supplierForm'])->name('register_supplier');
//Route::post('/register-supplier', [SupplierController::class, 'store'])->name('register_supplier.store');



