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
use Auth;
use App\dosatype;
use App\dosham;
use App\horoscope;

class UserController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('isEmailVerified');
	}

	public function selectSubsect($id,$selectedSubsect = '')
	{
		$caste = new caste;
		return $caste->selectSubsect($id,$selectedSubsect);
	}

	public function updateProfile1()
	{
		$user = \Auth::user();

		$dosatype = dosatype::findOrFail($user->dosatype);
        $dosham = dosham::findOrFail($user->dosham);

		$horoscope = horoscope::where('user_id',$user->id)->get();
		
		#dosatype dropdown
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

		#mother Tongue dropdown
		$mothers_tongue = mothers_tongue::orderBy('id','ASC')->get();
		$mothers_tongueArray = array();
		foreach ($mothers_tongue as $value) {
			$mothers_tongueArray[$value['id']] =ucfirst($value['language_name']);
		}

		#professional dropdown
		$professional = professional::orderBy('id','ASC')->get();
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

		return view('updateProfile.updateProfile1',compact(['dosham','dosatype','horoscope','doshamArray', 'dosatypeArray', 'user','casteArray','rasipalanArray','starArray','mothers_tongueArray','dayArray','monthArray','yearArray','hourArray','minuteArray','secondArray','qualificationArray','graduateArray','professionalArray']));
	}

	public function update1(Request $request)
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
		if ($request->hasFile('profile_pic')) {
			$path ='images/uploads/profile_pic';
			$file = $request->file('profile_pic');
			$file->getClientOriginalName();

			$targetFileName = date('YmdHis'.substr((string)microtime(), 1, 8)).'.'.$file->getClientOriginalExtension();
			$file->move($path,$targetFileName);
            $formValue['profile_pic'] = $targetFileName;        
		}
		if ($request['subsect'] == 'others') {
			$formValue['subsect'] = $subcaste->id;
		}
		$from = $formValue['year'];
        $to = date('Y');
        $formValue['age'] = $to-$from;
        $user = \Auth::user();
        $user->update($formValue);
        session()->flash('success','Profile Updated SuccessFully');
        return redirect('/myprofile');
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

	public function deleteUser()
	{
		return view('delete_profile.delete');
	}

	public function removepic()
	{
		$remove_profile = new User;		
		$remove_profile=\Auth::user();      
		$remove_profile->profile_pic = 'default.jpg';		
		$remove_profile->save();
		session()->flash('success','Profile Image Removed SuccessFully');
		return redirect('/home');
	}

	public function changePassword()
	{
		return view('user.changepass');
	}

	public function updatePassword(Request $request)
	{
		if (!(Hash::check($request->get('password'), Auth::user()->password))) {
            // The passwords matches
            session()->flash('error','Your current password does not matches with the password you provided. Please try again.');
            return redirect()->back();
        }

        if(strcmp($request->get('password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);
		$user = \Auth::user();
		$user->password = bcrypt($request->new_password);
		$user->save();
		return redirect()->back()->with("success","Password changed successfully !");
	}
}
		
        
        

        