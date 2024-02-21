<?php

use App\Http\Controllers\UsersController;
use App\Models\Vinyls;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VinylController;

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

Route::get('/vinyls/{id}', function (Vinyls $vinyl, $id){

})->where('id', '\d+');
Route::resources([
    'user' => UsersController::class,
    'vinyl' => VinylController::class
]);


