<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    public $fillable = ['link_id', 'country', 'count'];

    /**
    * return user
    */
    public function link()
    {
        return $this->hasOne('App\Link', 'id', 'link_id');
    }
}
