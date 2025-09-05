<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    // Constant HOME, pakai redirect-role
    public const HOME = '/redirect-role';

    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')->group(function () {

                // Redirect role setelah login
                Route::get('/redirect-role', function () {
                    $user = Auth::user();
                    switch ($user->role) {
                        case 'admin':
                            return redirect()->route('admin.dashboard');
                        case 'drafter':
                            return redirect()->route('drafter.dashboard');
                        case 'checker':
                            return redirect()->route('checker.dashboard');
                        default:
                            return redirect()->route('login');
                    }
                })->middleware('auth');

                // Load web.php
                require base_path('routes/web.php');
            });
        });
    }
}
