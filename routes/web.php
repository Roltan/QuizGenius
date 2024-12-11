<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('index');
})->name('index');

Route::group(['prefix' => '/profile'], function () {
    Route::get('/', [UserController::class, 'viewProfile']);

    Route::get('/create', function () {
        return view('profile-create');
    });
    Route::get('/solved', function () {
        return view('profile-solved');
    });
    Route::get('/statistic', function () {
        return view('profile-statistic');
    });
});

Route::get('/edit', function () {
    return view('edit');
});
Route::get('/solved', function () {
    return view('solved');
});
Route::get('/test', function () {
    return view('test');
});


Route::get('/logout', [UserController::class, 'logout']);
