<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Requests;
use View;
use Carbon\Carbon;
use Closure;
use App\UserLog;
use App\caste;
use App\subcaste;
use App\rasipalan;
use App\natchathiram;
use App\mothers_tongue;
use App\professional;
use App\graduate;
use DB;
use App\Sms;
use App\mobile_verify;
use PDF;
use App\horoscope;
use App\dosatype;
use App\dosham;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userLog = UserLog::get();
        $id = Auth::user();
        if($id->mobile_verified == 1)
        {
            if ($userLog->user_id = $id->id) {
                $logindate = UserLog::where('user_id','=',$id->id)->orderBy('updated_at', 'desc')->first();
            }
            if (!is_null($id->payment_date)) {
                $created_at = new Carbon(($id->payment_date));
                $expired_date = Carbon::parse($created_at)->addMonths(12)->format('d-m-Y');
            }
            else
            {
                $expired_date = "";
            }
            return view('home',compact(['id','logindate','expired_date']));
        }
        else
        {
            $result = DB::table('mobile_verify')->where('user_id','=',$id->id)->where('role','user')->first();

            if(empty($result->user_id))
            {
                $userid_generete = 'PM1'  .sprintf("%05d", $id->id);
                $id->user_id = $userid_generete;
                // dd($userid_generete);
                $mobile_verification_num = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );
                $message = 'Your One Time Password is '.$mobile_verification_num.' in PONNU MAAPILLAI for Your Matrimony ID: ' . $userid_generete . ' & Registered Mobile No: '. $id->mobile;
                $sms = new Sms;
                $smsStatus = $sms->sendSms($id,$message,'user');
                
                if ($smsStatus) 
                {
                    $mobile = new mobile_verify([
                        'to_mobile_no'=>$id->mobile,
                        'message'=>$message,
                        'user_id'=>$id->id,
                        'verification_code'=>$mobile_verification_num,
                    ]);
                    $mobile->save();
                    $id->save();

                    session()->flash('message',"Your Verification Code is send to $id->mobile" );
                }
                else
                {
                    session()->flash('message',"Something went wrong. Please Check the given mobile number $id->mobile or contant admin" );
                }           

            }
            return redirect('/mobileVerification');
        }
    }
    public function show(User $user)
    {
        $users = Auth::user()->id;
        return view('user.show', compact('user'));
    }

    public function myprofile()
    {   
        $us = \Auth::user();
        $horoscope = horoscope::where('user_id',$us->id)->get();
        $dosatype = dosatype::findOrFail($us->dosatype);
        $dosham = dosham::findOrFail($us->dosham);
        $caste = caste::findOrFail($us->caste);
        $subcaste = subcaste::findOrFail($us->subsect);
        $moonsign = rasipalan::findOrFail($us->moonsign);
        $star = natchathiram::findOrFail($us->star);
        $mother_tongue = mothers_tongue::findOrFail($us->mother_tongue);
        $professional = professional::findOrFail($us->professional);
        $graduate = graduate::findOrFail($us->graduate);
        // dd($graduate->graduate_name);
        $user = User::where('id','=',$us->id)->get();
        return view('user.myprofile',compact('dosham','dosatype','horoscope','user','caste','subcaste','moonsign','star','mother_tongue','professional','graduate'));
    }

    public function pdf()
    {
        $us = \Auth::user();
        $caste = caste::findOrFail($us->caste);
        $subcaste = subcaste::findOrFail($us->subsect);
        $moonsign = rasipalan::findOrFail($us->moonsign);
        $star = natchathiram::findOrFail($us->star);
        $mother_tongue = mothers_tongue::findOrFail($us->mother_tongue);
        $professional = professional::findOrFail($us->professional);
        $graduate = graduate::findOrFail($us->graduate);

        $pdf= PDF::loadView('pdf',['us'=>$us,'caste'=>$caste,'subcaste'=>$subcaste,'moonsign'=>$moonsign,'star'=>$star,'mother_tongue'=>$mother_tongue,'professional'=>$professional,'graduate'=>$graduate]);
        return $pdf->download('us.pdf');
    }
}