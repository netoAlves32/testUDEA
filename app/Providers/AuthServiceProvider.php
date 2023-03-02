<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Auth\JwtGuard;
use Illuminate\Support\Facades\Gate;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->role == 'admin';
        });

        Gate::define('employee', function ($user) {
            return $user->role == 'employee';
        });
    }
}
