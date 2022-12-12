<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//=============FRONTEND CONTROLLER START ==============
Route::get('/',[FrontendController::class, 'welcome']);
Route::get('home', [FrontendController::class, 'homePage']);
Route::get('category', [FrontendController::class, 'categoryPage']);
//=============FRONTEND CONTROLLER END ==============



//================BACKEND CONTROLLER START====================
Route::get('dashboard', [BackendController::class, 'backendDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

//CATEGORY
Route::get('category/all', [BackendController::class, 'BackendCategory']);
Route::get('category/add', [BackendController::class, 'BackendAddCategory']);
Route::post('category/insert', [BackendController::class, 'categoryInsert']);
Route::get('category/update/{category_id}', [BackendController::class, 'updateCategory']);
Route::post('category/edit/{category_id}', [BackendController::class, 'editCategory']);
Route::get('category/delete/{category_id}', [BackendController::class, 'deleteCategory']);
Route::get('category/permanent/delete/{category_id}', [BackendController::class, 'permanentDelete']);
Route::get('category/restore/{category_id}', [BackendController::class, 'categoryRestore']);


//PRODUCT
Route::get('products/all', [BackendController::class, 'products']);
Route::get('product/add', [BackendController::class, 'productAdd']);
Route::post('product/insert', [BackendController::class, 'productInsert']);
Route::get('product/delete/{product_id}', [BackendController::class, 'productDelete']);
Route::get('product/permanent/delete/{product_id}', [BackendController::class, 'productPermanentDelete']);
Route::get('product/restore/{product_id}', [BackendController::class, 'productRestore']);
Route::get("product/edit/{product_id}", [BackendController::class, 'editPage']);
Route::post("product/update/{product_id}", [BackendController::class, 'productUpdate']);



//USERS
Route::get("login/users", [BackendController::class, 'users']);










//================BACKEND CONTROLLER END ======================

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
