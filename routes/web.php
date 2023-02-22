<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\AuthController;

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

Route::get('admin', [AuthController::class, 'index'])->name('login');
Route::post('admin', [AuthController::class, 'login'])->name('admin.login');
Route::get('signout', [AuthController::class, 'signOut'])->name('admin.signout');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('books', BookController::class);
});