<?php

use App\Http\Middleware\UserAcces;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ComplaintsController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('Dashboard.admin-role.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->name('admin.')->group(function () {
    Route::get('/', DashboardController::class)->name('index');
});

Route::resource('/dashboard/complaints', ComplaintsController::class)->middleware('auth');

Route::get('/dashboard/admin', [AdminDashboardController::class, 'index'])->middleware(['auth', UserAcces::class . ':admin'])->name('admin.dashboard');

Route::get('/dashboard/user', [UserDashboardController::class, 'index'])->middleware(['auth', UserAcces::class . ':user'])->name('user.dashboard');





require __DIR__.'/auth.php';
