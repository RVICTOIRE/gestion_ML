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
    Route::get('/affichageConcess', 'showConcess')->name('affichageConcess');
    // Routes avec model binding pour les actions d'édition et de suppression (concessionaire)
    Route::delete('/affichageConcess/{concessionnaire}', 'destroyconcess')->name('affichageConcess.destroy');
    Route::put('/affichageConcess/{concessionaire}', 'updateConcess')->name('affichageConcess.update');
    Route::get('/affichageConcess/{concessionaire}/edit', 'editConcess')->name('affichageConcess.edit');
    // Routes avec model binding pour les actions d'édition et de suppression(commune)
    Route::get('/affichagecommune', 'showcommune')->name('affichagecommune');
    Route::delete('/affichagecommune/{communeouaxe}', 'destroycommune')->name('affichagecommune.destroy');
    Route::put('/affichagecommune/{communeouaxe}', 'updatecommune')->name('affichagecommune.update');
    Route::get('/affichagecommune/{communeouaxe}/edit', 'editcommune')->name('affichagecommune.edit');
    // Routes avec model binding pour les actions d'édition et de suppression(materiel_lourd)
    Route::get('/affichageML', 'showML')->name('affichageML');
    Route::delete('/affichageML/{materiel_lourd}', 'destroyML')->name('affichageML.destroy');
    Route::put('/affichageML/{materiel_lourd}', 'updateML')->name('affichageML.update');
    Route::get('/affichageML/{materiel_lourd}/edit', 'editML')->name('affichageML.edit');  
});

// MENU REPORTING
Route::prefix('/Reporting')->name('Reporting.')->controller(ReportController::class)->group(function () {
    Route::get('/', 'index')->name('index'); //
    Route::get('/enregPointage', 'showPointageForm')->name('showPointageForm');
    Route::post('/enregPointage', 'storePointageForm')->name('storePointageForm');
    Route::get('/affichagePointage', 'showPointage')->name('affichagePointage');
    // Routes avec model binding pour les actions d'édition et de suppression
    Route::get('/affichagePointage/{pointage}/edit', 'editPointage')->name('affichagePointage.edit');
    Route::delete('/affichagePointage/{pointage}', 'destroyPointage')->name('affichagePointage.destroy');
    Route::put('/affichagePointage/{pointage}', 'updatePointage')->name('affichagePointage.update');

});