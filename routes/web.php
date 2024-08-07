<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
})->name('home');
// ->name('home')
// Route::post('/user', UsersController::class);
Route::post('/create/dummy', [UsersController::class, 'create_dummy_data'])->name('users.create.dummy');
Route::delete('/create/dummy', [UsersController::class, 'delete_dummy_data'])->name('delete.dummy.data');
Route::resource('/users', UsersController::class);

