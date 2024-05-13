<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


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


Route::get('clients', [MainController::class, 'clients'])->name('clients');
