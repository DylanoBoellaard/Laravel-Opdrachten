<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pagina2', function () {    // /pagina2 = webpage name. href link refers to here
    return view('pagina2');             // view('pagina2') is file name
});


// CRUD SYSTEM - PRODUCTS
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
// User types URL (/product) > route passes info to controller class then to index function

Route::get('/product/create', [ProductController::class, 'create'])->name('product.create'); // Create a new product

Route::post('/product', [ProductController::class, 'store'])->name('product.store'); // Post / send data to database

Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit'); // Variable {product} needs to be sent to model as parameter

Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update'); // Route to update values to database

Route::delete('/product/{product}/delete', [ProductController::class, 'delete'])->name('product.delete'); // To delete row from database


// CRUD SYSTEM - SHOPS
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

Route::get('/shop/create', [ShopController::class, 'create'])->name('shop.create');

Route::post('/shops', [ShopController::class, 'store'])->name('shop.store');

Route::get('/shops/{shop}/edit', [ShopController::class, 'edit'])->name('shop.edit');

Route::put('/shops/{shop}/update', [ShopController::class, 'update'])->name('shop.update');

Route::delete('/shops/{shop}/delete', [ShopController::class, 'delete'])->name('shop.delete');

// ACCOUNT SYSTEM
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {      // Only people logged in can access these pages
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';