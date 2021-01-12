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
        'App\Doctor'        => 'App\Policies\DoctorPolicy',
        'App\Laboratory'    => 'App\Policies\LaboratoryPolicy',
        'App\Medicament'    => 'App\Policies\MedicamentPolicy',
        'App\Patient'       => 'App\Policies\PatientPolicy',
        'App\Result'       => 'App\Policies\ResultPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();


        // Se for usuário do tipo Admin, possui controle total da aplicação
        $gate->before(function ($user, $ability) {
            if ($user->role->id == Role::SUPERADMIN) {
                return true;
            }
        });


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

        // Laboratory
        $gate->define('isLaboratory', function ($user) {
            return $user->role->id === Role::LABORATORY;
        });

        // Cancelar atendimento
        $gate->define('cancelAttendance', function ($user, $attendance) {
            if($user->role->id === Role::RECEPTIONIST || $user->id == $attendance->patient->user->id){
                return true;
            }
        });

        // Agendar atendimento
        // Pode agendar um atendimento se for recepcionista ou paciente
        $gate->define('scheduleAttendance', function ($user) {
            if ($user->role->id === Role::RECEPTIONIST || $user->role->id === Role::PATIENT) {
                return true;
            }
        });

        // Adicionar registro
        $gate->define('addRecord', function ($user, $attendance) {
            if ($user->role->id === Role::DOCTOR && $user->id == $attendance->doctor->user->id) {
                return true;
            }
        });

    }
}
