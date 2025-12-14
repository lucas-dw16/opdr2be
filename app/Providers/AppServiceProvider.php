<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Used by Laravel authentication to redirect after login.
     */
    public const HOME = '/dashboard';

    public function boot(): void
    {
        parent::boot();
    }
}
