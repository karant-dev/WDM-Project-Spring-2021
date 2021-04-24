<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Continents extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'continent_id';
    use hasFactory;
}
