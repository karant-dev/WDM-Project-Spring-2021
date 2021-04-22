<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospitals extends Model
{
     protected $table = 'Hospitals';
    public $timestamps = false;
    protected $primaryKey = 'hospital_id';

    public function country()
    {
        return $this->hasOne(Counties::class, 'country_id');
    }
}
