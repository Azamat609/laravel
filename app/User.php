<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps=false;
    public $table= "fio";
    protected $fillable =
    [
        'surname','name', 'dota','telephone','password',
    ];



}
    