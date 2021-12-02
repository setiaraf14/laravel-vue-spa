<?php

use App\Http\Controllers\BukuController;
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


Route::get('/store-buku/json', [BukuController::class, 'storeBuku']);
Route::get('/get-buku/json', [BukuController::class, 'getBuku']);
Route::get('/delete-buku/json', [BukuController::class, 'deleteBuku']);
Route::get('/edit-buku/json/{id}', [BukuController::class, 'editBuku']);
Route::get('/update-buku/json',  [BukuController::class, 'update']);