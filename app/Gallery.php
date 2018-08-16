<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $table = 'gallery';

	public $timestamps = true;

    protected $fillable = ['title','discreption','image'];
}
