<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedBookController;
use App\Http\Controllers\BookCategoryController;

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

Route::get('/', function () {return redirect(route('books.index'));});

Route::group(["middleware"=> ['auth']], function () {
Route::resource('admins',AdminController::class);
Route::resource('users',UserController::class);
Route::resource('borrowbooks',BorrowedBookController::class);
});
Route::resource('books',BookController::class);
Route::resource('bookcategories',BookCategoryController::class);

//Route::post('/login', function () {return view('auth.login');});


use Laravel\Fortify\Fortify;
Fortify::loginView(function () {
    return view('auth.login');
});
Fortify::registerView(function () {
    return view('auth.register');
});