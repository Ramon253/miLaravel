<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
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
    return view('welcome');
});
Route::get('/hello',static function (Request $request) {
    response()
        ->json(["message" => 'First API part'])
        ->send();
});

Route::get('hello/{id}', static fn($id) => ddd())
 ->where('id', '\d+');
