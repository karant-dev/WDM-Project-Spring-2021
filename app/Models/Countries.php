<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $table = 'Countries';
    public $timestamps = false;
    protected $primaryKey = 'country_id';

    public function continent()
    {
        return $this->hasOne(Continents::class, 'continent_id');
    }
}
