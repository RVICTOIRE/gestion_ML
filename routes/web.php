<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use Facade\Ignition\Middleware\AddGitInformation;
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

// BREEZE
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/menu', function () {
    return view('menu');
});


// Authentification Laravel
//Route::get('/Login', [AuthController::class, 'Login']) ->name('auth.Login');
//Route::delete('/Logout', [AuthController::class, 'Logout'])->name('auth.Logout');
//Route::post('/Login', [AuthController::class, 'doLogin']) ;


// MENU ADMIN
Route::prefix('/Admin')->name('Admin.')->controller(AdminController::class)->group(function () {
    Route::get('/', 'index')->name('index'); //
    Route::get('/enregML', 'showMLForm')->name('showMLForm');
    Route::post('/enregML', 'storeMLForm')->name('storeMLForm');
    Route::get('/enregConcess', 'showConcessForm')->name('showConcessForm');
    Route::post('/enregConcess', 'storeConcessForm')->name('storeConcessForm');  
    Route::get('/enregCommune', 'showCommuneForm')->name('showCommuneForm');
    Route::post('/enregCommune', 'storeCommuneForm')->name('storeCommuneForm');    


});

// MENU REPORTING
Route::prefix('/Reporting')->name('Reporting.')->controller(ReportController::class)->group(function () {
    Route::get('/', 'index')->name('index'); //
    Route::get('/enregPointage', 'showPointageForm')->name('showPointageForm');
    Route::post('/enregPointage', 'storePointageForm')->name('storePointageForm');
    Route::get('/affichagePointage', 'showPointage')->name('affichagePointage');
    // Routes avec model binding pour les actions d'édition et de suppression
    Route::get('/affichagePointage/{pointage}/edit', 'editPointage')->name('affichagePointage.edit');
    Route::post('/affichagePointage/{pointage}', 'destroyPointage')->name('affichagePointage.destroy');
    Route::put('/affichagePointage/{pointage}', 'updatePointage')->name('affichagePointage.update');

});