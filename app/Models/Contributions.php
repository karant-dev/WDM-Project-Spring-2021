<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contributions extends Model {
    use hasFactory;
    public $timestamps = false;
    protected $primaryKey = 'contribution_id';
}
