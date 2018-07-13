<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;

class subcaste extends Model
{
    protected $table="subcaste";

    public $timestamps = false;

    protected $fillable =  ['subcaste_name','caste_id'];

    public function Validate(Request $data)
	{
		return Validator::make($data, [
			'othersubsect' => 'required|exists:subcaste,subcaste_name',
		]);
	}
}