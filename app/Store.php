<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->belongstoMany('App\Product');
    }
}
