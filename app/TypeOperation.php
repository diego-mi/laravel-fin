<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOperation extends Model
{
    protected $table = 'type_operations';

    public function source()
    {
        return $this->hasMany('App\Source');
    }
}
