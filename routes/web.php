<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RabbitController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom')->middleware('guest');
Route::get('register', [AuthController::class, 'registration'])->name('register')->middleware('guest');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom')->middleware('guest');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout')->middleware('auth');


Route::get('main', [MainController::class, 'index'])->name('main')->middleware('auth');

Route::controller(ServiceController::class)->group(function () {
    Route::get('services', 'index')->name('services')->middleware('auth');
    Route::get('services/{id}', 'show')->name('services.show')->middleware('auth');
    Route::get('services/delete/{id}', 'showDelete')->name('showDeleteService')->middleware('auth');
    Route::post('services', 'addService')->name('addService')->middleware('auth');
    Route::post('services/{id}', 'edit')->name('editService')->middleware('auth');
    Route::post('services/delete/{id}', 'delete')->name('deleteService')->middleware('auth');

});


Route::controller(ClientController::class)->group(function () {
   Route::get('clients', 'index')->name('clients')->middleware('auth');
   Route::get('clients/{id}', 'show')->name('clients.show')->middleware('auth');
   Route::get('clients/delete/{id}', 'showDelete')->name('showDeleteClient')->middleware('auth');
   Route::post('clients', 'add')->name('addClient')->middleware('auth');
   Route::post('clients/{id}', 'edit')->name('editClient')->middleware('auth');
   Route::post('clients/delete/{id}', 'delete')->name('deleteClient')->middleware('auth');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('profile', 'index')->name('profile')->middleware('auth');
    Route::post('profile', 'edit')->name('editProfile')->middleware('auth');
    Route::get('profile/delete', 'showDelete')->name('showDeleteProfile')->middleware('auth');
    Route::post('profile/delete', 'delete')->name('deleteProfile')->middleware('auth');
});

Route::controller(WorkerController::class)->group(function () {
    Route::get('workers', 'index')->name('workers')->middleware('auth');
    Route::get('workers/{id}', 'show')->name('workers.show')->middleware('auth');
    Route::get('workers/delete/{id}', 'showDelete')->name('showDeleteWorker')->middleware('auth');
    Route::post('workers', 'add')->name('addWorker')->middleware('auth');
    Route::post('workers/{id}', 'edit')->name('editWorker')->middleware('auth');
    Route::post('workers/delete/{id}', 'delete')->name('deleteWorker')->middleware('auth');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('order', 'index')->name('order')->middleware('auth');
    Route::get('order/{id}', 'show')->name('order.show')->middleware('auth');
    Route::get('order/delete/{id}', 'showDelete')->name('showDeleteOrder')->middleware('auth');
    Route::post('order', 'create')->name('createOrder')->middleware('auth');
    Route::post('order/{id}', 'edit')->name('editOrder')->middleware('auth');
    Route::post('order/delete/{id}', 'delete')->name('deleteOrder')->middleware('auth');
});

Route::controller(ScheduleController::class)->group(function () {
    Route::get('schedule', 'index')->name('index')->middleware('auth');
    Route::post('schedule', 'show')->name('schedule')->middleware('auth');

});

Route::controller(MailController::class)->group(function () {
    Route::get('sendbasicemail', 'basic_email')->name('basic_email')->middleware('auth');
    Route::get('sendhtmlemail', 'html_email')->name('html_email')->middleware('auth');
    Route::get('sendattachmentemail', 'attachment_email')->name('attachment_email')->middleware('auth');
});

Route::controller(RabbitController::class)->group(function () {
    Route::get('send', 'send')->name('send')->middleware('auth');
    Route::get('receive', 'receive')->name('receive')->middleware('auth');
});
