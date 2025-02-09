<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Client extends Model
// {
//     protected $fillable = [
//         'first_name',
//         'middle_name',
//         'last_name',
//         'extension_name',
//         'age',
//         'dob',
//         'contact_number',
//         'address',
//         'emergency_contact',
//         'emergency_contact_relationship',
//         'username',
//         'email',
//         'password',
//     ];
//     // Ensure password is hashed automatically
//     public function setPasswordAttribute($password)
//     {
//         $this->attributes['password'] = bcrypt($password);
//     }
// }
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
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
    ];

    // Ensure password is hashed automatically
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    // Hide sensitive fields from arrays
    protected $hidden = ['password', 'remember_token'];
}
