<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RealisationController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;

// Pages publiques
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/realisations', [RealisationController::class, 'index'])->name('realisations');
Route::get('/commande', [CommandeController::class, 'index'])->name('commande');
Route::post('/commande', [CommandeController::class, 'store'])->name('commande.store');
Route::get('/commande/confirmation/{ref}', [CommandeController::class, 'confirmation'])->name('commande.confirmation');
Route::get('/suivi', [CommandeController::class, 'suivi'])->name('commande.suivi');
Route::post('/suivi', [CommandeController::class, 'rechercher'])->name('commande.rechercher');

// Admin
Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/commandes', [DashboardController::class, 'commandes'])->name('commandes');
    Route::get('/commandes/{id}', [DashboardController::class, 'show'])->name('commandes.show');
    Route::post('/commandes/{id}/statut', [DashboardController::class, 'updateStatut'])->name('commandes.statut');
});