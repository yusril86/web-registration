<?php

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\RegistrationController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::get('registration', [RegistrationController::class,'create'])->name('registration.create');
Route::post('registration/store', [RegistrationController::class,'store'])->name('registration.store');

Route::middleware(['auth','admin'])->group(function(){    
    Route::get('/admin', [DashboardController::class,'index'])->name('admin.dashboard');   
    Route::get('registration/index', [RegistrationController::class,'index'])->name('registration.index');   
    Route::delete('registration/destroy', [RegistrationController::class,'destroy'])->name('registration.destroy');   
});
