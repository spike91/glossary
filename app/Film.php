<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'film';
    protected $primaryKey='film_id';

    public function actors() 
    {
        return $this->belongsToMany(Actor::class)->withPivot('cast');
    }

    public function categories() 
    {
        return $this->belongsToMany(Category::class);
    }

    public function language() 
    {
        return $this->belongsTo(Language::class);
    }

}
