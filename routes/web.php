<?php

use App\Http\Middleware\UserAcces;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ComplaintsController;
use App\Http\Controllers\ResponseAdminController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/', [UserController::class, 'index']);

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

Route::resource('/dashboard/user/complaints', ComplaintsController::class)->middleware('auth');

Route::get('/dashboard/admin', [AdminDashboardController::class, 'index'])->middleware(['auth', UserAcces::class . ':admin'])->name('admin.dashboard');

Route::get('/dashboard/user', [UserDashboardController::class, 'index'])->middleware(['auth', UserAcces::class . ':user'])->name('user.dashboard');

Route::get('/dashboard/admin/response', [ResponseAdminController::class, 'index'])->middleware(['auth', UserAcces::class . ':admin']);

Route::get('/dashboard/admin/response/{id}', [ResponseAdminController::class, 'showResponseForm'])->middleware(['auth', UserAcces::class . ':admin']);

Route::post('/dashboard/admin/response/{id}', [ResponseAdminController::class, 'storeResponseForm'])->name('dashboard.admin.store');

Route::get('/dashboard/user/response/{id}', [UserController::class, 'showResponse'])->middleware(['auth', UserAcces::class . ':user'])->name('user.response');

Route::get('/dashboard/user/history', [UserController::class, 'showHistory'])->middleware(['auth', UserAcces::class . ':user'])->name('user.history');

Route::delete('/dashboard/user/history/delete/{id}', [ComplaintsController::class, 'destroy'])->middleware(['auth', UserAcces::class . ':user'])->name('user.history.delete');




require __DIR__.'/auth.php';
