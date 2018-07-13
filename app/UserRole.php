<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
	protected $table = 'user_role';

 	protected $fillable = ['user_id','role'];

   	public $timestamps = false;

 	public function User()
 	{
 		return belongsTo('User');
 	}
}
