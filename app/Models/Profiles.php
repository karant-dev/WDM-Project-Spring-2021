<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $table = 'Profiles';
    public $timestamps = false;
    protected $primaryKey = 'profile_id';

    public function user()
    {
        return $this->hasOne(Users::class, 'user_id');
    }
}
