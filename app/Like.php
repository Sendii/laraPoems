<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function puisi() {
    	return $this->belongsTo('App\Puisi', 'puisi_id', 'id');
    }

    public function User() {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
