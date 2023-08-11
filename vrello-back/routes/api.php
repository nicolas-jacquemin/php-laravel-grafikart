<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/tasks')
    ->middleware('auth:sanctum')
    ->controller(TaskController::class)->group(function () {
   Route::get('/', 'index')->name('index');
   Route::get('/{task}', 'show')->name('show');
   Route::post('/', 'store')->name('store');
   Route::put('/{task}', 'update')->name('update');
   Route::delete('/{task}', 'destroy')->name('destroy');
})->name('tasks');

Route::prefix('/auth')->controller(LoginController::class)->group(function () {
    Route::post('/login', 'attemptLogin')->name('login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum')->name('logout');
    Route::get('/me', [\App\Http\Controllers\MeController::class, 'me'])
        ->middleware('auth:sanctum')->name('me');
})->name('auth');
