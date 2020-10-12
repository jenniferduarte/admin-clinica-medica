<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use App\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        $gate->before(function ($user, $ability) {
            if ($user->role->id == Role::ADMIN) {
                return true;
            }
        });

        // Doctor
        $gate->define('isDoctor', function($user) {
            return $user->role->id == Role::DOCTOR;
        });

        // Patient
        $gate->define('isPatient', function ($user) { 
            return $user->role->id == Role::PATIENT;
        });

        // Receptionist
        $gate->define('isReceptionist', function ($user) {
            return $user->role->id == Role::RECEPTIONIST    ;
        });
    }
}
