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
use Session;
use Illuminate\Support\Facades\Redirect;
use App\horoscope;
use App\dosatype;
use App\dosham;

class ProfileSearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('isEmailVerified');
    }

    public function index(Request $request)
    {
        #graduate dropdown
        $graduate = graduate::orderBy('id','ASC')->get();

        #professional dropdown
        $professional = professional::orderBy('id','ASC')->get();

        #caste dropdown
        $caste = caste::orderBy('caste_name','ASC')->get();
        $minage= $request['ageform'];
        $maxage= $request['ageto'];
        $us = \Auth::user();

        $items_checked = Input::get('graduate');

        $arrayName = array('services' => $request->graduate, );
        if ($us->gender == 1)
        {
            if ($request['caste'] == 'all') 
            {
                if ($us->star == 1) 
                {
                    if (!empty($items_checked)) 
                    {   
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,6,9,10,13,15,18,19,23,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);   
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,6,9,10,13,15,18,19,23,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 2) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,6,8,11,16,17,20,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,6,8,11,16,17,20,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==3) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(5,7,12,14,20,21,22,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(5,7,12,14,20,21,22,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 4)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(4,10,11,13,15,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                         $user = User::whereNotIn('star',array(4,10,11,13,15,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 5) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(5,10,11,14,23))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(5,10,11,14,23))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==6) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(4,6,7,8,9,13,15,17,18,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(4,6,7,8,9,13,15,17,18,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 7)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,6,7,9,10,11,12,16,19,21,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,6,7,9,10,11,12,16,19,21,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 8) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,8,9,11,14,16,17,20,22,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,8,9,11,14,16,17,20,22,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==9) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,6,9,10,11,18,19,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,6,9,10,11,18,19,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 10)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,5,7,9,10,18,19,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,5,7,9,10,18,19,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 11) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,4,5,7,8,9,11,17,20,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,4,5,7,8,9,11,17,20,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==12) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,7,14,16,21,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,7,14,16,21,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }

                }
                elseif($us->star == 13)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,4,6,13,15,16,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,4,6,13,15,16,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 14) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,3,5,8,12,13,14,15,17,18,21,23,24,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,3,5,8,12,13,14,15,17,18,21,23,24,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==15) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,4,6,13,14,15,16,17,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,4,6,13,14,15,16,17,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 16)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,3,7,8,11,12,13,17,18,20,21,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::with('caste')
                        ->whereNotIn('star',array(2,3,7,8,11,12,13,17,18,20,21,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 17) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,6,8,11,16,19,20,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,6,8,11,16,19,20,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==18) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,6,9,10,14,16,18,19,20,23,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,6,9,10,14,16,18,19,20,23,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 19)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,7,9,10,17,18,19,21,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,7,9,10,17,18,19,21,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==20) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,3,8,11,17,20,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,3,8,11,17,20,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 21)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,7,12,14,16,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,7,12,14,16,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 22) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,4,6,8,13,15,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,4,6,8,13,15,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==23) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,2,3,8,9,11,13,14,15,17,18,21,23,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,2,3,8,9,11,13,14,15,17,18,21,23,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 24)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,4,6,13,14,15,22,23,24,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,4,6,13,14,15,22,23,24,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 25) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,2,3,7,8,12,13,15,16,17,18,21,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,2,3,7,8,12,13,15,16,17,18,21,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==26) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,4,8,11,14,19,20,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,4,8,11,14,19,20,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 27)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,9,10,14,16,18,19,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,9,10,14,16,18,19,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
            }
            elseif ($request['caste']) 
            {
                // dd($items_checked);
                if ($us->star == 1) 
                {
                    if (!empty($items_checked)) 
                    {   
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,6,9,10,13,15,18,19,23,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);   
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,6,9,10,13,15,18,19,23,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 2) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,6,8,11,16,17,20,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,6,8,11,16,17,20,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==3) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(5,7,12,14,20,21,22,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(5,7,12,14,20,21,22,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 4)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(4,10,11,13,15,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                         $user = User::whereNotIn('star',array(4,10,11,13,15,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 5) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(5,10,11,14,23))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(5,10,11,14,23))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==6) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(4,6,7,8,9,13,15,17,18,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(4,6,7,8,9,13,15,17,18,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 7)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,6,7,9,10,11,12,16,19,21,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,6,7,9,10,11,12,16,19,21,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 8) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,8,9,11,14,16,17,20,22,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,8,9,11,14,16,17,20,22,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==9) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,6,9,10,11,18,19,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,6,9,10,11,18,19,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 10)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,5,7,9,10,18,19,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,5,7,9,10,18,19,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 11) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,4,5,7,8,9,11,17,20,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,4,5,7,8,9,11,17,20,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==12) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,7,14,16,21,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,7,14,16,21,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }

                }
                elseif($us->star == 13)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,4,6,13,15,16,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,4,6,13,15,16,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 14) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,3,5,8,12,13,14,15,17,18,21,23,24,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,3,5,8,12,13,14,15,17,18,21,23,24,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==15) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,4,6,13,14,15,16,17,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,4,6,13,14,15,16,17,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 16)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,3,7,8,11,12,13,17,18,20,21,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::with('caste')
                        ->whereNotIn('star',array(2,3,7,8,11,12,13,17,18,20,21,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 17) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,6,8,11,16,19,20,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,6,8,11,16,19,20,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==18) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,6,9,10,14,16,18,19,20,23,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,6,9,10,14,16,18,19,20,23,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 19)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,7,9,10,17,18,19,21,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,7,9,10,17,18,19,21,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==20) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,3,8,11,17,20,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,3,8,11,17,20,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 21)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,7,12,14,16,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,7,12,14,16,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 22) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,4,6,8,13,15,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,4,6,8,13,15,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==23) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,2,3,8,9,11,13,14,15,17,18,21,23,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,2,3,8,9,11,13,14,15,17,18,21,23,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 24)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,4,6,13,14,15,22,23,24,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,4,6,13,14,15,22,23,24,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 25) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,2,3,7,8,12,13,15,16,17,18,21,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,2,3,7,8,12,13,15,16,17,18,21,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==26) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,4,8,11,14,19,20,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,4,8,11,14,19,20,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 27)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,9,10,14,16,18,19,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,9,10,14,16,18,19,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','2')
                        ->paginate(5);
                    }
                }
            }

            else
            {
                return view('search.searchform',compact('graduate','caste','professional'));
            }         
        }
        #female
        else
        {
            if ($request['caste'] == 'all') 
            {
                if ($us->star == 1) 
                {
                    if (!empty($items_checked)) 
                    {   
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,9,10,13,15,18,19,23,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);   
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,9,10,13,15,18,19,23,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 2) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,8,11,14,16,20,23,24,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,8,11,14,16,20,23,24,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==3) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,7,12,14,16,17,20,21,22,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,7,12,14,16,17,20,21,22,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 4)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(4,6,11,13,15,22,24,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                         $user = User::whereNotIn('star',array(4,6,11,13,15,22,24,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 5) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,5,10,11,14,23))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,5,10,11,14,23))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==6) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,2,4,6,7,9,13,15,17,18,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,2,4,6,7,9,13,15,17,18,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 7)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,6,7,10,11,12,16,19,21,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,6,7,10,11,12,16,19,21,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 8) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,6,8,11,14,16,17,20,22,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,6,8,11,14,16,17,20,22,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==9) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,6,7,8,9,10,11,18,19,23,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,6,7,8,9,10,11,18,19,23,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 10)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,4,5,7,9,10,18,19,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,4,5,7,9,10,18,19,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 11) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,4,5,7,8,9,11,16,17,20,23,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,4,5,7,8,9,11,16,17,20,23,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==12) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,7,14,16,21,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,7,14,16,21,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }

                }
                elseif($us->star == 13)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,4,6,13,14,15,16,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,4,6,13,14,15,16,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 14) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,5,8,12,14,15,18,21,23,24,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,5,8,12,14,15,18,21,23,24,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==15) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,4,6,13,14,15,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,4,6,13,14,15,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 16)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,3,7,8,12,13,15,17,18,21,24,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::with('caste')
                        ->whereNotIn('star',array(2,3,7,8,12,13,15,17,18,21,24,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 17) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,6,8,11,14,15,16,19,20,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,6,8,11,14,15,16,19,20,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==18) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,6,9,10,14,16,18,19,23,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,6,9,10,14,16,18,19,23,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 19)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,7,9,10,17,18,19,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,7,9,10,17,18,19,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==20) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,3,8,11,16,17,18,20,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,3,8,11,16,17,18,20,26))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 21)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,7,12,14,16,19,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,7,12,14,16,19,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 22) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,4,6,8,13,15,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,4,6,8,13,15,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==23) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,2,3,5,8,12,13,14,15,17,18,23,24,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,2,3,5,8,12,13,14,15,17,18,23,24,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 24)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(4,6,13,14,15,16,21,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(4,6,13,14,15,16,21,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 25) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,3,7,8,12,13,15,16,17,18,21,23,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,3,7,8,12,13,15,16,17,18,21,23,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==26) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,8,9,11,14,16,17,20,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,8,9,11,14,16,17,20,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 27)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,10,14,16,18,19,23,25,))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,10,14,16,18,19,23,25,))
                        ->where('mobile_verified','=','1')
                        ->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
            }
            elseif ($request['caste']) 
            {
                if ($us->star == 1) 
                {
                    if (!empty($items_checked)) 
                    {   
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,9,10,13,15,18,19,23,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);   
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,9,10,13,15,18,19,23,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 2) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,8,11,14,16,20,23,24,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,8,11,14,16,20,23,24,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==3) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,7,12,14,16,17,20,21,22,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,7,12,14,16,17,20,21,22,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 4)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(4,6,11,13,15,22,24,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                         $user = User::whereNotIn('star',array(4,6,11,13,15,22,24,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 5) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,5,10,11,14,23))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,5,10,11,14,23))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==6) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,2,4,6,7,9,13,15,17,18,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,2,4,6,7,9,13,15,17,18,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 7)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,6,7,10,11,12,16,19,21,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,6,7,10,11,12,16,19,21,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 8) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,6,8,11,14,16,17,20,22,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,6,8,11,14,16,17,20,22,23,25,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==9) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,6,7,8,9,10,11,18,19,23,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,6,7,8,9,10,11,18,19,23,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 10)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,4,5,7,9,10,18,19,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,4,5,7,9,10,18,19,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 11) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,4,5,7,8,9,11,16,17,20,23,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,4,5,7,8,9,11,16,17,20,23,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==12) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,7,14,16,21,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,7,14,16,21,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }

                }
                elseif($us->star == 13)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,4,6,13,14,15,16,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,4,6,13,14,15,16,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 14) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,5,8,12,14,15,18,21,23,24,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,5,8,12,14,15,18,21,23,24,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==15) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,4,6,13,14,15,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,4,6,13,14,15,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 16)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,3,7,8,12,13,15,17,18,21,24,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::with('caste')
                        ->whereNotIn('star',array(2,3,7,8,12,13,15,17,18,21,24,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 17) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,6,8,11,14,15,16,19,20,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,6,8,11,14,15,16,19,20,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==18) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,6,9,10,14,16,18,19,23,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,6,9,10,14,16,18,19,23,25,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 19)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,7,9,10,17,18,19,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,7,9,10,17,18,19,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==20) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,3,8,11,16,17,18,20,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,3,8,11,16,17,18,20,26))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 21)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,7,12,14,16,19,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,7,12,14,16,19,23,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 22) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(3,4,6,8,13,15,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(3,4,6,8,13,15,22,24))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==23) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,2,3,5,8,12,13,14,15,17,18,23,24,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,2,3,5,8,12,13,14,15,17,18,23,24,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 24)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(4,6,13,14,15,16,21,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(4,6,13,14,15,16,21,22,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star == 25) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,3,7,8,12,13,15,16,17,18,21,23,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,3,7,8,12,13,15,16,17,18,21,23,24,25,26,27))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif ($us->star ==26) 
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(2,8,9,11,14,16,17,20,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(2,8,9,11,14,16,17,20,23,24,25))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
                elseif($us->star == 27)
                {
                    if (!empty($items_checked)) 
                    { 
                        $user = User::when($request->has('graduate'), function($query) use ($request)
                        {
                            return $query->whereIn('graduate',$request->graduate);
                        })
                        ->whereNotIn('star',array(1,10,14,16,18,19,23,25,))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                    else
                    {
                        $user = User::whereNotIn('star',array(1,10,14,16,18,19,23,25,))
                        ->where('mobile_verified','=','1')
                        ->where('caste','=',$request['caste'])->where('active','=','1')->where('payment_completed','=','1')
                        ->whereBetween('age',[$minage,$maxage])
                        ->where('gender','=','1')
                        ->paginate(5);
                    }
                }
            }

            else
            {
                return view('search.searchform',compact('graduate','caste','professional'));
            }
        }
        return view('search.show',compact('user','caste'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $currentUser = \Auth::user();
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
        $interestedid = interestedprofile::where('user_id','=',$currentUser->id)->where('isDeleted','=','no')->where('interesteduserid','=',$user->id)->get();
        // dd($interestedid);
        return view('search.view',compact('dosatype','dosham','horoscope','interestedid','user','caste','subcaste','moonsign','star','mother_tongue','professional','graduate'));
    }
    #Interested profile store
    public function create(User $user)
    {
        // dd($user);
        $Authuser = \Auth::user();
        $exiest = interestedprofile::where('user_id','=',$Authuser->id)->where('interesteduserid','=',$user->id)->first();
        $data = new interestedprofile;
        $data['user_id'] = $Authuser->id;
        $data['interesteduserid'] = $user->id;
        $data['isDeleted'] = 'no';
        $data->save();
        session::flash('message','Profile added successfully');
        return Redirect::back();
    }

    public function profilePhoto(User $user)
    {
        return view('interested.profilephoto',compact('user'));
    }
}