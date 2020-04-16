<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = "cars";
    protected $primaryKey = 'number_plate';
    public $incrementing = false;
    protected $keyType = 'string';
}
