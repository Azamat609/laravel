<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Model extends Model
{
    public $timestamps=false;
    public $table= "order";
    protected $fillable =
    [
        'from_date','back_fio','code',
    ];
}
