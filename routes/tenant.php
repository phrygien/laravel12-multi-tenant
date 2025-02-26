<?php

declare(strict_types=1);

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    

    Route::view('dashboard', 'pages.tenants.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::middleware(['auth'])->group(function () {
        Route::redirect('settings', 'settings/profile');

        Volt::route('settings/profile', 'settings_tenant.profile')->name('settings.profile');
        Volt::route('settings/password', 'settings_tenant.password')->name('settings.password');
        Volt::route('settings/appearance', 'settings_tenant.appearance')->name('settings.appearance');
    });

    require __DIR__.'/auth_tenant.php';
});