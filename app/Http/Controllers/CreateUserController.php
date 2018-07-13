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

class CreateUserController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('isEmailVerified');
	}
	public function updateProfile()
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
		$professional = professional::orderBy('professional_name','ASC')->get();
		$professionalArray = array();
		foreach ($professional as $value) {
			$professionalArray[$value['id']] =ucfirst($value['professional_name']);
		}

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

		#mother Tongue dropdown
		$mothers_tongue = mothers_tongue::orderBy('id','ASC')->get();
		$mothers_tongueArray = array();
		foreach ($mothers_tongue as $value) {
			$mothers_tongueArray[$value['id']] =ucfirst($value['language_name']);
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

		return view('user.createProfile',compact(['user','casteArray','rasipalanArray','starArray','mothers_tongueArray','dayArray','monthArray','yearArray','hourArray','minuteArray','secondArray','qualificationArray','graduateArray','professionalArray']));
	}

	public function update(Request $request)
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
		if ($request['subsect'] == 'others') {
			$formValue['subsect'] = $subcaste->id;
		}
        $user = \Auth::user();
        $user->update($formValue);

		if ($user->gender == 1) 
		{
			if ($user->star == 1) 
			{
				$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,6,9,10,13,15,18,19,23,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 2) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,6,8,11,16,17,20,23,25,26))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 3) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(5,7,12,14,20,21,22,23,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 4) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(4,10,11,13,15,22,24))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 5) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(5,10,11,14,23))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 6) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(4,6,7,8,9,13,15,17,18,22,24))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 7) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,6,7,9,10,11,12,16,19,21,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 8) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,8,9,11,14,16,17,20,22,23,25,26))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 9) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,6,9,10,11,18,19,26))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 10) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,5,7,9,10,18,19,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 11) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,4,5,7,8,9,11,17,20,26))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 12) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,7,14,16,21,23,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 13) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,4,6,13,15,16,22,23,24,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 14) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,3,5,8,12,13,14,15,17,18,21,23,24,26,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 15) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,4,6,13,14,15,16,17,22,23,24,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 16) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,3,7,8,11,12,13,17,18,20,21,24,25,26,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 17) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,6,8,11,16,19,20,23,25,26))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 18) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,6,9,10,14,16,18,19,20,23,25,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 19) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,7,9,10,17,18,19,21,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 20) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,3,8,11,17,20,26))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 21) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,7,12,14,16,24,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 22) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,4,6,8,13,15,22,24))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 23) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,2,3,8,9,11,13,14,15,17,18,21,23,24,25,26,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 24) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,4,6,13,14,15,22,23,24,25,26))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 25) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,2,3,7,8,12,13,15,16,17,18,21,24,25,26,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 26) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,4,8,11,14,19,20,23,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 27) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,9,10,14,16,18,19,23,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
		}
		else{
			if ($user->star == 1) 
			{
				$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,9,10,13,15,18,19,23,25,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 2) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,8,11,14,16,20,23,24,25,26))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 3) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,7,12,14,16,17,20,21,22,23,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 4) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(4,6,11,13,15,22,24,26))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 5) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,5,10,11,14,23))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 6) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,2,4,6,7,9,13,15,17,18,22,24))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 7) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,6,7,10,11,12,16,19,21,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 8) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,6,8,11,14,16,17,20,22,23,25,26))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 9) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,6,7,8,9,10,11,18,19,23,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 10) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,4,5,7,9,10,18,19,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 11) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,4,5,7,8,9,11,16,17,20,23,26))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 12) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,7,14,16,21,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 13) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,4,6,13,14,15,16,22,23,24,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 14) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,5,8,12,14,15,18,21,23,24,26,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 15) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,4,6,13,14,15,22,23,24,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 16) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,3,7,8,12,13,15,17,18,21,24,25,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 17) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,6,8,11,14,15,16,19,20,23,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 18) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,6,9,10,14,16,18,19,23,25,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 19) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,7,9,10,17,18,19,26,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 20) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,3,8,11,16,17,18,20,26))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 21) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,7,12,14,16,19,23,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 22) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,4,6,8,13,15,22,24))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 23) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,2,3,5,8,12,13,14,15,17,18,23,24,26,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 24) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(4,6,13,14,15,16,21,22,23,24,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 25) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,3,7,8,12,13,15,16,17,18,21,23,24,25,26,27))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 26) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,8,9,11,14,16,17,20,23,24,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
        	elseif ($user->star == 27) {
        		$caste = User::where('caste', '=',$user->caste)->get();
				foreach ($caste as $value) {
					$male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,10,14,16,18,19,23,25))->get();
				}
				foreach ($male as $key => $male) 
				{
					#send Short Url SMS
					$message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$male->id;
					$sms = new Sms;
					$smsStatus = $sms->sendSms($male,$message,'user');
				}
        	}
		}
		return view('default.payment');

	}

	public function deactiveUser()
	{
		$deactiveUser = new User();
		$deactiveUser = \Auth::user();
		$deactiveUser->active = '0';
		$deactiveUser->save();
		session()->flash('success','Profile Deleted SuccessFully');
		\Auth::logout();
		return redirect('login');
	}

	public function removepic()
	{
		$remove_profile = new User;		
		$remove_profile=\Auth::user();      
		$remove_profile->profile_pic = 'default.jpg';		
		$remove_profile->save();
		session()->flash('success','Profile Image Removed SuccessFully');
		return redirect('/user/update-profile');
	}

	public function changePassword()
	{
		return view('user.changepass');
	}

	public function updatePassword(PasswordChangeRequest $request)
	{
		$user = \Auth::user();
		$user->password = bcrypt($request->new_password);
		$user->save();
		session()->flash('message','Password Changes Successfully Updated');
		return redirect('/home');
	}

}
