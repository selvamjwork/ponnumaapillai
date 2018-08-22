<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contect extends Model
{
    protected $table = 'contects';

    protected $fillable = ['area', 'address', 'mobile', 'email'];
}
