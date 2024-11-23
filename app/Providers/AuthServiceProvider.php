<?php

namespace App\Providers;

use App\Models\Comments;
use App\Models\User;
use App\Policies\CommentsPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    protected $policies = [
        Comments::class => CommentsPolicy::class
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin-settings', function (User $user) {
            return $user->isAdmin
                ? Response::allow()
                : Response::deny('Siz administrator emassiz.');
        });
    }
}
