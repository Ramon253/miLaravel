<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Vinyls;

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
   $vinyls  = Vinyls::all();
   return view('index',[
       'vinyls' => $vinyls
   ]);
});
Route::get('/hello/',static function (Request $request) {
    response()->view('welcome')->send();
});
Route::post('/hello', function () {
    dd(request());
});

Route::get('hello/{id}', static fn($id) => ddd())
 ->where('id', '\d+');

