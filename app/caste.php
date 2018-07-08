<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class caste extends Model
{
	public $timestamps = false;
	
    protected $table = 'caste';

    protected $fillable = ['id','caste_name'];
}
