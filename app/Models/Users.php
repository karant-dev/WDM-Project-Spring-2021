<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'Users';
    public $timestamps = false;
    protected $primaryKey = 'user_id';

    public function country()
    {
        return $this->hasOne(Countries::class, 'country_id');
    }
}
