<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    public function userByMobile()
 	{
 		return $this->belongsTo('App\User','mobile','mobile');
 	}
}
