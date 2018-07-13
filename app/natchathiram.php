<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class natchathiram extends Model
{
    protected $table = 'natchathiram';

    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
