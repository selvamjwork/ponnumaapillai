<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\caste;
use App\UserLog;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Controllers\Controller;
use Charts;
use Carbon\Carbon;

class ReportPageController extends Controller
{
    public function index()
    {
        $date = date('y-m-d');
        $loggeduser = UserLog::where('created_at','>=',$date)->distinct('user_id')->count('user_id');
        
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

        return view('admin.dashboard.noofuser',compact('newuser', 'activeprofile', 'deleteprofile' ,'subadmins','casteid','payment','loggeduser','user','alluser','allmale', 'allfemale' ,'male','female'));
    }

    public function castewisereport(Request $request)
    {
        // $caste = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $date = date('y-m-d');
        $casteid = caste::all('id');
        $caste1 = User::where('created_at', '>=',$date )->where('caste','=','1')->count('id');
        $caste2 = User::where('created_at', '>=',$date )->where('caste','=','2')->count('id');
        $caste3 = User::where('created_at', '>=',$date )->where('caste','=','3')->count('id');
        $caste4 = User::where('created_at', '>=',$date )->where('caste','=','4')->count('id');
        $caste5 = User::where('created_at', '>=',$date )->where('caste','=','5')->count('id');
        $caste6 = User::where('created_at', '>=',$date )->where('caste','=','6')->count('id');
        $caste7 = User::where('created_at', '>=',$date )->where('caste','=','7')->count('id');
        $caste8 = User::where('created_at', '>=',$date )->where('caste','=','8')->count('id');
        $caste9 = User::where('created_at', '>=',$date )->where('caste','=','9')->count('id');
        $caste10 = User::where('created_at', '>=',$date )->where('caste','=','10')->count('id');
        $caste11 = User::where('created_at', '>=',$date )->where('caste','=','11')->count('id');
        $caste12 = User::where('created_at', '>=',$date )->where('caste','=','12')->count('id');
        $caste13 = User::where('created_at', '>=',$date )->where('caste','=','13')->count('id');
        $caste14 = User::where('created_at', '>=',$date )->where('caste','=','14')->count('id');
        $caste15 = User::where('created_at', '>=',$date )->where('caste','=','15')->count('id');
        $caste16 = User::where('created_at', '>=',$date )->where('caste','=','16')->count('id');
        $caste17 = User::where('created_at', '>=',$date )->where('caste','=','17')->count('id');
        $chart = Charts::create('pie', 'highcharts')
                  ->title('Caste Wise Report')
                  ->labels(['JANGAM – ஜங்கம்', 'CHETTIYAR – செட்டியார்', 'MUDALIYAR – முதலியார்','KONGU VELLALAR GOUNDER – கொங்கு வெள்ளாளர் கவுண்டர்', 'NADAR – நாடார்','MUKKULATHOR – முக்குலத்தோர்','ADI DRAVIDAR – ஆதி திராவிடர்','IYER – ஐயர்','IYENGAR – அய்யங்கார்','SOURASHTRA – சௌராட்டிரர்','NAIDU – நாய்டு','REDDIAR – ரெட்டியார்','VANNIYAR – வன்னியர்','UDAYAR – உடையார்','PILLAI – பிள்ளை','THULUVA VELLALAR - துளுவா வெல்லர்','YADAVAR – யாதவர்'])
                  ->values([$caste1,$caste2,$caste3,$caste4,$caste5,$caste6,$caste7,$caste8,$caste9,$caste10,$caste11,$caste12,$caste13,$caste14,$caste15,$caste16,$caste17])
                  ->dimensions(1000,500)
                  ->responsive(false);
     $date = date('y-m-d') ;
     $name = $request->query('from', 'end');
      $from = $request->from;
      $to = $request->end;
      $role = $request->role;
      $caste = $request->caste;
      $today= $request->today;
      $bysubadmin = $request->bysubadmin;
      $onemonth= $request->onemonth;
      #Day wise Report
        if ($request->has('today')) {
            $cwr = DB::table('users')
                ->Where('created_at', '>=',$date )
                ->get();
       $casteid = DB::table('caste')->get(); 
       $subadmins = DB::table('subadmins')->get(); 
        return view('admin.dashboard.castewisereport',compact('chart','casteid','subadmins'), ['caste_name' => $cwr]);
            }

        #Caste Wise Report
         if ($request->has(['caste'])) {
                    $bycaste = DB::table('users')
                            ->select('users.created_at as createdat','users.caste as caste', DB::raw("count(caste) as count"))
                            ->where('caste',$caste)
                            // ->whereBetween('created_at', [$from, $to])
                            ->groupBy('users.caste','users.created_at')
                            ->get();
            $casteid = DB::table('caste')->get();
            $subadmins = DB::table('subadmins')->get();  
            return view('admin.dashboard.castewisereport',compact('chart','casteid','subadmins'), ['bycaste' => $bycaste]);
        }
        #Caste Wise Report
         if ($request->has(['caste', 'from'])) {
                    $bycaste = DB::table('users')
                            ->select('users.created_at as createdat','users.caste as caste', DB::raw("count(caste) as count"))
                            ->where('caste',$caste)
                            // ->whereBetween('created_at', [$from, $to])
                            ->groupBy('users.caste','users.created_at')
                            ->get();
            $casteid = DB::table('caste')->get();
            $subadmins = DB::table('subadmins')->get();  
            return view('admin.dashboard.castewisereport',compact('chart','casteid','subadmins'), ['bycaste' => $bycaste]);
        }

        if ($request->has('onemonth')) {
            $cwr = DB::table('users')
                ->leftJoin('caste as caste', 'caste.id', '=', 'users.caste')
                ->leftJoin('paymentstatus as ps', 'ps.user_id', '=', 'users.user_id')
                ->select('users.user_id as uid','caste.caste_name as castename', 'ps.order_status as pstatus', 'caste.*','users.*', 'ps.*')
                ->Where('created_at', '>=', Carbon::now()->subMonth() )
                ->get();
       $casteid = DB::table('caste')->get(); 
       $subadmins = DB::table('subadmins')->get(); 
        return view('admin.dashboard.castewisereport',compact('chart','casteid','subadmins'), ['caste_name' => $cwr]);
            }

      if ($request->has('from')) {
        $cwr = DB::table('users')
                ->leftJoin('caste as caste', 'caste.id', '=', 'users.caste')
                ->leftJoin('paymentstatus as ps', 'ps.user_id', '=', 'users.user_id')
                ->select('users.user_id as uid','caste.caste_name as castename', 'ps.order_status as pstatus', 'caste.*','users.*', 'ps.*')
                ->whereBetween('created_at', [$from, $to])
                ->get();
        $casteid = DB::table('caste')->get(); 
        $subadmins = DB::table('subadmins')->get(); 
        return view('admin.dashboard.castewisereport',compact('chart','casteid','subadmins'), ['caste_name' => $cwr]);
        }
        if ($request->has('role')) {
        $cwr = DB::table('users')
                ->leftJoin('caste as caste', 'caste.id', '=', 'users.caste')
                ->leftJoin('paymentstatus as ps', 'ps.user_id', '=', 'users.user_id')
                ->select('users.user_id as uid','caste.caste_name as castename', 'ps.order_status as pstatus', 'caste.*','users.*', 'ps.*')
                ->where('role', $role)
                ->get();
        $casteid = DB::table('caste')->get(); 
        $subadmins = DB::table('subadmins')->get();
        return view('admin.dashboard.castewisereport',compact('chart','casteid','subadmins'), ['caste_name' => $cwr]);
        }
        if ($request->has('bysubadmin')) {
        $cwrs = DB::table('subadmins')
                // ->where('admin_id', '1')
                ->orWhere('created_at', '<=',$date )
                ->get();
        $casteid = DB::table('caste')->get(); 
        $subadmins = DB::table('subadmins')->get();
    // ->select('subadmins.*','users.*', 'ps.*').
    //        ->select('website_tags.id as id', 'website_tags.title as title', DB::raw("count(assigned_tags.tag_id) as count"))
        // $cwrs = DB::table('subadmins')
        //                     ->leftJoin('users as users', 'users.admin_id', '=', 'subadmins.id')
        //                     //->leftJoin('paymentstatus as ps', 'ps.user_id', '=', 'users.user_id','subadmins.*','users.*')
        //                     ->select('subadmins.id as subid','subadmins.name as subname','subadmins.email as subemail', DB::raw("count(users.admin_id) as count"), DB::raw("count(users.id) as usercount"))
        //                     ->groupBy('subadmins.id')
        //                     ->groupBy('users.admin_id')
        //                     ->groupBy('subadmins.name')
        //                     ->groupBy('subadmins.email')
        //                     ->get();
        //                     $casteid = DB::table('caste')->get(); 
        $onlineusers = DB::table('users')->where('admin_id','0')->get();
        $subadmins = DB::table('subadmins')->get();
        return view('admin.dashboard.castewisereport',compact('chart','casteid','subadmins','onlineusers'), ['cwrs' => $cwrs]);
        }
    $alls = DB::table('caste')
        ->leftJoin('users as users', 'users.caste', '=', 'caste.id')
        ->select('caste.caste_name as caste_name', 'users.created_at as created_date', DB::raw("count(users.admin_id) as count"))
        ->groupBy('caste.caste_name','users.created_at')
        ->get();
    $casteid = DB::table('caste')->get();
    $subadmins = DB::table('subadmins')->get();  
    return view('admin.dashboard.castewisereport',compact('chart','casteid','subadmins'), ['all' => $alls]);
    } 
}
