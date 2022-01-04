<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DeskController;
use App\Http\Controllers\HomeController;
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
Route::group([
    'as' => 'auth.',
], function () {

    Route::group(['middleware' => 'guest', 'as' => 'login-'], function () {
        Route::get('/', [AuthController::class, 'show'])->name('page');
        Route::post('/', [AuthController::class, 'login'])->name('action');
    });


    Route::get('logout', [AuthController::class, 'logout'])
        ->name('logout')
        ->middleware('auth');
});


Route::group([
    'middleware' => 'auth'
], function () {
    // Home page
    Route::get('/dashboard', HomeController::class)->name('home');

    Route::apiResources([
        'desks'       => DeskController::class,
        'desks.cards' => CardController::class
    ]);
});
