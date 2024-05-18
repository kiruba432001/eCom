<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Dashboard');
});
Route::any('/admin_login', [AuthController::class, 'login'])->name('login');
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin_dashboard', function () {
        return Inertia::render('AdminDashboard');
    });
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
