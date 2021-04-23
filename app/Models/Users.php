<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Model
{
    // protected $table = 'Users';
    public $timestamps = false;
    // protected $primaryKey = 'user_id';

    // public function country()
    // {
    //     return $this->hasOne(Countries::class, 'country_id');
    // }

    use HasFactory;
}
