<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('admin')->group(function () {

});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', isAdmin::class]], function () {
    Route::resource('user', UserController::class);
});

Route::get('/', function () {
    return view('layouts.backend');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/welcome', function () {
    return view('layouts.frontend');
});
