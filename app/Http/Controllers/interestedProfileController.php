<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Requests;
use DB;
use App\caste;
use App\subcaste;
use App\rasipalan;
use App\natchathiram;
use App\mothers_tongue;
use App\professional;
use App\graduate;
use App\interestedprofile;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\horoscope;
use App\dosatype;
use App\dosham;


class interestedProfileController extends Controller
{
    public function index()
    {   
        $cu = \Auth::user()->id;
        $profile = interestedprofile::where('isDeleted','=','no')->where('user_id','=',$cu)->get();
        if ($profile->isEmpty()) {
            return view('interested.noprofile');
        }
        else
        {   #woring
            $user = User::join('interestedprofiles', function($join)
            {
                $join->on('interestedprofiles.interesteduserid', '=', 'users.id');
             })
            ->where('interestedprofiles.user_id', '=', $cu)
            ->where('interestedprofiles.isDeleted', '=', 'no')
            ->select('users.*')
            ->paginate(5);
            return view('interested.index',compact('user'));
        }
    }

    public function show(User $user)
    {
        $horoscope = horoscope::where('user_id',$user->id)->get();
        $dosatype = dosatype::findOrFail($user->dosatype);
        $dosham = dosham::findOrFail($user->dosham);
        $caste = caste::findOrFail($user->caste);
        $subcaste = subcaste::findOrFail($user->subsect);
        $moonsign = rasipalan::findOrFail($user->moonsign);
        $star = natchathiram::findOrFail($user->star);
        $mother_tongue = mothers_tongue::findOrFail($user->mother_tongue);
        $professional = professional::findOrFail($user->professional);
        $graduate = graduate::findOrFail($user->graduate);
    	return view('interested.show',compact('dosham','dosatype','horoscope','user','caste','subcaste','moonsign','star','mother_tongue','professional','graduate'));
    }
    #Interested profile remove
    public function delete(User $user)
    {
        $currentUser = \Auth::user()->id;
        $profileList = interestedprofile::where('user_id','=',$currentUser)->where('interesteduserid','=',$user->id)->first();
        $update = interestedprofile::where('isDeleted','=','no')->find($profileList->id);
        $update->delete();
        session::flash('message','Profile Removed successfully');
    	return redirect('/interestedprofile');
    }
}
