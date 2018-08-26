<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Subadmin;
use App\caste;
use App\UserLog;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Controllers\Controller;
use Charts;
use App\month;
use Carbon\Carbon;

class ReportPageController extends Controller
{
    public function index()
    {
        $date = date('y-m-d');
        $loggeduser = UserLog::where('created_at','>=',$date)->distinct('user_id')->count('user_id');
        $onlineUserCount = User::whereNull('admin_id')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->distinct('id')->count('id');;
        $user = User::where('created_at', '>=',$date )->distinct('id')->count('id');
        
        $alluser = User::distinct('id')->count('id');

        $male = User::where('gender','=','1')->where('created_at', '>=',$date )->distinct('id')->count('id');

        $female = User::where('gender','=','2')->where('created_at', '>=',$date )->distinct('id')->count('id');

        $allmale = User::where('gender','=','1')->distinct('id')->count('id');

        $allfemale = User::where('gender','=','2')->distinct('id')->count('id');

        $payment = User::where('payment_completed','=','1')->distinct('id')->count('id');

        $activeprofile = User::where('active','=','1')->distinct('id')->count('id');
        $deleteprofile = User::where('active','=','0')->distinct('id')->count('id');
        $subadmins = DB::table('subadmins')->get();
        $casteid = DB::table('caste')->get();
        $newuser = User::where('created_at', '>=',$date )->paginate(10);
        return view('admin.dashboard.noofuser',compact('newuser', 'activeprofile', 'deleteprofile' ,'subadmins','casteid','payment','loggeduser','user','alluser','allmale', 'allfemale' ,'male','female','onlineUserCount'));
    }

    public function adminwisecastereport(Request $request)
    { 
        $subadmin = Subadmin::get();
        $monthList  = month::get();
        $caste = caste::get();
        $requestAll = $request->All();
        if (!empty($requestAll)) {
            $month = User::where('payment_completed','1')->where('admin_id',$request->admin)->whereMonth('created_at',$request->month)
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
            return view('admin.dashboard.adminwisecastereport',compact(['requestAll','monthList','subadmin','month','caste','month_details']));
        }
        else{
            $month_details = ['month' => '','days_count' => ''];
            return view('admin.dashboard.adminwisecastereport',compact(['requestAll','month_details','monthList','caste','subadmin']));
        }
    }

    public function SubadminWiseReport(Request $request)
    {
        $subadmin = Subadmin::get();
        $monthList  = month::get();
        $requestAll = $request->All();
        if (!empty($requestAll)) {
            $month = User::where('payment_completed','1')->whereMonth('created_at',$request->month)
                ->groupBy('created_at','admin_id')
                ->selectRaw('count(created_at) as count, DATE_FORMAT(created_at,"%d/%m/%Y") as created_date , admin_id')
                ->orderBy('admin_id')
                ->orderBy('created_at')
                ->get()
                ->groupBy('admin_id');
            $month = $month->toArray();
            $month_details=[
                "month"=>$request->month,
                "days_count"=>cal_days_in_month(CAL_GREGORIAN,$request->month,date("Y"))
            ];
            return view('admin.dashboard.subadminreport',compact(['requestAll','monthList','subadmin','month','month_details']));
        }
        else{
            $month_details = ['month' => '','days_count' => ''];
            return view('admin.dashboard.subadminreport',compact(['requestAll','month_details','monthList','subadmin']));
        }
    }

    public function castewisereport(Request $request)
    {
        $monthList  = month::get();
        $caste = caste::get();
        $requestAll = $request->All();
        if (!empty($requestAll)) {
            $month = User::where('payment_completed','1')->whereMonth('created_at',$request->month)
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
            return view('admin.dashboard.castewisereport',compact(['requestAll','monthList','month','caste','month_details']));
        }
        else{
            $month_details = ['month' => '','days_count' => ''];
            return view('admin.dashboard.castewisereport',compact(['requestAll','month_details','monthList','caste']));
        }
    }

    public function onlineUserCount(Request $request)
    {
        $monthList  = month::get();
        $caste = caste::get();
        $requestAll = $request->All();
        if (!empty($requestAll)) {
            $month = User::whereNull('admin_id')->where('payment_completed','1')->whereMonth('created_at',$request->month)
                ->groupBy('created_at')
                ->selectRaw('count(created_at) as count, DATE_FORMAT(created_at,"%d/%m/%Y") as created_date')
                ->orderBy('created_at')
                ->get();
            $month = $month->toArray();
            $month_details=[
                "month"=>$request->month,
                "days_count"=>cal_days_in_month(CAL_GREGORIAN,$request->month,date("Y"))
            ];
            return view('admin.dashboard.online',compact(['requestAll','monthList','month','caste','month_details']));
        }
        else{
            $month_details = ['month' => '','days_count' => ''];
            return view('admin.dashboard.online',compact(['requestAll','month_details','monthList','caste']));
        }
    }
}
