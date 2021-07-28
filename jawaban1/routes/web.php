<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\dataController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [dataController::class, 'index']);
Route::get('/data/add', [dataController::class, 'add']);
Route::post('/data/store', [dataController::class, 'store']);
Route::get('/data/edit/{id}',[dataController::class, 'edit']);
Route::post('/data/update', [dataController::class, 'update']);
Route::get('/data/delete/{id}', [dataController::class, 'delete']);
