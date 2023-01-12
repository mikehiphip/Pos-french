<?php

namespace App\Models\Backend;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class EmployeeModel extends Authenticatable
{
    use Notifiable;

    protected $table = "tb_info";

    protected $fillable = [
        'username','password','status'
    ];
    protected $hidden = [
        'password','remember_token'
    ];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timestamp = false;

}