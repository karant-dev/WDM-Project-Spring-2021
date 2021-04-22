<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contributions extends Model
{
    protected $table = 'Contributions';
    public $timestamps = false;
    protected $primaryKey = 'contribution_id';

    public function user()
    {
        return $this->hasOne(Users::class, 'user_id');
    }
}
