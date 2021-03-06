<?php

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
    ->post("/letter", [\App\Http\Repositories\LetterRepository::class, "store"]);

Route::middleware([])
    ->get("/letter/{id}", [\App\Http\Repositories\LetterRepository::class, "show"])
    ->where('id','[0-9]+');

Route::middleware([])
    ->get("/letter", [\App\Http\Repositories\LetterRepository::class, "find"]);
