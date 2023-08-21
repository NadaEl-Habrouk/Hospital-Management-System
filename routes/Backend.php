<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/Dashboard_Admin',[DashboardController::class,'index']);
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::get('/dashboard/user', function () {
        return view('Dashboard.User.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard.user');

    Route::get('/dashboard/admin', function () {
        return view('Dashboard.Admin.dashboard');
    })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');



    require __DIR__.'/auth.php';

});




