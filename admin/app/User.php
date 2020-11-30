<?php

namespace App;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'cpf', 'rg', 'birth_date',
        'phone', 'gender_id', 'clinic_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth_date' => 'date'
    ];

    public function patients()
    {
        return $this->hasMany('App\Patient');
    }

    public function doctors()
    {
        return $this->hasMany('App\Doctor');
    }

    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    public function clinic()
    {
        return $this->belongsTo('App\Clinic');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'responsible');
    }

    public function laboratory()
    {
        return $this->hasOne('App\Laboratory');
    }

    # Função que retorna o nome do usuario com letras capitalizadas
    public function getNameAttribute($name){
        return ucwords($name);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
