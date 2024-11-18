<?php

use App\Http\Controllers\admin\AdminCustomerController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminJabatanController;
use App\Http\Controllers\admin\AdminKaryawanController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminPelangganController;
use App\Http\Controllers\admin\AdminPosisiController;
use App\Http\Controllers\admin\AdminPositionsController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminRoleController;
use Illuminate\Support\Facades\Route;



Route::get('/admin-login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('/admin-login-submit', [AdminLoginController::class, 'login_submit'])->name('admin.login.submit');


    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('admin/customers', [AdminCustomerController::class, 'index'])->name('admin.customers');

    Route::get('admin/products', [AdminProductController::class, 'index'])->name('admin.products');
    
    Route::get('admin/roles', [AdminRoleController::class, 'index'])->name('admin.roles');


    // MENU KARYAWAN
    Route::get('admin/karyawan', [AdminKaryawanController::class, 'index'])->name('admin.karyawan');
    Route::post('admin/karyawan-create', [AdminKaryawanController::class, 'store'])->name('admin.karyawan.create');

    // MENU JABATAN
    Route::get('admin/jabatan', [AdminJabatanController::class, 'index'])->name('admin.jabatan');
    Route::post('admin/jabatan-create', [AdminJabatanController::class, 'store'])->name('admin.jabatan.create');


    // MENU POSISI
    Route::get('admin/posisi', [AdminPosisiController::class, 'index'])->name('admin.posisi');
    Route::post('admin/posisi-create', [AdminPosisiController::class, 'store'])->name('admin.posisi.create');

    // MENU PELANGGAN
    Route::get('admin/pelanggan', [AdminPelangganController::class, 'index'])->name('admin.pelanggan');
    Route::post('admin/pelanggan-create', [AdminPelangganController::class, 'store'])->name('admin.pelanggan.create');