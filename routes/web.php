<?php

use App\Http\Controllers\PageController;
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

Route::get('/', function () {
    return view('welcome');
});
// Amin Page
Route::get('/admin', [PageController::class,'getAdmin']);
// Login admin
Route::get('/login-admin', function () {
    return view('Admins.Page.login');
});
Route::post('/login-admin',[PageController::class,'login_admin']);

// Signup Admin
Route::get('/signup-admin', function () {
    return view('Admins.Page.signup');
});
Route::post('/signup-admin',[PageController::class,'add_admin']);
Route::get('logout-admin',[PageController::class,'Logout_admin']);
// Get data

Route::get('/blog-admin', function () {
    return view('Admins.Page.blog');
});

// CRUD PRODUCT
Route::get('/product-admin',[PageController::class,'getAdmin']);
Route::get('/edited-products/{id}',[PageController::class,'editProducts']);
Route::post('/edit-products',[PageController::class,'postEditProduct']);
Route::get('/add-products',[PageController::class,'getAdd']);
Route::post('/post-products',[PageController::class,'postAdd']);
Route::post('admin-delete/{id}',[PageController::class,'postDelete']);

// 
Route::get('charts',[PageController::class,'getAdminChart']);

