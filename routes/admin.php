<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersAccountsController;
use App\Http\Middleware\Admin;

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

Route::get('/home', function () {
    return view('v_backend.admin.home');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware([Admin::class])->group(function () {
        Route::get('/users_accounts', [UsersAccountsController::class, 'index']);
        Route::post('/users_accounts/store', [UsersAccountsController::class, 'store']);
        Route::get('/users_accounts/edit/{id}', [UsersAccountsController::class, 'edit']);
        Route::put('/users_accounts/update/{id}', [UsersAccountsController::class, 'update']);
        Route::delete('/users_accounts/delete/{id}', [UsersAccountsController::class, 'destroy']);
    });
});
