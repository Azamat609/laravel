<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Ovo extends Model
{
    public $timestamps=false;
    public $table= "tickets";
    protected $fillable =
    [
        'from','back','coins',
    ];
}