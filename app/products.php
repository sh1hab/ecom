<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    //

    protected $fillable=[''];

    public function Category()
    {
    	return  $this->hasMany('Category::class');
    }
}
