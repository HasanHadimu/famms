<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    //route admin ke halaman admin.home
    Route::get('/redirect', [Homecontroller::class, 'redirect']);
});

//route user ke halaman view.home
Route::get('/', [Homecontroller::class, 'index']);

// route ke admin.view_kategori
Route::get('/view_category', [AdminController::class, 'view_category']);


// route ke add_category
Route::post('/add_category', [AdminController::class, 'add_category']);

// route ke admin-delete category
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

// route ke product - view.product
Route::get('/view_product', [AdminController::class, 'view_product']);

// route ke product - admin - add product
Route::post('/add_product', [AdminController::class, 'add_product']);

// route ke admin show-product
Route::get('/show_product', [AdminController::class, 'show_product']);

// route untuk menghapus product
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

// route untuk update product
Route::get('/update_product/{id}', [AdminController::class, 'update_product']);
