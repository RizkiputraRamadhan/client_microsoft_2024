<?php

use App\Http\Middleware\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AccountsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::middleware([User::class])->group(function () {
        Route::get('/accounts', [AccountsController::class, 'index']);
        Route::put('/accounts/update/{id}', [AccountsController::class, 'update']);
    });
});
