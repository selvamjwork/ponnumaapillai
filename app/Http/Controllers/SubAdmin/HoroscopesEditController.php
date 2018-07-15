<?php

namespace App\Http\Controllers\SubAdmin;

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
    public function editHoroscope($user)
	{
		$horo = horoscope::where('user_id',$user)->get();
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
		return view('subadmin.horoscope.edit',compact('monthArray','horoscope'));
	}

	public function updateHoroscope(Request $request)
	{
		$formValue = $request->all();
		$horo = horoscope::where('user_id',$request->user_id)->get();
		foreach ($horo as $value) {
			$horoscopeid = $value->id;
		}
		$horoscope = horoscope::findOrFail($horoscopeid);
		$horoscope->update($formValue);
		session()->flash('success','Horoscope Updated SuccessFully');
        return redirect('/subadmin/manage-user/'.$request->user_id.'/edit');
		
	}
}
