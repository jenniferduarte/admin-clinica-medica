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
        'App\Doctor'        => 'App\Policies\DoctorPolicy',
        'App\Laboratory'    => 'App\Policies\LaboratoryPolicy',
        'App\Medicament'    => 'App\Policies\MedicamentPolicy',
        'App\Patient'       => 'App\Policies\PatientPolicy',
        'App\Result'        => 'App\Policies\ResultPolicy',
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


        // Minha Conta
        $gate->define('manageMyAccount', function ($user) {
            return true;
        });


        // Gerenciar Médicos - Admin
        $gate->define('manageDoctors', function ($user) {
            return $user->role->id === Role::ADMIN;
        });

        // Gerenciar Pacientes - Admin ou recepcionista
        $gate->define('managePatients', function ($user) {
            return $user->role->id === Role::ADMIN ||  $user->role->id === Role::RECEPTIONIST;
        });

        // Gerenciar Recepcionistas - Admin
        $gate->define('manageRecepcionist', function ($user) {
            return $user->role->id === Role::ADMIN;
        });

        // Gerenciar Medicamentos - Admin
        $gate->define('manageMedicaments', function ($user) {
            return $user->role->id === Role::ADMIN;
        });

        // Gerenciar Laboratórios - Admin
        $gate->define('manageLabs', function ($user) {
            return $user->role->id === Role::ADMIN;
        });

        // Agendamentos - Admin ou médico ou paciente ou recepcionista
        $gate->define('schedules', function ($user) {
            return $user->role->id === Role::ADMIN ||
            $user->role->id === Role::DOCTOR ||
            $user->role->id === Role::PATIENT ||
            $user->role->id === Role::RECEPTIONIST;
        });


        // Gerenciar responsáveis por laboratório - Admin
        $gate->define('responsibleLabs', function ($user) {
            return $user->role->id === Role::ADMIN;
        });

        // Exames e prescrições  - Médico, paciente ou responsável pelo laboratório
        $gate->define('examsAndPrescriptions', function ($user) {
            return $user->role->id === Role::DOCTOR ||
            $user->role->id === Role::PATIENT ||
            $user->role->id === Role::LABORATORY;
        });

        // Admin
        $gate->define('isAdmin', function ($user) {
            return $user->role->id === Role::ADMIN;
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

        // Adicionar registro médico
        $gate->define('addRecord', function ($user, $attendance) {
            if ($user->role->id === Role::DOCTOR && $user->id == $attendance->doctor->user->id) {
                return true;
            }
        });


        // Adicionar resultado de exame
        $gate->define('addExamResults', function ($user) {
            if ($user->role->id === Role::LABORATORY) {
                return true;
            }
        });

    }
}
