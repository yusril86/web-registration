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

Route::get('registration', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('registration/store', [RegistrationController::class, 'store'])->name('registration.store');

Route::middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('admin')->group(function () {
       /*  Route::get('registration/index', [RegistrationController::class, 'index'])->name('registration.index');
        Route::get('registration/edit/{id}', [RegistrationController::class, 'edit'])->name('registration.edit');
        Route::delete('registration/destroy/{id}', [RegistrationController::class, 'destroy'])->name('registration.destroy'); */

        Route::resource('registration',RegistrationController::class);
    });
});
