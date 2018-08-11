<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;    
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Notifications\sendEmailVerifyToken;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\UserRole;
use App\caste;
use App\day;
use App\month;
use App\year;
use App\Sms;
use App\scrollingmessage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'mobile'=> 'required|string|max:10|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        unset($data['_token']);
        unset($data['password_confirmation']);
        $datappass = bcrypt($data['password']);
        $from = $data['year'];
        $to = date('Y');
        $age = $to-$from;
        $usercreate = User::create([
                'name' => $data['name'],
                'gender'=>$data['gender'],
                'day'=>$data['day'],
                'month'=>$data['month'],
                'year'=>$data['year'],
                'mobile'=>$data['mobile'],
                'caste'=>$data['caste'],
                'password' => $datappass,
                'email_verified'=>$data['email_verified'],
                'age'=> $age
            ]);       
        $userRole = UserRole::create(['user_id'=>$usercreate->id,'role'=>'user']);
        return $usercreate;
    }

    protected function emailVerificationTokenSend(array $data)
    {
        $emailToken = Str::random(60);
    }

    public function showRegistrationForm()
    {
        $scrollingmessage = scrollingmessage::where('active','=','1')->get();
        
        $caste = caste::orderBy('caste_name','ASC')->get();
        $casteArray = array();
        foreach ($caste as $value) {
            $casteArray[$value['id']] =ucfirst($value['caste_name']);
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
        return view('auth.register',compact('scrollingmessage','casteArray','yearArray','monthArray','dayArray'));
    }

    public function register(Request $request)
    {
        $us = new User;        
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );  
        }  
        $requestArray = $request->all();
        $user = $this->create($requestArray);
        Auth::login($user);
        return redirect('/home'); 
    }   
}
