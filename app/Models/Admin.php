<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = ['email', 'password', 'firstname', 'lastname', 'role', 'date_created', 'status'];
}
