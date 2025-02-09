<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Client extends Authenticatable implements CanResetPasswordContract
{
    use HasFactory, Notifiable, CanResetPassword; // Add CanResetPassword here

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'extension_name',
        'age',
        'dob',
        'contact_number',
        'address',
        'emergency_contact',
        'emergency_contact_relationship',
        'username',
        'email',
        'password',
        'profile_picture',
    ];

    // Ensure password is hashed automatically
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    // Hide sensitive fields from arrays
    protected $hidden = ['password', 'remember_token'];
}
