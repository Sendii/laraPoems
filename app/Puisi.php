<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puisi extends Model
{
    public function User() {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function Like()
    {
    	return $this->hasMany('App\Like');
    }

    public function Comment()
    {
    	return $this->hasMany('App\Comment', 'puisi_id', 'id');
    }
}
