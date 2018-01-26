<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    public function jobCategory() {
    	return $this->belongsTo('App\JobCategory');
    }
}
