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
        $graduate = graduate::orderBy('graduate_name','ASC')->get();

        #professional dropdown
        $professional = professional::orderBy('professional_name','ASC')->get();

        #caste dropdown
        $caste = caste::orderBy('caste_name','ASC')->get();
        $minage= $request['ageform'];
        $maxage= $request['ageto'];
        $us = \Auth::user();
        if ($us->gender == 1)
        {
            if ($request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6) 
            {
                dd('all data');
            }
            elseif ($request['graduate'] == 1) {
                dd('1');
            }
            elseif ($request['graduate'] == 2) {
                dd('2');
            }
            elseif ($request['graduate'] == 3) {
                dd('3');
            }
            elseif ($request['graduate'] == 4) {
                dd('4');
            }
            elseif ($request['graduate'] == 5) {
                dd('5');
            }
            elseif ($request['graduate'] == 6) {
                dd('6');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('1,2');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 3) {
                dd('1,3');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 4) {
                dd('1,4');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 5) {
                dd('1,5');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 6) {
                dd('1,6');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 1) {
                dd('2,1');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('2,3');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 4) {
                dd('2,4');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 5) {
                dd('2,5');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 6) {
                dd('2,6');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 1) {
                dd('3,1');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 2) {
                dd('3,2');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('3,4');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 5) {
                dd('3,5');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 6) {
                dd('3,6');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 1) {
                dd('4,1');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 2) {
                dd('4,2');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 3) {
                dd('4,3');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('4,5');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 6) {
                dd('4,6');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 1) {
                dd('5,1');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 2) {
                dd('5,2');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 3) {
                dd('5,3');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 4) {
                dd('5,4');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('5,6');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 1) {
                dd('6,1');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 2) {
                dd('6,2');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 3) {
                dd('6.3');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 4) {
                dd('6,4');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 5) {
                dd('6,5');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('1,2,3');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('1,3,4');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('1,4,5');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('1,5,6');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 1 && $request['graduate'] == 3) {
                dd('2,1,3');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('2,3,4');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('2,4,5');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('2,5,6');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('3,1,2');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 2 && $request['graduate'] == 4) {
                dd('3,2,4');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('3,4,5');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('3,5,6');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('4,1,2');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('4,2,3');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 3 && $request['graduate'] == 5) {
                dd('4,3,5');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('4,5,6');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('5,1,2');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('5,2,3');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('5,3,4');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 4 && $request['graduate'] == 6) {
                dd('5,4,6');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('6,1,2');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('6,2,3');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('6,3,4');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('6,4,5');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('1,2,3,4');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('1,3,4,5');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('1,4,5,6');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('2,3,4,5');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('2,4,5,6');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 5 && $request['graduate'] == 6 && $request['graduate'] == 1) {
                dd('2,5,6,1');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('3,4,5,6');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 5 && $request['graduate'] == 6 && $request['graduate'] == 1) {
                dd('3,5,6,1');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 6 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('3,6,1,2');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('4,1,2,3');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 5) {
                dd('4,2,3,5');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 3 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('4,3,5,6');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('5,2,3,4');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 6) {
                dd('5,3,4,6');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 4 && $request['graduate'] == 6 && $request['graduate'] == 1) {
                dd('5,4,6,1');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('6,3,4,5');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 1) {
                dd('6,4,5,1');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 5 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('6,5,1,2');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('1,2,3,4,5');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('1,3,4,5,6');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('2,3,4,5,6');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6 && $request['graduate'] == 1) {
                dd('2,4,5,6,1');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6 && $request['graduate'] == 1) {
                dd('3,4,5,6,1');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 5 && $request['graduate'] == 6 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('3,5,6,1,2');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('4,5,6,1,2');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 6 && $request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('4,5,1,2,3');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 6 && $request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('5,6,1,2,3,');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('5,1,2,3,4');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('6,1,2,3,4');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('6,2,3,4,5');
            }
            else
            {
                return view('search.searchform',compact('graduate','caste','professional'));
            }          
        }
        #female
        else
        {
            if ($request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6) 
            {
                dd('all data');
            }
            elseif ($request['graduate'] == 1) {
                dd('1');
            }
            elseif ($request['graduate'] == 2) {
                dd('2');
            }
            elseif ($request['graduate'] == 3) {
                dd('3');
            }
            elseif ($request['graduate'] == 4) {
                dd('4');
            }
            elseif ($request['graduate'] == 5) {
                dd('5');
            }
            elseif ($request['graduate'] == 6) {
                dd('6');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('1,2');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 3) {
                dd('1,3');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 4) {
                dd('1,4');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 5) {
                dd('1,5');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 6) {
                dd('1,6');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 1) {
                dd('2,1');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('2,3');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 4) {
                dd('2,4');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 5) {
                dd('2,5');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 6) {
                dd('2,6');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 1) {
                dd('3,1');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 2) {
                dd('3,2');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('3,4');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 5) {
                dd('3,5');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 6) {
                dd('3,6');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 1) {
                dd('4,1');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 2) {
                dd('4,2');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 3) {
                dd('4,3');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('4,5');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 6) {
                dd('4,6');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 1) {
                dd('5,1');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 2) {
                dd('5,2');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 3) {
                dd('5,3');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 4) {
                dd('5,4');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('5,6');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 1) {
                dd('6,1');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 2) {
                dd('6,2');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 3) {
                dd('6.3');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 4) {
                dd('6,4');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 5) {
                dd('6,5');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('1,2,3');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('1,3,4');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('1,4,5');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('1,5,6');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 1 && $request['graduate'] == 3) {
                dd('2,1,3');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('2,3,4');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('2,4,5');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('2,5,6');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('3,1,2');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 2 && $request['graduate'] == 4) {
                dd('3,2,4');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('3,4,5');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('3,5,6');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('4,1,2');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('4,2,3');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 3 && $request['graduate'] == 5) {
                dd('4,3,5');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('4,5,6');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('5,1,2');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('5,2,3');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('5,3,4');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 4 && $request['graduate'] == 6) {
                dd('5,4,6');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('6,1,2');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('6,2,3');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('6,3,4');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('6,4,5');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('1,2,3,4');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('1,3,4,5');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('1,4,5,6');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('2,3,4,5');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('2,4,5,6');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 5 && $request['graduate'] == 6 && $request['graduate'] == 1) {
                dd('2,5,6,1');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('3,4,5,6');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 5 && $request['graduate'] == 6 && $request['graduate'] == 1) {
                dd('3,5,6,1');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 6 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('3,6,1,2');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('4,1,2,3');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 5) {
                dd('4,2,3,5');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 3 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('4,3,5,6');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('5,2,3,4');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 6) {
                dd('5,3,4,6');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 4 && $request['graduate'] == 6 && $request['graduate'] == 1) {
                dd('5,4,6,1');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('6,3,4,5');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 1) {
                dd('6,4,5,1');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 5 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('6,5,1,2');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('1,2,3,4,5');
            }
            elseif ($request['graduate'] == 1 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('1,3,4,5,6');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6) {
                dd('2,3,4,5,6');
            }
            elseif ($request['graduate'] == 2 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6 && $request['graduate'] == 1) {
                dd('2,4,5,6,1');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6 && $request['graduate'] == 1) {
                dd('3,4,5,6,1');
            }
            elseif ($request['graduate'] == 3 && $request['graduate'] == 5 && $request['graduate'] == 6 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('3,5,6,1,2');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 5 && $request['graduate'] == 6 && $request['graduate'] == 1 && $request['graduate'] == 2) {
                dd('4,5,6,1,2');
            }
            elseif ($request['graduate'] == 4 && $request['graduate'] == 6 && $request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('4,5,1,2,3');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 6 && $request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3) {
                dd('5,6,1,2,3,');
            }
            elseif ($request['graduate'] == 5 && $request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('5,1,2,3,4');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 1 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4) {
                dd('6,1,2,3,4');
            }
            elseif ($request['graduate'] == 6 && $request['graduate'] == 2 && $request['graduate'] == 3 && $request['graduate'] == 4 && $request['graduate'] == 5) {
                dd('6,2,3,4,5');
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
        $caste = caste::findOrFail($user->caste);
        $subcaste = subcaste::findOrFail($user->subsect);
        $moonsign = rasipalan::findOrFail($user->moonsign);
        $star = natchathiram::findOrFail($user->star);
        $mother_tongue = mothers_tongue::findOrFail($user->mother_tongue);
        $professional = professional::findOrFail($user->professional);
        $graduate = graduate::findOrFail($user->graduate);
        $interestedid = interestedprofile::where('user_id','=',$currentUser->id)->where('isDeleted','=','no')->where('interesteduserid','=',$user->id)->get();
        // dd($interestedid);
        return view('search.view',compact('interestedid','user','caste','subcaste','moonsign','star','mother_tongue','professional','graduate'));
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