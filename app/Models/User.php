<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    protected $fillable = ['name','email','password','company_id'];
    protected $hidden = ['password','remember_token','two_factor_recovery_codes','two_factor_secret'];
    protected $casts = ['email_verified_at'=>'datetime'];

    public function company() { return $this->belongsTo(Company::class); }
}