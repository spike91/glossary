<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actor';
	protected $primaryKey='actor_id';
	
	//By default, Eloquent expects created_at and updated_at columns to exist on your tables.
	//If you do not wish to have these columns automatically managed by Eloquent, 
	//set the $timestamps property on your model to false
	public $timestamps = false;
	
	public function films()
	{
		return $this->belongsToMany('App\Film');
	}
}

