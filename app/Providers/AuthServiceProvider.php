<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Policies\ExceptionPolicy;
use BezhanSalleh\FilamentExceptions\Models\Exception;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Exception::class => ExceptionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            if (auth()->check() && !auth()->user()->isActive()) {
                auth()->logout();
                session()->flash('error', 'Akses ditolak! Akun Anda tidak aktif. Silakan hubungi administrator.');
                redirect('/admin/login')->send();
            }
        });
    }
}
