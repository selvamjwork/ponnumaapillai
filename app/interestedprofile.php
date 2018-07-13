<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class interestedprofile extends Model
{
    protected $table = 'interestedprofiles';

    protected $fillable = ['user_id', 'interesteduserid'];

    public function User()
    {
    	return $this->hasMany('App\User','interesteduserid');
    }
}
