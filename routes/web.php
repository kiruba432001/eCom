<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Dashboard');
});

Route::get('/admin_login', function () {
    return Inertia::render('AdminLogin');
});

Route::get('/', [AuthController::class, 'login']); 
Route::post('/loginpost', [AuthController::class, 'loginpost']);

Route::get('/register', [AuthController::class, 'register']); 
Route::post('/registerpost', [AuthController::class, 'registerpost']);


Route::get('/logout', [AuthController::class, 'logout']); 