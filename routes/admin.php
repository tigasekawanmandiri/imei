<?php

use App\Http\Controllers\admin\AdminAkunPenjualanController;
use App\Http\Controllers\admin\AdminBankController;
use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminCustomerController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminDurationController;
use App\Http\Controllers\admin\AdminJabatanController;
use App\Http\Controllers\admin\AdminKanalPenjualanController;
use App\Http\Controllers\admin\AdminKaryawanController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminPelangganController;
use App\Http\Controllers\admin\AdminPosisiController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminRoleController;
use App\Http\Controllers\admin\AdminSalesController;
use App\Http\Controllers\admin\AdminSettingsController;
use App\Http\Controllers\admin\AdminStrategiSellingController;
use App\Http\Controllers\admin\AdminSumberInteraksiController;
use App\Http\Controllers\admin\AdminVarianController;
use Illuminate\Support\Facades\Route;




Route::get('/admin-login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('/admin-login-submit', [AdminLoginController::class, 'login_submit'])->name('admin.login.submit');

Route::middleware(['admin'])->group(function() {

    Route::get('/admin-logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    // MENU DASHBOARD
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');


    // MENU CUSTOMER
    Route::get('/admin/customers', [AdminCustomerController::class, 'index'])->name('admin.customers');


    // MENU PRODUCT
    Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products');
    Route::get('/admin/products-create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products-store', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products-edit/{id}', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/admin/products-update/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::post('/admin/products-destroy/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');


    // MENU ROLE
    Route::get('/admin/roles', [AdminRoleController::class, 'index'])->name('admin.roles');


    // MENU KARYAWAN
    Route::get('/admin/karyawan', [AdminKaryawanController::class, 'index'])->name('admin.karyawan');
    Route::post('/admin/karyawan-create', [AdminKaryawanController::class, 'store'])->name('admin.karyawan.create');


    // MENU JABATAN
    Route::get('/admin/jabatan', [AdminJabatanController::class, 'index'])->name('admin.jabatan');
    Route::post('/admin/jabatan-create', [AdminJabatanController::class, 'store'])->name('admin.jabatan.create');


    // MENU POSISI
    Route::get('/admin/posisi', [AdminPosisiController::class, 'index'])->name('admin.posisi');
    Route::post('/admin/posisi-create', [AdminPosisiController::class, 'store'])->name('admin.posisi.create');

    // MENU PELANGGAN
    Route::get('/admin/pelanggan', [AdminPelangganController::class, 'index'])->name('admin.pelanggan');
    Route::post('/admin/pelanggan-create', [AdminPelangganController::class, 'store'])->name('admin.pelanggan.create');


    // MENU KANAL PENJUALAN
    Route::get('/admin/kanal-penjualan', [AdminKanalPenjualanController::class, 'index'])->name('admin.kanal.penjualan');
    Route::post('/admin/kanal-penjualan-create', [AdminKanalPenjualanController::class, 'store'])->name('admin.kanal.penjualan.create');


    // MENU AKUN PENJUALAN
    Route::get('/admin/akun-penjualan', [AdminAkunPenjualanController::class, 'index'])->name('admin.akun.penjualan');
    Route::post('/admin/akun-penjualan-create', [AdminAkunPenjualanController::class, 'store'])->name('admin.akun.penjualan.create');


    // MENU SUMBER INTERAKSI
    Route::get('/admin/sumber-interaksi', [AdminSumberInteraksiController::class, 'index'])->name('admin.sumber.interaksi');
    Route::post('/admin/sumber-interaksi-create', [AdminSumberInteraksiController::class, 'store'])->name('admin.sumber.interaksi.create');


    // MENU STRATEGI SELLINGS
    Route::get('/admin/strategi-sellings', [AdminStrategiSellingController::class, 'index'])->name('admin.strategi.sellings');
    Route::post('/admin/strategi-sellings-create', [AdminStrategiSellingController::class, 'store'])->name('admin.strategi.sellings.create');


    // MENU PRODUCT
    Route::get('/admin/product', [AdminProductController::class, 'index'])->name('admin.product');
    Route::post('/admin/product-create', [AdminProductController::class, 'store'])->name('admin.product.create');


    // MENU VARIAN
    Route::get('/admin/varian', [AdminVarianController::class, 'index'])->name('admin.varian');


    Route::post('/admin/varian-create', [AdminVarianController::class, 'store'])->name('admin.varian.create');


    // MENU DURATION
    Route::get('/admin/duration', [AdminDurationController::class, 'index'])->name('admin.duration');
    Route::post('/admin/duration-create', [AdminDurationController::class, 'store'])->name('admin.duration.create');
    Route::get('/admin/duration-edit/edit/{id}', [AdminDurationController::class, 'edit'])->name('admin.duration.edit');
    Route::post('/admin/duration/update/{id}', [AdminDurationController::class, 'update'])->name('admin.duration.update');
    Route::get('/admin/duration/destroy/{id}', [AdminDurationController::class, 'destroy'])->name('admin.duration.destroy');
    Route::get('/admin/select-duration', [AdminDurationController::class, 'selectDuration'])->name('admin.duration.select');


    // MENU CATEGORY
    Route::get('/admin/category', [AdminCategoryController::class, 'index'])->name('admin.category');
    Route::post('/admin/category-create', [AdminCategoryController::class, 'store'])->name('admin.category.create');
    Route::get('/admin/category-edit/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/category/update/{id}', [AdminCategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/category/destroy/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.category.destroy');


    // MENU SALES
    Route::get('/admin/sales', [AdminSalesController::class, 'index'])->name('admin.sales');
    Route::get('/admin/select-produk', [AdminSalesController::class, 'selectProduk'])->name('admin.select.create');
    Route::post('/admin/sales-create', [AdminSalesController::class, 'store'])->name('admin.sales.create');
    
    
    // MENU BANK
    Route::get('/admin/bank', [AdminBankController::class, 'index'])->name('admin.bank');
    Route::post('/admin/bank-create', [AdminBankController::class, 'store'])->name('admin.bank.create');
    Route::get('/admin/bank-edit/edit/{id}', [AdminBankController::class, 'edit'])->name('admin.bank.edit');
    Route::post('/admin/bank/update/{id}', [AdminBankController::class, 'update'])->name('admin.bank.update');
    Route::get('/admin/bank/destroy/{id}', [AdminBankController::class, 'destroy'])->name('admin.bank.destroy');


    // MAIN CONFIG
    Route::get('/admin/main-config', [AdminSettingsController::class, 'index'])->name('admin.main-config');
    Route::put('/admin/update-main-config/{id}', [AdminSettingsController::class, 'mainConfigPost'])->name('admin.main-config-update');


});