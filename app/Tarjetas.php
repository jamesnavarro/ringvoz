<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjetas extends Model
{
    protected $table = 'tarjetas';
    protected $primaryKey = 'tarjeta_id';
    public $timestamps = false;
}