<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitals extends Model {
    protected $primaryKey = 'hospital_id';
    public $timestamps = false;
    use HasFactory;
}
