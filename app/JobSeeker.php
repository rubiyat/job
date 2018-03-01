<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    protected $fillable = [
        'user_id', 'hourly_rate', 'work_time_start', 'work_time_end'
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }

}
