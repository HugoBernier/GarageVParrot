<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AvisClientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FormulaireContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehiculeController;
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

// Route::get('/', function () {
//     return view('index');
// })->name('index');

Route::get('/', [Controller::class, 'index'])->name('index');

Route::get('/vehicule/{vehicule}', [VehiculeController::class, 'show'])->name('vehicule.show');
Route::get('/vehicules', [VehiculeController::class, 'list'])->name('vehicules.list');

Route::get('/avis', [AvisClientController::class, 'index'])->name('avis.index');
Route::get('/avis/create', [AvisClientController::class, 'create'])->name('create.avis');
Route::post('/avis', [AvisClientController::class, 'store'])->name('store.avis');

Route::get('/prendre-rendez-vous', [FormulaireContactController::class, 'index'])->name('contact.index');
Route::post('/contact/store', [FormulaireContactController::class, 'store'])->name('contact.store');

Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login/login', [AdminController::class, 'login'])->name('login.login');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/voitures/create', [VehiculeController::class, 'create'])->name('voiture.create');
    Route::post('/voitures/store', [VehiculeController::class, 'store'])->name('voiture.store');

    Route::middleware(['admin'])->group(function () {
        Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('user.store');

        Route::post('/jour/update', [AdminController::class, 'updateJourOuverture'])->name('jours.update');
    });
});
