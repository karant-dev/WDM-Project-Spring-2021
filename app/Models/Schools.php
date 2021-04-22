<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    protected $table = 'Schools';
    public $timestamps = false;
    protected $primaryKey = 'user_id';

    public function country()
    {
        return $this->hasOne(Counties::class, 'country_id');
    }
}
