<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return redirect('dashboard');
    });
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/data-dpl', LecturerController::class);
    Route::resource('/data-lokasi', LocationController::class);
    Route::resource('/data-group', GroupController::class);
    Route::resource('/data-profile', ProfileController::class);
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change-password');
    Route::put('/change-password/{id}', [ProfileController::class, 'updatePassword'])->name('change-password.update');
    Route::get('/logoutAction', [AuthController::class, 'logoutAction'])->name('logoutAction');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/loginAction', [AuthController::class, 'loginAction'])->name('loginAction');
});
Route::group(['middleware' => ['role:superadmin']], function () {
    Route::resource('/data-admin', AdminController::class);
});
