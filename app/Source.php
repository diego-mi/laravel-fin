<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $table = 'sources';

    public function type_operation()
    {
        return $this->belongsTo('App\TypeOperation');
    }
}
