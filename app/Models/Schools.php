<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schools extends Model {
    protected $primaryKey = 'school_id';
    public $timestamps = false;
    use hasFactory;
}
