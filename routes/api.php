<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\api\TugasController;
use App\Http\Controllers\api\HargabahanController;


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

Route::middleware('auth:sanctum')->get('/user/revoke', function(Request $request){
 $user = $request->user();
 $user->tokens()->delete();
 return 'token are delete';
});

Route::prefix('auth')->group(function () {
    
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);

    

});
Route::get('/tugas/{id}', [TugasController::class, 'index']);
Route::get('/getbahan', [HargabahanController::class, 'getBahan']);
Route::get('/getharga/{id}', [HargabahanController::class, 'getHarga']);
Route::post('/storeharga', [HargabahanController::class, 'store']);