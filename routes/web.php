<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {

        Route::get('/', function () {
            return view('welcome');
        })->name('home');

        Route::view('dashboard', 'dashboard')
            ->middleware(['auth', 'verified'])
            ->name('dashboard');

        Route::middleware(['auth'])->group(function () {
            Route::redirect('settings', 'settings/profile');

            Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
            Volt::route('settings/password', 'settings.password')->name('settings.password');
            Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
        });

        Route::middleware(['auth', 'module.access:dashboard'])->group(function () {
            Route::prefix('admin')->group(function () {
                Route::view('modules', 'pages.admins.modules.index')->name('admin.modules');
                Route::view('plans', 'pages.admins.plans.index')->name('admin.plans');
            });
        });

        // Route::get('hello', function () {
        //     $user = Auth::user();

        //     dd($user->accessibleModules());
        //     //dd($user->hasModuleAccess('gestion-stock'));
        //     return "Hello";
        // });
        require __DIR__ . '/auth.php';

    });
}