<?php

use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\FrontDetailPordukController;
use App\Http\Controllers\frontend\FrontHomeController;
use App\Http\Controllers\frontend\FrontLayananController;
use App\Http\Controllers\frontend\FrontPrivacyPoliceController;
use App\Http\Controllers\frontend\FrontTentangKamiController;
use Illuminate\Support\Facades\Route;



Route::get('/',[FrontHomeController::class,'index'])->name('index');

Route::get('/f/produk/{slug}',[FrontDetailPordukController::class,'detailProduk'])->name('detailProduk');
Route::post('/f/to-checkout',[FrontDetailPordukController::class,'toCheckout'])->name('toCheckout');

Route::post('f/now-checkout',[CheckoutController::class,'checkoutNow'])->name('checkoutNow');
Route::get('f/thanks-checkout',[CheckoutController::class,'checkoutThanks'])->name('checkoutThanks');


Route::get('/layanan',[FrontLayananController::class,'index'])->name('layanan.index');
Route::get('/privacy-policy',[FrontPrivacyPoliceController::class,'index'])->name('privacy.index');
Route::get('/tentang-kami',[FrontTentangKamiController::class,'index'])->name('tentang.index');





