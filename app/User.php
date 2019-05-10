<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //FOLLOWERS
    public function follows() {
        return $this->hasMany('App\Follow', 'target_id', 'id');
    }

    //FOLLOWING
    public function following() {
        return $this->hasMany('App\Follow', 'user_id', 'id');
    }

    public function isFollowing($target_id)
    {
        $following = $this->follows()->count();

        if ($following > 0) {
            return true;
        }

        return false;
    }

    public function totalfollowers() {
        return $this->hasMany('App\Follow', 'target_id', 'id');
    }

    public function totalfollowings() {
        return $this->hasMany('App\Follow', 'user_id', 'id');
    }
}
