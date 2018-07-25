<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    
    protected $fillable = ['name', 'slug', 'braintree_plan', 'cost', 'description'];


    // cambia il return di default quando viene chiamato il model: da 'id' a 'slug' (vedi route model binding in PlansController@show)
    public function getRouteKeyName()
	{
	  return 'slug';
	}

    
}
