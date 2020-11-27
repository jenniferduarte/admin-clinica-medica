<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use App\Role;

use App\Result;
use App\Policies\ResultPolicy;

use App\Doctor;
use App\Laboratory;
use App\Medicament;
use App\Patient;
use App\Policies\DoctorPolicy;
use App\Policies\LaboratoryPolicy;
use App\Policies\MedicamentPolicy;
use App\Policies\PatientPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        #'App\Doctor'        => 'App\Policies\DoctorPolicy',
        #'App\Laboratory'    => 'App\Policies\LaboratoryPolicy',
        #'App\Medicament'    => 'App\Policies\MedicamentPolicy',
        #'App\Patient'       => 'App\Policies\PatientPolicy',
        #'App\Result'       => 'App\Policies\ResultPolicy',
        Result::class => ResultPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        //Gate::define('loremipsum', 'App\Policies\ResultPolicy@viewAny');

        // Se for usuário do tipo Admin, possui controle total da aplicação
        $gate->before(function ($user, $ability) {
            if ($user->role->id == Role::ADMIN) {
                return true;
            }
        });

        /*
        // Doctor
        $gate->define('isDoctor', function ($user) {
            return $user->role->id === Role::DOCTOR;
        });

        // Patient
        $gate->define('isPatient', function ($user) {
            return $user->role->id === Role::PATIENT;
        });

        // Receptionist
        $gate->define('isReceptionist', function ($user) {
            return $user->role->id === Role::RECEPTIONIST;
        });

        $gate->define('isLaboratory', function ($user) {
            return $user->role->id === Role::LABORATORY;
        });
        */


    }
}
