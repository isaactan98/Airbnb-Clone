<?php

use App\Http\Controllers\HostingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Request;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::match(['get', 'post'], '/dashboard/hosting', [HostingController::class, 'listing'])->name('hosting.listing');
    Route::match(['get', 'post'], '/dashboard/hosting/create', [HostingController::class, 'create'])->name('hosting.create');
    Route::match(['get', 'post'], '/dashboard/hosting/{id}/edit', [HostingController::class, 'update'])->name('hosting.update');
});
