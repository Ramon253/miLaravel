<?php

use App\Http\Controllers\UsersController;
use App\Models\Vinyl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VinylController;
use Illuminate\Support\Facades\Auth;
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
   $vinyls  = Vinyl::all();
   return view('index',[
       'vinyls' => $vinyls
   ]);
});
Route::post('/logout', [UsersController::class, 'logout']);


Route::get('/login', static fn() =>view('user.login'));
Route::post('/login', [UsersController::class, 'login']);

Route::get('/send', function (){
    \Illuminate\Support\Facades\Mail::to('ramontxugallardo@gmail.com')->send(new \App\Mail\auth());
});

Route::resources([
    'user' => UsersController::class,
    'vinyl' => VinylController::class
]);


