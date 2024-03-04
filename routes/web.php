<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\UsersController;
use App\Models\Vinyl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VinylController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;

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

Route::get('/', static function () {
    $vinyls = Vinyl::all();
    return view('index', [
        'vinyls' => $vinyls
    ]);

});

Route::view('/login', 'user.login');

Route::controller(UsersController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout');
    Route::post('/verify', 'verify');
    Route::get('/verify', 'getVerify');
});

Route::controller(CartController::class)->middleware('auth')->group(function () {
    Route::get('/cart', 'index');
    Route::post('/cart/{vinyl}', 'store');
    Route::get('/cart/buy', 'buy');
});

Route::resources([
    'user' => UsersController::class,
    'vinyl' => VinylController::class
]);

Route::controller(OrderController::class)->middleware('auth')->group(function (){
    Route::post('/order/create', 'create');
    Route::post('/order', 'store');
    Route::get('/order', 'index');
});
