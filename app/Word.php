<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $table = 'tword';
	protected $primaryKey='id_word';
	
	//By default, Eloquent expects created_at and updated_at columns to exist on your tables.
	//If you do not wish to have these columns automatically managed by Eloquent, 
	//set the $timestamps property on your model to false
	public $timestamps = false;
	
}

