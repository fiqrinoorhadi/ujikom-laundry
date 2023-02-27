<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiDetailController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login/authenticate',[LoginController::class,'authenticate'])->name('login.authenticate');
Route::get('/login/logout',[LoginController::class,'logout'])->name('login.logout');

Route::get('admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

Route::get('admin/outlet',[OutletController::class, 'index'])->name('admin.outlet');
Route::get('admin/outlet/create',[OutletController::class, 'create'])->name('admin.outlet.create');
Route::post('admin/outlet/store',[OutletController::class, 'store'])->name('admin.outlet.store');
Route::get('admin/outlet/edit/{id}',[OutletController::class, 'edit'])->name('admin.outlet.edit');
Route::post('admin/outlet/update/{id}',[OutletController::class, 'update'])->name('admin.outlet.update');
Route::get('admin/outlet/destroy/{id}',[OutletController::class, 'destroy'])->name('admin.outlet.destroy');

Route::get('admin/user',[UserController::class, 'index'])->name('admin.user');
Route::get('admin/user/create',[UserController::class, 'create'])->name('admin.user.create');
Route::post('admin/user/store',[UserController::class, 'store'])->name('admin.user.store');
Route::get('admin/user/edit/{id}',[UserController::class, 'edit'])->name('admin.user.edit');
Route::post('admin/user/update/{id}',[UserController::class, 'update'])->name('admin.user.update');
Route::get('admin/user/destroy/{id}',[UserController::class, 'destroy'])->name('admin.user.destroy');

Route::get('admin/paket',[PaketController::class, 'index'])->name('admin.paket');
Route::get('admin/paket/create',[PaketController::class, 'create'])->name('admin.paket.create');
Route::post('admin/paket/store',[PaketController::class, 'store'])->name('admin.paket.store');
Route::get('admin/paket/edit/{id}',[PaketController::class, 'edit'])->name('admin.paket.edit');
Route::post('admin/paket/update/{id}',[PaketController::class, 'update'])->name('admin.paket.update');
Route::get('admin/paket/destroy/{id}',[PaketController::class, 'destroy'])->name('admin.paket.destroy');

Route::get('admin/member',[MemberController::class, 'index'])->name('admin.member');
Route::get('admin/member/create',[MemberController::class, 'create'])->name('admin.member.create');
Route::post('admin/member/store',[MemberController::class, 'store'])->name('admin.member.store');
Route::get('admin/member/edit/{id}',[MemberController::class, 'edit'])->name('admin.member.edit');
Route::post('admin/member/update/{id}',[MemberController::class, 'update'])->name('admin.member.update');
Route::get('admin/member/destroy/{id}',[MemberController::class, 'destroy'])->name('admin.member.destroy');

Route::get('admin/transaksi',[TransaksiController::class, 'index'])->name('admin.transaksi');
Route::get('admin/transaksi/create',[TransaksiController::class, 'create'])->name('admin.transaksi.create');
Route::post('admin/transaksi/store',[TransaksiController::class, 'store'])->name('admin.transaksi.store');
Route::get('admin/transaksi/edit/{id}',[TransaksiController::class, 'edit'])->name('admin.transaksi.edit');
Route::post('admin/transaksi/update/{id}',[TransaksiController::class, 'update'])->name('admin.transaksi.update');
Route::get('admin/transaksi/destroy/{id}',[TransaksiController::class, 'destroy'])->name('admin.transaksi.destroy');

Route::get('admin/transaksidetail',[TransaksiDetailController::class, 'index'])->name('admin.transaksidetail');
Route::get('admin/transaksidetail/create/{id}',[TransaksiDetailController::class, 'create'])->name('admin.transaksidetail.create');
Route::post('admin/transaksidetail/store',[TransaksiDetailController::class, 'store'])->name('admin.transaksidetail.store');
Route::get('admin/transaksidetail/edit/{id}',[TransaksiDetailController::class, 'edit'])->name('admin.transaksidetail.edit');
Route::post('admin/transaksidetail/update/{id}',[TransaksiDetailController::class, 'update'])->name('admin.transaksidetail.update');
Route::get('admin/transaksidetail/destroy/{id}',[TransaksiDetailController::class, 'destroy'])->name('admin.transaksidetail.destroy');

Route::get('admin/invoice/{id}',[InvoiceController::class, 'index'])->name('admin.invoice');
