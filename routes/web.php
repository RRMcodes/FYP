<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','verified'])->controller(PatientController::class)->group(function (){
    Route::get('/patient/create','create')->name('patient.create');
    Route::post('/patient/store','store')->name('patient.store');
    Route::get('/patient/index','index')->name('patient.index');
    Route::get('/patient/edit/{id}','edit')->name('patient.edit');
    Route::get('/patient/show/{id}','show')->name('patient.show');
    Route::post('/patient/update','update')->name('patient.update');
    Route::any('/patient/delete/{id}','destroy')->name('patient.delete');
    Route::post('/patient/getPatientsJson','getPatientsJson')->name('patient.getPatientsJson');

});

Route::middleware(['auth','verified'])->controller(StaffController::class)->group(function (){
    Route::get('/staff/create','create')->name('staff.create');
    Route::post('/staff/store','store')->name('staff.store');
    Route::get('/staff/index','index')->name('staff.index');
    Route::get('/staff/edit/{id}','edit')->name('staff.edit');
    Route::get('/staff/show/{id}','show')->name('staff.show');
    Route::post('/staff/update','update')->name('staff.update');
    Route::any('/staff/delete/{id}','destroy')->name('staff.delete');
    Route::post('/staff/getStaffsJson','getStaffsJson')->name('staff.getStaffsJson');

});

Route::middleware(['auth','verified'])->controller(DoctorController::class)->group(function (){
    Route::get('/doctor/create','create')->name('doctor.create');
    Route::post('/doctor/store','store')->name('doctor.store');
    Route::get('/doctor/index','index')->name('doctor.index');
    Route::get('/doctor/edit/{id}','edit')->name('doctor.edit');
    Route::get('/doctor/show/{id}','show')->name('doctor.show');
    Route::post('/doctor/update','update')->name('doctor.update');
    Route::any('/doctor/delete/{id}','destroy')->name('doctor.delete');
    Route::post('/doctor/getDoctorsJson','getDoctorsJson')->name('doctor.getDoctorsJson');

});

Route::middleware(['auth','verified'])->controller(ServiceController::class)->group(function (){
    Route::get('/service/create','create')->name('service.create');
    Route::post('/service/store','store')->name('service.store');
    Route::get('/service/index','index')->name('service.index');
    Route::get('/service/edit/{id}','edit')->name('service.edit');
    Route::get('/service/show/{id}','show')->name('service.show');
    Route::post('/service/update','update')->name('service.update');
    Route::any('/service/delete/{id}','destroy')->name('service.delete');
    Route::get('/service/serviceLog','serviceLog')->name('service.serviceLog');
    Route::post('/service/getServicesJson','getServicesJson')->name('service.getServicesJson');

});

Route::middleware(['auth','verified'])->controller(ItemController::class)->group(function (){
    Route::get('/item/create','create')->name('item.create');
    Route::post('/item/store','store')->name('item.store');
    Route::get('/item/index','index')->name('item.index');
    Route::get('/item/edit/{id}','edit')->name('item.edit');
    Route::get('/item/show/{id}','show')->name('item.show');
    Route::post('/item/update','update')->name('item.update');
    Route::any('/item/delete/{id}','destroy')->name('item.delete');
    Route::post('/item/getItemsJson','getItemsJson')->name('item.getItemsJson');
    Route::get('/item/itemLog','itemLog')->name('item.itemLog');

});

Route::middleware(['auth','verified'])->controller(BillingController::class)->group(function (){
    Route::get('/billing/itemCreate','itemCreate')->name('billing.itemCreate');
    Route::get('/billing/index','index')->name('billing.index');
    Route::post('/billing/itemStore','itemStore')->name('billing.itemStore');
    Route::get('/billing/itemShow/{id}','itemShow')->name('billing.itemShow');
    Route::get('/billing/getItem/{id}','getItem')->name('getItem');
    Route::get('/billing/testCreate','testCreate')->name('billing.testCreate');
    Route::post('/billing/testStore','testStore')->name('billing.testStore');

});





require __DIR__.'/auth.php';
