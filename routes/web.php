<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BbsController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\detailController;


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
    return view('welcome');
});

Route::get('bbs',[BbsController::class,'index'])-> name('bbs');
Route::post('bbs_add',[BbsController::class,'add']);
Route::get('/delete/{id}',[BbsController::class,'delete']);

Route::get('/home', [homeController::class, 'index'])->name('home');
Route::get('/detail',[detailController::class, 'index'])->name('detail');
