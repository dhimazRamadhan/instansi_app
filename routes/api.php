<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\instansi_controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getInstansi', [instansi_controller::class, 'index']); //get all data
Route::post('/createInstansi', [instansi_controller::class, 'store']); //create data
Route::post('/updateInstansi/{id}', [instansi_controller::class, 'update']); //update data


