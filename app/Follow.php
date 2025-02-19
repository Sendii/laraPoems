<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['target_id'];

    //FOLLOWERS
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    //FOLLOWINGS
    public function users()
    {
        return $this->hasOne('App\User', 'id', 'target_id');
    }
}
