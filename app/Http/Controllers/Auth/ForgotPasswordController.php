<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use App\User;
use App\PasswordReset;
use App\Sms;
use DB;
use Auth;
use Illuminate\Http\Request;
use Carbon;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    public function resetPasswrodThrougSms(Request $request)
    {
        //dd(User::find(1));

        $this->validate($request, [
                'mobile' => 'required|exists:users,mobile',
                
            ]);
      $token = str_random(64);
      $mobile_verification_num = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(1,9));
      $user = User::where(['mobile'=>$request['mobile']])->first();
      $check = Sms::sendSms($user,"Your One Time Password in PONNU MAAPILLAI for Password Reset in Registered Mobile No: " . $user->mobile . ' is ' . $mobile_verification_num,'user');
      if($check ){
        DB::table('password_resets')->insert([
          'mobile'=>$request->mobile,
          'mobile_code'=>$mobile_verification_num,
          'created_at' =>Carbon\Carbon::now()
          ]);
        return view('auth.passwords.reset_password',compact('user'));
      }else{
        // session()->flash('message','');
      return response()->json(['message'=>["Somthing went Wrong. Please Try after sometime or try reset by email"]],503);
      }


    }

    public function resetpass(Request $request)
    {
        $this->validate($request, [
            'mobile_reset_code' => "numeric|exists:password_resets,mobile_code",
            'password' => 'required|confirmed',

        ],[
            'mobile_reset_code.exists'=>'Invalid Code',
        ]);
        $credentials = $request->only(
            'mobile_reset_code', 'password', 'password_confirmation'
        );
        $findno = PasswordReset::where('mobile_code',$request->mobile_reset_code)->first();
        $us = User::where('mobile',$findno->mobile)->first();
        $resetDetails= PasswordReset::where('mobile',$us->mobile)->orderBy('created_at','desc')->first();
        if ($resetDetails->mobile_code != $request->mobile_reset_code) {
            return view('auth.passwords.expired');
        }
        
        $user = $resetDetails->userByMobile;
        $user->password = bcrypt($credentials['password']);
        $user->save();
        Auth::login($user);
        return redirect('/home');
    }


    public function verifyMobileResetCode(Request $request)
    {   
            $this->validate($request, [
                    'mobile_reset_code'=>"numeric|exists:password_resets,mobile_code",
                    'password' => 'required|confirmed',
            ],[
            'mobile_reset_code.exists'=>'Invalid Code',
            ]);
            $credentials = $request->only(
                    'mobile_reset_code', 'password', 'password_confirmation'
            );

            // dd($credentials);
            $resetDetails= PasswordReset::where('mobile',$request->mobile)->orderBy('id','desc')->first();

            if ($resetDetails->mobile_code != $request->mobile_reset_code) {
                return response()->json(['message'=>['Verification Code is Expired']],422);
            }

            $user = $resetDetails->userByMobile;
            $user->password = bcrypt($credentials['password']);
            $user->save();
            Auth::login($user);
            $resetDetails->delete();
            return response()->json(['success'=>['Verified. Redirecting'],'redirect'=>['/']]);
    }
}