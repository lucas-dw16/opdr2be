<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Livewire Settings
|--------------------------------------------------------------------------
*/
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\AllergeenController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Leveranten;
use App\Http\Controllers\Producten;
use App\Http\Controllers\LeverantController;
use App\Http\Controllers\JaminAllergeenController;

/*
|--------------------------------------------------------------------------
| Root → altijd eerst inloggen
|--------------------------------------------------------------------------
*/
Route::get('/home', fn() => redirect()->route('dashboard'))
    ->middleware('auth')
    ->name('home');

Route::get('/', fn() => redirect()->route('login'));

/*
|--------------------------------------------------------------------------
| Dashboard (na login)
|--------------------------------------------------------------------------
*/
Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Allergenen
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('allergeen')->group(function () {
    Route::get('/', [AllergeenController::class, 'index'])->name('allergeen.index');
    Route::get('/create', [AllergeenController::class, 'create'])->name('allergeen.create');
    Route::post('/', [AllergeenController::class, 'store'])->name('allergeen.store');
    Route::get('/{id}/edit', [AllergeenController::class, 'edit'])->name('allergeen.edit');
    Route::put('/{id}', [AllergeenController::class, 'update'])->name('allergeen.update');
    Route::delete('/{id}', [AllergeenController::class, 'destroy'])->name('allergeen.destroy');
});

/*
|--------------------------------------------------------------------------
| Producten
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/{id}/allergenen', [JaminAllergeenController::class, 'index'])->name('product.allergenenInfo');
    Route::get('/product/{id}/leverantie', [LeverantController::class, 'index'])->name('product.leverantieInfo');
});

/*
|--------------------------------------------------------------------------
| Leveranten (alleen kleine letters!)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('leveranten')->group(function () {

    Route::get('/', [Leveranten::class, 'index'])->name('leveranten.index');

    // Lijst van producten van een leverancier
    Route::get('/{leverancierId}/producten', [Producten::class, 'index'])
        ->name('leveranten.producten');

    // Formulier om levering toe te voegen
    Route::get('/{leverancierId}/producten/{productId}/levering', [Producten::class, 'create'])
        ->name('leveranten.levering.create');

    // Opslaan van levering
    Route::post('/producten/levering', [Producten::class, 'store'])
        ->name('leveranten.levering.store');
});

/*
|--------------------------------------------------------------------------
| Settings (Livewire)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::redirect('/settings', '/settings/profile');
    Route::get('/settings/profile', Profile::class)->name('settings.profile');
    Route::get('/settings/password', Password::class)->name('settings.password');
    Route::get('/settings/appearance', Appearance::class)->name('settings.appearance');
});

/*
|--------------------------------------------------------------------------
| Auth routes (login / register / logout)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
