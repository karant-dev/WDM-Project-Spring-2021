<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Countries extends Model {
    public $timestamps = false;
    protected $primaryKey = 'country_id';
    use HasFactory;
}
