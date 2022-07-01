<?php

use App\Http\Controllers\Api\miscallenous;
use App\Http\Controllers\index;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('call-back',[miscallenous::class,'callback'])->middleware('token');
Route::post('data',[miscallenous::class, 'data'])->middleware('token');
Route::post('cable',[miscallenous::class,'cable'])->middleware('token');
Route::post('meter',[miscallenous::class,'meter'])->middleware('token');
Route::post('airtime',[miscallenous::class,'airtime'])->middleware('token');
