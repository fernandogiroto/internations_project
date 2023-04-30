<?php

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

// Rota Principal - home
// Rota Inicial - Login

Auth::routes();
Route::get('/', function () { return view('dashboard');})->middleware('auth');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
