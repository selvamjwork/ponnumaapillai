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

        return view('subadmin.dashboard.noofuser',compact('todayuser','alluser','male','female'));
    }    
}
