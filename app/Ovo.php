<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ovo extends Model
{
    public $timestamps=false;
    protected $table=
    [
    	'name','quantity', 'price'
    ];
}