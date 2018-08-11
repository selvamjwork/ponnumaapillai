<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\month;
use App\horoscope;
use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use Carbon;
use Auth;

class HoroscopesEditController extends Controller
{
    public function editHoroscope()
	{
		$user = \Auth::user();
		$horo = horoscope::where('user_id',$user->id)->get();
		foreach ($horo as $value) {
			$horoscopeid = $value->id;
		}
		$horoscope = horoscope::findOrFail($horoscopeid);
		
		#month dropdown
		$month = month::orderBy('id','ASC')->get();
		$monthArray = array();
		foreach ($month as $value) {
			$monthArray[$value['id']] =ucfirst($value['month_name']);
		}
		return view('horoscope.edit',compact('monthArray','horoscope'));
	}

	public function updateHoroscope(Request $request)
	{
		$user = \Auth::user();
		$formValue = $request->all();
		$horo = horoscope::where('user_id',$user->id)->get();
		foreach ($horo as $value) {
			$horoscopeid = $value->id;
		}
		$horoscope = horoscope::findOrFail($horoscopeid);
		$horoscope->update($formValue);
		session()->flash('success','Horoscope Updated SuccessFully');
        return redirect('/user/update-profile1');
		
	}
}
