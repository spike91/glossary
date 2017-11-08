<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tcategory';
    protected $primaryKey='id_category';

    public function descriptions() 
    {
       return $this->belongsToMany(Description::class);
    }
}
