<?php

use Illuminate\Support\Facades\Route;

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

Route::match(
    ['get'],
    'api/v1/user',
    [\App\Http\Controllers\UserController::class, 'switchHttpRequest']
);

Route::match(
    ['get'],
    'api/v1/post',
    [\App\Http\Controllers\PostController::class, 'switchHttpRequest']
);

Route::match(
    ['get'],
    'api/v1/group',
    [\App\Http\Controllers\GroupController::class, 'switchHttpRequest']
);
