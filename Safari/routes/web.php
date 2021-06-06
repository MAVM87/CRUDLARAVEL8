<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\RecintoController;

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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/Animal', function () {
//     return view('Animal.indexAnimal');
// });

// Route::get('/Recinto', function () {
//     return view('Recinto.indexRecinto');
// });

// Route::get('/Animal/create', [AnimalController::class,'create']);

Route::resource('Recinto', RecintoController::class)->middleware('auth');

Route::resource('Animal', AnimalController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function () {

   Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
});
