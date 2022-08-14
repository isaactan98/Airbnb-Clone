<?php

use App\Http\Controllers\HostingController;
use App\Http\Controllers\UserController;
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

Route::get('/token/csrf', function () {
    return csrf_token();
});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken('user_token');

    return ['token' => $token->plainTextToken];
});

Route::post('/login', [UserController::class, 'api_login']);
Route::post('/register', [UserController::class, 'api_register']);
Route::post('/user_token', [UserController::class, 'api_get_user']);

Route::get('/hosting/listing', [HostingController::class, 'api_listing']);
