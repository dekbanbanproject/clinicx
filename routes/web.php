<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::match(['get', 'post'], 'account_401_detail/{months}/{year}', [App\Http\Controllers\OnestopController::class, 'account_401_detail'])->name('acc.account_401_detail'); //
Route::match(['get', 'post'], 'account_401_detail_date/{startdate}/{enddate}', [App\Http\Controllers\Account401Controller::class, 'account_401_detail_date'])->name('acc.account_401_detail_date'); //
Route::match(['get', 'post'], 'account_401_stm/{months}/{year}', [App\Http\Controllers\Account401Controller::class, 'account_401_stm'])->name('acc.account_401_stm'); //
Route::match(['get', 'post'], 'account_401_stm_date/{startdate}/{enddate}', [App\Http\Controllers\Account401Controller::class, 'account_401_stm_date'])->name('acc.account_401_stm_date'); //
Route::match(['get', 'post'], 'account_401_stmnull/{months}/{year}', [App\Http\Controllers\Account401Controller::class, 'account_401_stmnull'])->name('acc.account_401_stmnull'); //
Route::match(['get', 'post'], 'account_401_stmnull_date/{startdate}/{enddate}', [App\Http\Controllers\Account401Controller::class, 'account_401_stmnull_date'])->name('acc.account_401_stmnull_date'); //
Route::match(['get', 'post'], 'account_401_stmnull_all/{months}/{year}', [App\Http\Controllers\Account401Controller::class, 'account_401_stmnull_all'])->name('acc.account_401_stmnull_all'); //
Route::match(['get', 'post'], 'account_401_stam', [App\Http\Controllers\Account401Controller::class, 'account_401_stam'])->name('acc.account_401_stam'); //  stamp OPD
Route::match(['get', 'post'], 'account_401_destroy_all', [App\Http\Controllers\Account401Controller::class, 'account_401_destroy_all'])->name('acc.account_401_destroy_all'); //
Route::match(['get', 'post'], 'account_401_yok/{months}/{year}', [App\Http\Controllers\Account401Controller::class, 'account_401_yok'])->name('acc.account_401_yok'); //
Route::match(['get', 'post'], 'account_401_export_api', [App\Http\Controllers\Account401Controller::class, 'account_401_export_api'])->name('acc.account_401_export_api'); //
Route::match(['get', 'post'], 'account_401_send_api', [App\Http\Controllers\Account401Controller::class, 'account_401_send_api'])->name('acc.account_401_send_api'); //
Route::match(['get', 'post'], 'account_401_claimswitch', [App\Http\Controllers\Account401Controller::class, 'account_401_claimswitch'])->name('acc.account_401_claimswitch'); //
Route::match(['get', 'post'], 'account_401_claim_zip', [App\Http\Controllers\Account401Controller::class, 'account_401_claim_zip'])->name('acc.account_401_claim_zip'); //
Route::match(['get', 'post'], 'account_401_rep', [App\Http\Controllers\Account401Controller::class, 'account_401_rep'])->name('acc.account_401_rep'); //
Route::match(['get', 'post'], 'account_401_repsave', [App\Http\Controllers\Account401Controller::class, 'account_401_repsave'])->name('acc.account_401_repsave'); //
Route::match(['get', 'post'], 'account_401_repsend', [App\Http\Controllers\Account401Controller::class, 'account_401_repsend'])->name('acc.account_401_repsend'); //

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
