<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RegisterAdmin extends Authenticatable
{
    //
    protected $fillable=
    ['nome','email','phone','password','confime_password','created_at','updated_at'];
    protected $table='register_admins';
}
