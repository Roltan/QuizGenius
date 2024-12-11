<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
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
    Route::get('/', [ViewController::class, 'viewProfile']);

    Route::get('/create', function () {
        return view('profile-create');
    });
    Route::get('/solved', [ViewController::class, 'viewSolved']);
    Route::get('/statistic', [ViewController::class, 'viewStatistic']);
});

Route::get('/edit', function () {
    return view('edit');
});
Route::get('/solved', function () {
    return view('solved');
});
Route::get('/test/{alias}', [ViewController::class, 'viewTest']);


Route::get('/logout', [UserController::class, 'logout']);
