<?php

use App\Http\Controllers\appointemtsController;
use App\Http\Controllers\catalogoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\sheetController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Admin
Route::middleware(['auth', 'role:admin', 'nocache'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // usuarios


});
 Route::get('/users', [userController::class, 'index'])->name('users.index');
    Route::post('/users/store', [userController::class, 'store'])->name('users.store');
    Route::delete('/users/destroy/{id}', [userController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/update/{id}', [userController::class, 'update'])->name('users.update');

//Barber
Route::middleware(['auth', 'role:admin,barber','nocache'])->group(function () {
    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //services
    Route::get('/services', [serviceController::class, 'index'])->name('services.index');
    Route::post('/services/store', [serviceController::class, 'store'])->name('services.store');
    Route::delete('/services/destroy/{id}', [serviceController::class, 'destroy'])->name('services.destroy');
    Route::put('/services/update/{id}', [serviceController::class, 'update'])->name('services.update');
    //appointments
    Route::get('/appointments', [appointemtsController::class, 'index'])->name('appointments.index');
    Route::put('/appointments/update/{id}', [appointemtsController::class, 'update'])->name('appointments.update');
    Route::delete('/appointments/destroy/{id}', [appointemtsController::class, 'destroy'])->name('appointments.destroy');

});

//Cliente
Route::middleware(['auth', 'role:cliente','nocache'])->group(function () {
    Route::post('/appointments/store', [appointemtsController::class, 'store'])->name('appointments.store');
});


//catalogo
Route::get('/servicios', [sheetController::class, 'index'])->name('sheet.index');
Route::get('/catalogo', [catalogoController::class, 'index'])->name('catalogo.index');



require __DIR__ . '/auth.php';
