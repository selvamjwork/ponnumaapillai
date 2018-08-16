<?php

namespace App\Http\Controllers\SubAdmin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\UserLog;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\month;
use App\caste;
class ReportPageController extends Controller
{
	public function index()
    {
    	$authuser = \Auth::user()->id;
    	$loggeduser = new UserLog;
    	$date = date('y-m-d');
    	
    	$todayuser= new User;
        $todayuser = User::where('created_at', '>=',$date )
        			->where('admin_id', '=',$authuser)
				    ->distinct('id')
				    ->count('id');
		$alluser= new User;
        $alluser = User::where('admin_id', '=',$authuser)
        			   ->distinct('id')
        			   ->count('id');
       	$male = User::where('admin_id', '=',$authuser)
       				   ->where('gender', '=','1')
        			   ->distinct('id')
        			   ->count('id');
        $female = User::where('admin_id', '=',$authuser)
       				   ->where('gender', '=','2')
        			   ->distinct('id')
        			   ->count('id');

        $newuser = User::where('admin_id', '=',$authuser)->where('created_at', '>=',$date )->paginate(10);

        return view('subadmin.dashboard.noofuser',compact('newuser','todayuser','alluser','male','female'));
    } 

    public function monthwisereport(Request $request)
    {
        $authuser = \Auth::user()->id;
        $monthList  = month::get();
        $caste = caste::get();
        $requestAll = $request->All();
        if (!empty($requestAll)) {
            $month = User::where('payment_completed','1')->where('admin_id',$authuser)->whereMonth('created_at',$request->month)
                ->groupBy('created_at','caste')
                ->selectRaw('count(created_at) as count, DATE_FORMAT(created_at,"%d/%m/%Y") as created_date , caste')
                ->orderBy('caste')
                ->orderBy('created_at')
                ->get()
                ->groupBy('caste');
            $month = $month->toArray();

            $month_details=[
                "month"=>$request->month,
                "days_count"=>cal_days_in_month(CAL_GREGORIAN,$request->month,date("Y"))
            ];
            return view('subadmin.dashboard.monthwisereport',compact(['requestAll','monthList','subadmin','month','caste','month_details']));
        }
        else{
            $month_details = ['month' => '','days_count' => ''];
            return view('subadmin.dashboard.monthwisereport',compact(['requestAll','month_details','monthList','caste','subadmin']));
        }
    }
}
