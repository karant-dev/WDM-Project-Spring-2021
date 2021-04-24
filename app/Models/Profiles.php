<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profiles extends Model {
    protected $primaryKey = 'profile_id';
    public $timestamps = false;
    use hasFactory;
}
