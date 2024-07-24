<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Management\UserController;
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

Route::get('/health-check', function () {
    return response()->json(['status' => 'healthy'], 200);
});

Auth::routes();

Route::prefix('/')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::prefix('/management')->name('management.')->group(function () {
        Route::prefix('/user')->name('user.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/edit', [UserController::class, 'edit'])->name('edit');
            Route::put('/update', [UserController::class, 'update'])->name('update');
        });
    });
});
