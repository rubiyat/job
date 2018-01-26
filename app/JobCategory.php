<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function jobPosts() {
    	return $this->hasMany('App\JobPost');
    }
}
