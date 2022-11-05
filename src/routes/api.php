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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::match(
    ['post', "put", "delete"],
    'v1/user',
    [\App\Http\Controllers\UserController::class, 'switchHttpRequest']
);

Route::match(
    ['post', "put", "delete"],
    'api/v1/post',
    [\App\Http\Controllers\PostController::class, 'switchHttpRequest']
);

Route::match(
    ['post', "put", "delete"],
    'api/v1/group',
    [\App\Http\Controllers\GroupController::class, 'switchHttpRequest']
);

