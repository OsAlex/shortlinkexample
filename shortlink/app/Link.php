<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public $fillable = ['full', 'short', 'user_id', 'count'];

    const RULES = [
        'full'        => 'required|url',
        'short'       => 'sometimes|unique:links',
    ];


    /**
    * return user
    */
    public function owner() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
    * return user
    */
    public function stats() {
        return $this->hasMany('App\Stat', 'link_id', 'id');
    }

}
