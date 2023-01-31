<?php

use App\Http\Resources\GangaResource;
use App\Models\Ganga;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('gangas',\App\Http\Controllers\Api\GangaController::class);

Route::get('/gangas/{id}', function ($id) {
   return new GangaResource(Ganga::findOrFail($id));
});

Route::post('login', [\App\Http\Controllers\Api\LoginController::class,'login']);
