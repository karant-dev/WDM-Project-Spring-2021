<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Continents extends Model
{
    protected $table = 'Continents';
    public $timestamps = false;
    protected $primaryKey = 'continent_id';
}
