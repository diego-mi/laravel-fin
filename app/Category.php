<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function transactions()
    {
        return $this->hasMany('App\Transactions');
    }
}
