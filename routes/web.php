<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('layouts.admin.admin-layout');
//});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//require __DIR__ . '/auth.php';



Route::prefix('/admin/')->name('admin.')->group(function () {

    Route::middleware('admin')->group(function () {

        Route::view('main', 'admin.main.index')->name('main');
        Route::view('subscribers', 'admin.subscribers.index')->name('subscribers');
        Route::view('plans', 'admin.plans.index')->name('plans');
        Route::view('settings', 'admin.settings.index')->name('settings');
    });

    Route::view('login', 'admin.auth.login')->middleware('guest:admin')->name('login');
    Route::view('register', 'admin.auth.register')->middleware('guest:admin')->name('register');

});
