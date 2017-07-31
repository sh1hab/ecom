<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    
//for mass assignment
    protected $fillable=['name','descreption','size','price','category_id','image'];

    public function Category()
    {
    	return  $this->belongsTo('App\category');

    	//category::class
    }
}
