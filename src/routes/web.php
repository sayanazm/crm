<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');


Route::get('main', [MainController::class, 'index'])->name('main');
Route::get('profile', [MainController::class, 'profile'])->name('profile');
Route::get('order', [OrderController::class, 'index'])->name('order');
Route::get('schedule', [MainController::class, 'schedule'])->name('schedule');


Route::controller(ServiceController::class)->group(function () {
    Route::get('services', 'index')->name('services');
    Route::get('services/{id}', 'show')->name('services.show');
    Route::get('services/delete/{id}', 'showDelete')->name('showDeleteService');
    Route::post('services', 'addService')->name('addService');
    Route::post('services/{id}', 'edit')->name('editService');
    Route::post('services/delete/{id}', 'delete')->name('deleteService');

});


Route::controller(ClientController::class)->group(function () {
   Route::get('clients', 'index')->name('clients');
   Route::get('clients/{id}', 'show')->name('clients.show');
   Route::get('clients/delete/{id}', 'showDelete')->name('showDeleteClient');
   Route::post('clients', 'add')->name('addClient');
   Route::post('clients/{id}', 'edit')->name('editClient');
   Route::post('clients/delete/{id}', 'delete')->name('deleteClient');
});
