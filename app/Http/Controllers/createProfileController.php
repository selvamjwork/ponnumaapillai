<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\rasipalan;
use App\natchathiram;
use App\mothers_tongue;
use App\caste;
use App\subcaste;
use Hash;
use App\Http\Controllers\Controller;
use Carbon;
use App\day;
use App\month;
use App\year;
use App\hour;
use App\minute;
use App\second;
use App\qualification;
use App\graduate;
use App\professional;
use App\Http\Requests\PasswordChangeRequest;
use App\Sms;
use App\dosatype;
use App\dosham;
use App\horoscope;

class createProfileController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
		$this->middleware('isEmailVerified');
	}

    public function createForm1()
    {
    	$user = \Auth::user();

    	#caste dropdown
		$caste = caste::orderBy('caste_name','ASC')->get();
		$casteArray = array();
		foreach ($caste as $value) {
			$casteArray[$value['id']] =ucfirst($value['caste_name']);
		}

		#graduate dropdown
		$graduate = graduate::orderBy('id','dec')->get();
		$graduateArray = array();
		foreach ($graduate as $value) {
			$graduateArray[$value['id']] =ucfirst($value['graduate_name']);
		}

		#professional dropdown
		$professional = professional::orderBy('id','ASC')->get();
		$professionalArray = array();
		foreach ($professional as $value) {
			$professionalArray[$value['id']] =ucfirst($value['professional_name']);
		}

		#mother Tongue dropdown
		$mothers_tongue = mothers_tongue::orderBy('id','ASC')->get();
		$mothers_tongueArray = array();
		foreach ($mothers_tongue as $value) {
			$mothers_tongueArray[$value['id']] =ucfirst($value['language_name']);
		}

		return view('profile.createProfile1',compact(['user','casteArray','graduateArray','mothers_tongueArray','professionalArray']));
    }

    public function createForm2()
    {
    	$user = \Auth::user();
    	return view('profile.createProfile2',compact(['user']));
    }

    public function createForm3()
    {
    	

		#rasi dropdown
		$rasipalan = rasipalan::orderBy('id','ASC')->get();
		$rasipalanArray = array();
		foreach ($rasipalan as $value) {
			$rasipalanArray[$value['id']] =ucfirst($value['rasi_name']);
		}

		#star dropdown
		$star = natchathiram::orderBy('id','ASC')->get();
		$starArray = array();
		foreach ($star as $value) {
			$starArray[$value['id']] =ucfirst($value['star_name']);
		}

		#day dropdown
		$day = day::orderBy('id','ASC')->get();
		$dayArray = array();
		foreach ($day as $value) {
			$dayArray[$value['id']] =ucfirst($value['day_name']);
		}
		
		#month dropdown
		$month = month::orderBy('id','ASC')->get();
		$monthArray = array();
		foreach ($month as $value) {
			$monthArray[$value['id']] =ucfirst($value['month_name']);
		}

		#year dropdown
		$year = year::orderBy('year_id','ASC')->get();
		$yearArray = array();
		foreach ($year as $value) {
			$yearArray[$value['year_id']] =ucfirst($value['year_name']);
		}

		#hour dropdown
		$hour = hour::orderBy('id','ASC')->get();
		$hourArray = array();
		foreach ($hour as $value) {
			$hourArray[$value['id']] =ucfirst($value['hour']);
		}

		#minute dropdown
		$minute = minute::orderBy('id','ASC')->get();
		$minuteArray = array();
		foreach ($minute as $value) {
			$minuteArray[$value['id']] =ucfirst($value['minute_name']);
		}

		#dosatpe dropdown
		$dosatype = dosatype::orderBy('id','ASC')->get();
		$dosatypeArray = array();
		foreach ($dosatype as $value) {
			$dosatypeArray[$value['id']] =ucfirst($value['dosatype_name']);
		}

		#dosham dropdown
		$dosham = dosham::orderBy('id','ASC')->get();
		$doshamArray = array();
		foreach ($dosham as $value) {
			$doshamArray[$value['id']] =ucfirst($value['dosham_name']);
		}

		#second dropdown
		$second = second::orderBy('id','ASC')->get();
		$secondArray = array();
		foreach ($second as $value) {
			$secondArray[$value['id']] =ucfirst($value['second_name']);
		}

		#qualification dropdown
		$qualification = qualification::orderBy('id','ASC')->get();
		$qualificationArray = array();
		foreach ($qualification as $value) {
			$qualificationArray[$value['id']] =ucfirst($value['qualification_name']);
		}

    	$user = \Auth::user();
    	return view('profile.createProfile3',compact(['doshamArray','dosatypeArray','user','casteArray','rasipalanArray','starArray','mothers_tongueArray','dayArray','monthArray','yearArray','hourArray','minuteArray','secondArray','qualificationArray']));
    }
    public function create1(Request $request)
    {
    	if (!empty($request->othersubsect)) {
			$subcaste = subcaste::create([
				'subcaste_name' => $request->othersubsect,
				'caste_id' => $request->caste,
			]);
		}
		$user = new User;
		$targetFileName = '';
		$formValue = $request->all();
		$validator = $user->updateValidate($formValue);
		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);  
		}
		// $from = $formValue['year'];
  		// $to = date('Y');
  		// $formValue['age'] = $to-$from;
        // $formValue['payment_completed'] = '1';
		if ($request->hasFile('profile_pic')) {
			$path ='images/uploads/profile_pic';
			$file = $request->file('profile_pic');
			$file->getClientOriginalName();

			$targetFileName = time('YmdHis'.substr((string)microtime(), 1, 8)).'.'.$file->getClientOriginalExtension();
			$file->move($path,$targetFileName);
            $formValue['profile_pic'] = $targetFileName;        
		}
		if ($request['subsect'] == 'others') {
			$formValue['subsect'] = $subcaste->id;
		}
		$user = \Auth::user();
		$user->update($formValue);
        return redirect('/user/create-profile2');
    }

    public function create2(Request $request)
    {
    	if (!empty($request->othersubsect)) {
			$subcaste = subcaste::create([
				'subcaste_name' => $request->othersubsect,
				'caste_id' => $request->caste,
			]);
		}
		$user = new User;
		$targetFileName = '';
		$formValue = $request->all();
		$validator = $user->updateValidate($formValue);
		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);  
		}
		// $from = $formValue['year'];
  		// $to = date('Y');
  		// $formValue['age'] = $to-$from;
        // $formValue['payment_completed'] = '1';
		if ($request->hasFile('profile_pic')) {
			$path ='images/uploads/profile_pic';
			$file = $request->file('profile_pic');
			$file->getClientOriginalName();

			$targetFileName = time('YmdHis'.substr((string)microtime(), 1, 8)).'.'.$file->getClientOriginalExtension();
			$file->move($path,$targetFileName);
            $formValue['profile_pic'] = $targetFileName;        
		}
		if ($request['subsect'] == 'others') {
			$formValue['subsect'] = $subcaste->id;
		}
		$user = \Auth::user();
		$user->update($formValue);
        return redirect('/user/create-profile3');
    }

    public function create3(Request $request)
    {
    	if (!empty($request->othersubsect)) {
			$subcaste = subcaste::create([
				'subcaste_name' => $request->othersubsect,
				'caste_id' => $request->caste,
			]);
		}
		$user = new User;
		$targetFileName = '';
		$formValue = $request->all();
		$validator = $user->updateValidate($formValue);

		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);  
		}
		$from = $formValue['year'];
        $to = date('Y');
        $formValue['age'] = $to-$from;
        $formValue['payment_completed'] = '1';
		if ($request->hasFile('profile_pic')) {
			$path ='images/uploads/profile_pic';
			$file = $request->file('profile_pic');
			$file->getClientOriginalName();

			$targetFileName = time('YmdHis'.substr((string)microtime(), 1, 8)).'.'.$file->getClientOriginalExtension();
			$file->move($path,$targetFileName);
            $formValue['profile_pic'] = $targetFileName;        
		}
		$user = \Auth::user();
		$user->update($formValue);
        $horoscope = horoscope::create([
        	'user_id' => $user->id,
        	'raasi_sun' => $request->raasi_sun,
        	'raasi_moon' => $request->raasi_moon,
        	'raasi_mars' => $request->raasi_mars,
        	'raasi_mercury' => $request->raasi_mercury,
        	'raasi_jupiter' => $request->raasi_jupiter,
        	'raasi_venus' => $request->raasi_venus,
        	'raasi_saturn' => $request->raasi_saturn,
        	'raasi_raagu' => $request->raasi_raagu,
        	'raasi_kethu' => $request->raasi_kethu,
        	'raasi_lagna' => $request->raasi_lagna,
        	'amsam_sun' => $request->amsam_sun,
        	'amsam_moon' => $request->amsam_moon,
        	'amsam_mars' => $request->amsam_mars,
        	'amsam_mercury' => $request->amsam_mercury,
        	'amsam_jupiter' => $request->amsam_jupiter,
        	'amsam_venus' => $request->amsam_venus,
        	'amsam_saturn' => $request->amsam_saturn,
        	'amsam_raagu' => $request->amsam_raagu,
        	'amsam_kethu' => $request->amsam_kethu,
        	'amsam_lagna' => $request->amsam_lagna,
        ]);
        return redirect('/user/create-form-preview');
    }
    public function createprofilepreview()
    {
    	$user = \Auth::user();
    	$horoscope = horoscope::where('user_id',$user->id)->get();
    	//dd($user);
    	$dosatype = dosatype::findOrFail($user->dosatype);
    	$dosham = dosham::findOrFail($user->dosham);
    	$caste = caste::findOrFail($user->caste);
        $subcaste = subcaste::findOrFail($user->subsect);
        $moonsign = rasipalan::findOrFail($user->moonsign);
        $star = natchathiram::findOrFail($user->star);
        $mother_tongue = mothers_tongue::findOrFail($user->mother_tongue);
        $professional = professional::findOrFail($user->professional);
        $graduate = graduate::findOrFail($user->graduate);
    	return view('profile.preview',compact('dosatype','dosham','horoscope','user','graduate','professional','mother_tongue','star','moonsign','subcaste','caste'));
    }
    public function createprofilesms(Request $request)
    {
    	
		return view('default.payment');
    }
}
