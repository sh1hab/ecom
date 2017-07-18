<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //

    protected $fillable;


    public function product()
    {
    	return  $this->hasMany('App\product');
    }
}
