<?php

namespace App\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginModel extends Authenticatable
{
    use HasFactory;
    protected $table = "admins";
    protected $fillable = ['username','password'];
}
