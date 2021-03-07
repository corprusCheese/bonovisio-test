<?php

use App\Http\Controllers\LetterController;
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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware([])
    ->any("/letter", [LetterController::class, "store"]);

Route::middleware([])
    ->get("/letter/{id}", [LetterController::class, "show"])
    ->where('id','[0-9]+');

Route::middleware([])
    ->get("/letter", [LetterController::class, "find"]);
