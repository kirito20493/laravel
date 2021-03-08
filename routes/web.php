<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'checkLogin'])->name('check-login');

Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'storeUser'])->name('add-user');

Route::prefix('home')->group(function (){
    Route::get('/',[HomeController::class, 'index'])->name('home')->middleware('auth');
    Route::get('/logout',[UserController::class, 'logout'])->name('logout');
});
// USER
Route::prefix('user')->group(function(){
    Route::get('/showlist',[HomeController::class, 'showListUser'])->name('show-list-user');
    Route::get('/delete/{id}',[UserController::class, 'destroyUser'])->name('destroy-user');
    Route::get('/edit',[UserController::class, 'editPasswordUser'])->name('edit-user');
    Route::post('/edit',[UserController::class, 'updatePasswordUser'])->name('update-user');
});

// CATAGORY
Route::prefix('catagory')->group(function (){
    Route::get('/',[CatagoryController::class, 'showListCatagory'])->name('show-list-catagory');
    Route::get('/delete/{id}', [CatagoryController::class, 'deletaCatagory'])->name('delete-catagory');
    Route::get('/edit/{id}', [CatagoryController::class, 'showFormUpdateCatagory'])->name('show-editcatagory');
    Route::post('/edit/{id}', [CatagoryController::class, 'updateCatagory'])->name('update-catagory');
    Route::get('/add', [CatagoryController::class, 'showAddCatagory'])->name('show-addcatagory');
    Route::post('/add', [CatagoryController::class, 'creatCatagory'])->name('create-catagory');
    Route::get('/detail/{id}', [CatagoryController::class, 'showDetailCatagory'])->name('show-catagory');
});

// PRODUCT
Route::group(['prefix'=>'product'], function(){
    Route::get('/',[ProductController::class, 'index'])->name('show-list-product');
    Route::get('/create',[ProductController::class, 'create'])->name('create-product');
    Route::post('/create',[ProductController::class, 'store'])->name('store-product');
    Route::get('/update/{id}',[ProductController::class, 'edit'])->name('edit-product');
    Route::post('/update/{id}',[ProductController::class, 'update'])->name('update-product');
    Route::get('/destroy/{id}',[ProductController::class, 'destroy'])->name('destroy-product');
    Route::get('/detail/{id}',[ProductController::class, 'show'])->name('show-product');
});