<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ColorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewControllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\JobSheetController;
use App\Http\Controllers\VehicleBrandController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\WdController;
use App\Http\Controllers\SpvController;
use App\Http\Controllers\AdpController;
use App\Http\Controllers\TpController;
use App\Http\Controllers\TwbController;
use App\Http\Controllers\EngineController;
use App\Http\Controllers\DentingController;
use App\Http\Controllers\PaintingController;
use App\Http\Controllers\WarringController;
use App\Http\Controllers\PaperHistoryController;
use App\Http\Controllers\SearchController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('customers', CustomerController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('vehicle-types', VehicleTypeController::class);
    Route::resource('vehicle-brands', VehicleBrandController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::resource('job-sheets', JobSheetController::class);
    Route::resource('wds', WdController::class);
    Route::resource('spvs', SpvController::class);
    Route::resource('adps', AdpController::class);
    Route::resource('tps', TpController::class);
    Route::resource('twbs', TwbController::class);
    Route::resource('engines', EngineController::class);
    Route::resource('dentings', DentingController::class);
    Route::resource('paintings', PaintingController::class);
    Route::resource('warrings', WarringController::class);
    Route::resource('paperhistories', PaperHistoryController::class);
    Route::get('/job-sheets/today/job-sheets', [JobSheetController::class, 'tjs'])->name('tjs');
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/job-sheets/spv/{id}', [JobSheetController::class, 'spv'])->name('spv');

    //woner Select
    Route::get('/job-sheets/ownerSelect/{id}', [JobSheetController::class, 'wonerNameSelect'])->name('wonerNameSelect');
    //Vehicle Select
    Route::get('/job-sheets/vehicleSelect/{id}', [JobSheetController::class, 'vehicleNoSelect'])->name('vehicleNoSelect');

    Route::get('/job-sheets/wd/{id}', [JobSheetController::class, 'wd'])->name('wd');
    Route::get('/job-sheets/send-sms', [JobSheetController::class, 'sendSms'])->name('send-sms');

    Route::get('/job-sheets/tp/{id}', [JobSheetController::class, 'tp'])->name('tp');

    Route::get('/job-sheets/ph/{id}', [JobSheetController::class, 'ph'])->name('ph');

    Route::get('/job-sheets/adp/{id}', [JobSheetController::class, 'adp'])->name('adp');

    Route::get('/job-sheets/twb/{id}', [JobSheetController::class, 'twb'])->name('twb');
    Route::get('/job-sheets/engine/{id}', [JobSheetController::class, 'engine'])->name('engine');

    Route::get('/job-sheets/denting/{id}', [JobSheetController::class, 'denting'])->name('denting');

    Route::get('/job-sheets/painting/{id}', [JobSheetController::class, 'painting'])->name('painting');

    Route::get('/job-sheets/warring/{id}', [JobSheetController::class, 'warring'])->name('warring');


});
