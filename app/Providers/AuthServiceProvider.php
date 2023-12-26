<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

//use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('student-post', function(User $user) {
            if ($user->role_id == 1) {
                return true;
            } elseif ($user->role_id == 2) {
                return false;
            }
            else return true;
        });

        Gate::define('teacher-post', function(User $user) {
            if ($user->role_id == 2) {
                return true;
            } elseif ($user->role_id == 1) {
                return false;
            }
            else return true;
        });

        Gate::define('admin-post', function(User $user) {
            if ($user->role_id == 3) {
                return true;
            } else return false;
        });
    }
}
