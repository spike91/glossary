<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $table = 'tdescription';
    protected $primaryKey='id_description_pk';

    public function userGlossary() 
    {
        return $this->belongsToMany(UserGlossary::class)->withPivot('cast');
    }

    public function categories() 
    {
        return $this->belongsToMany(Category::class);
    }

    public function word() 
    {
        return $this->belongsTo(Word::class);
    }

}
