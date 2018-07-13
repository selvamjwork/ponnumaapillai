<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Requests;
use App\caste;
use App\subcaste;
use DB;
use App\graduate;
use App\professional;
use App\natchathiram;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class AdminProfileSearchController extends Controller
{
    public function index(Request $request)
    {
        #graduate dropdown
        $graduate = graduate::orderBy('graduate_name','ASC')->get();

        #professional dropdown
        $professional = professional::orderBy('professional_name','ASC')->get();

        #star dropdown
        $star = natchathiram::orderBy('id','ASC')->get();
        $starArray = array();
        foreach ($star as $value) {
            $starArray[$value['id']] =ucfirst($value['star_name']);
        }

        #caste dropdown
        $caste = caste::orderBy('caste_name','ASC')->get();
        $minage= $request['ageform'];
        $maxage= $request['ageto'];
        

        if ($request->gender == 1) 
        {
            if ($request['graduate'] == 'all') 
            {
                if ($request['professional'] == 'all') 
                {
                    if($request['caste']){
                        if ($request->star == 1) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,9,10,13,15,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 2) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,11,14,16,20,23,24,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                            // dd($user);
                        }
                        elseif ($request->star ==3) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,17,20,21,22,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif($request->star == 4)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,11,13,15,22,24,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 5) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,10,11,14,23))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==6) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,4,6,7,9,13,15,17,18,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 7)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,6,7,10,11,12,16,19,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 8) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,16,17,20,22,23,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==9) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,7,8,9,10,11,18,19,23,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 10)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,5,7,9,10,18,19,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 11) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,4,5,7,8,9,11,16,17,20,23,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==12) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,14,16,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 13)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,16,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 14) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,8,12,14,15,18,21,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==15) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 16)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,17,18,21,24,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 17) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,15,16,19,20,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==18) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,9,10,14,16,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 19)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,7,9,10,17,18,19,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==20) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,8,11,16,17,18,20,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 21)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,19,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 22) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,4,6,8,13,15,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==23) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,3,5,8,12,13,14,15,17,18,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 24)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,13,14,15,16,21,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 25) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,16,17,18,21,23,24,25,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==26) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,9,11,14,16,17,20,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 27)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,10,14,16,18,19,23,25,))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }

                    }
                }
                elseif ($request['professional']) 
                {
                    if ($request['caste']) 
                    {
                        if ($request->star == 1) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,9,10,13,15,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 2) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,11,14,16,20,23,24,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==3) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,17,20,21,22,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 4)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,11,13,15,22,24,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 5) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,10,11,14,23))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==6) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,4,6,7,9,13,15,17,18,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 7)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,6,7,10,11,12,16,19,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 8) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,16,17,20,22,23,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==9) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,7,8,9,10,11,18,19,23,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 10)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,5,7,9,10,18,19,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 11) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,4,5,7,8,9,11,16,17,20,23,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==12) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,14,16,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 13)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,16,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 14) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,8,12,14,15,18,21,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==15) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 16)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,17,18,21,24,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 17) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,15,16,19,20,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==18) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,9,10,14,16,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 19)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,7,9,10,17,18,19,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==20) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,8,11,16,17,18,20,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 21)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,19,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 22) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,4,6,8,13,15,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==23) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,3,5,8,12,13,14,15,17,18,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 24)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,13,14,15,16,21,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 25) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,16,17,18,21,23,24,25,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==26) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,9,11,14,16,17,20,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 27)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,10,14,16,18,19,23,25,))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                    }
                }
            }
            elseif ($request['graduate']) 
            {
                if ($request['professional'] =='all') 
                {
                    if ($request['caste']) {
                        if ($request->star == 1) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,9,10,13,15,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 2) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,11,14,16,20,23,24,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                            dd($user);
                        }
                        elseif ($request->star ==3) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,17,20,21,22,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 4)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,11,13,15,22,24,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 5) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,10,11,14,23))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==6) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,4,6,7,9,13,15,17,18,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 7)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,6,7,10,11,12,16,19,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 8) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,16,17,20,22,23,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==9) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,7,8,9,10,11,18,19,23,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 10)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,5,7,9,10,18,19,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 11) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,4,5,7,8,9,11,16,17,20,23,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==12) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,14,16,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 13)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,16,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 14) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,8,12,14,15,18,21,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==15) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 16)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,17,18,21,24,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 17) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,15,16,19,20,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==18) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,9,10,14,16,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 19)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,7,9,10,17,18,19,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==20) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,8,11,16,17,18,20,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 21)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,19,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 22) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,4,6,8,13,15,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==23) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,3,5,8,12,13,14,15,17,18,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 24)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,13,14,15,16,21,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 25) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,16,17,18,21,23,24,25,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==26) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,9,11,14,16,17,20,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 27)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,10,14,16,18,19,23,25,))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                    }
                }
                elseif ($request['professional']) 
                {
                    if ($request['caste']) 
                    {
                        if ($request->star == 1) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,9,10,13,15,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 2) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,11,14,16,20,23,24,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                            dd($user);
                        }
                        elseif ($request->star ==3) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,17,20,21,22,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 4)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,11,13,15,22,24,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 5) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,10,11,14,23))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==6) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,4,6,7,9,13,15,17,18,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 7)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,6,7,10,11,12,16,19,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 8) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,16,17,20,22,23,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==9) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,7,8,9,10,11,18,19,23,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 10)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,5,7,9,10,18,19,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 11) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,4,5,7,8,9,11,16,17,20,23,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==12) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,14,16,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 13)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,16,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 14) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,8,12,14,15,18,21,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==15) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 16)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,17,18,21,24,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 17) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,15,16,19,20,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==18) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,9,10,14,16,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 19)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,7,9,10,17,18,19,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==20) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,8,11,16,17,18,20,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 21)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,19,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 22) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,4,6,8,13,15,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==23) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,3,5,8,12,13,14,15,17,18,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 24)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,13,14,15,16,21,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 25) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,16,17,18,21,23,24,25,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star ==26) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,9,11,14,16,17,20,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                        elseif ($request->star == 27)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,10,14,16,18,19,23,25,))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','2')
                            ->paginate(5);
                        }
                    }
                }
            }
            else
            {
                $casteid = DB::table('caste')->get(); 
                $subadmins = DB::table('subadmins')->get(); 
                return view('admin.search.searchform',compact('graduate','caste','professional','starArray','casteid','subadmins'));
            }             
        }
        #female
        else
        {
            if ($request['graduate'] == 'all') 
            {
                if ($request['professional'] == 'all') 
                {
                    if($request['caste']){
                        if ($request->star == 1) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,9,10,13,15,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 2) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,11,14,16,20,23,24,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                            // dd($user);
                        }
                        elseif ($request->star ==3) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,17,20,21,22,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 4)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,11,13,15,22,24,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 5) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,10,11,14,23))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==6) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,4,6,7,9,13,15,17,18,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 7)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,6,7,10,11,12,16,19,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 8) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,16,17,20,22,23,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==9) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,7,8,9,10,11,18,19,23,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 10)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,5,7,9,10,18,19,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 11) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,4,5,7,8,9,11,16,17,20,23,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==12) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,14,16,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 13)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,16,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 14) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,8,12,14,15,18,21,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==15) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 16)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,17,18,21,24,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 17) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,15,16,19,20,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==18) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,9,10,14,16,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 19)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,7,9,10,17,18,19,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==20) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,8,11,16,17,18,20,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 21)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,19,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 22) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,4,6,8,13,15,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==23) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,3,5,8,12,13,14,15,17,18,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 24)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,13,14,15,16,21,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 25) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,16,17,18,21,23,24,25,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==26) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,9,11,14,16,17,20,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 27)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,10,14,16,18,19,23,25,))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }

                    }
                }
                elseif ($request['professional']) 
                {
                    if ($request['caste']) 
                    {
                        if ($request->star == 1) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,9,10,13,15,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 2) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,11,14,16,20,23,24,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==3) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,17,20,21,22,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 4)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,11,13,15,22,24,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 5) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,10,11,14,23))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==6) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,4,6,7,9,13,15,17,18,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 7)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,6,7,10,11,12,16,19,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 8) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,16,17,20,22,23,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==9) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,7,8,9,10,11,18,19,23,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 10)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,5,7,9,10,18,19,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 11) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,4,5,7,8,9,11,16,17,20,23,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==12) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,14,16,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 13)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,16,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 14) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,8,12,14,15,18,21,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==15) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 16)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,17,18,21,24,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 17) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,15,16,19,20,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==18) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,9,10,14,16,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 19)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,7,9,10,17,18,19,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==20) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,8,11,16,17,18,20,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 21)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,19,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 22) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,4,6,8,13,15,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==23) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,3,5,8,12,13,14,15,17,18,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 24)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,13,14,15,16,21,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 25) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,16,17,18,21,23,24,25,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==26) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,9,11,14,16,17,20,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 27)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,10,14,16,18,19,23,25,))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                    }
                }
            }
            elseif ($request['graduate']) 
            {
                if ($request['professional'] =='all') 
                {
                    if ($request['caste']) {
                        if ($request->star == 1) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,9,10,13,15,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 2) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,11,14,16,20,23,24,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                            dd($user);
                        }
                        elseif ($request->star ==3) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,17,20,21,22,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 4)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,11,13,15,22,24,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 5) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,10,11,14,23))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==6) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,4,6,7,9,13,15,17,18,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 7)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,6,7,10,11,12,16,19,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 8) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,16,17,20,22,23,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==9) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,7,8,9,10,11,18,19,23,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 10)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,5,7,9,10,18,19,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 11) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,4,5,7,8,9,11,16,17,20,23,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==12) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,14,16,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 13)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,16,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 14) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,8,12,14,15,18,21,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==15) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 16)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,17,18,21,24,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 17) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,15,16,19,20,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==18) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,9,10,14,16,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 19)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,7,9,10,17,18,19,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==20) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,8,11,16,17,18,20,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 21)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,19,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 22) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,4,6,8,13,15,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==23) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,3,5,8,12,13,14,15,17,18,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 24)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,13,14,15,16,21,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 25) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,16,17,18,21,23,24,25,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==26) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,9,11,14,16,17,20,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 27)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,10,14,16,18,19,23,25,))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                    }
                }
                elseif ($request['professional']) 
                {
                    if ($request['caste']) 
                    {
                        if ($request->star == 1) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,9,10,13,15,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 2) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,11,14,16,20,23,24,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                            dd($user);
                        }
                        elseif ($request->star ==3) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,17,20,21,22,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 4)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,11,13,15,22,24,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 5) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,10,11,14,23))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==6) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,4,6,7,9,13,15,17,18,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 7)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,6,7,10,11,12,16,19,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 8) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,16,17,20,22,23,25,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==9) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,7,8,9,10,11,18,19,23,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 10)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,5,7,9,10,18,19,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 11) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,4,5,7,8,9,11,16,17,20,23,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==12) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,14,16,21,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 13)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,16,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 14) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,5,8,12,14,15,18,21,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==15) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,4,6,13,14,15,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 16)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,17,18,21,24,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 17) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,6,8,11,14,15,16,19,20,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==18) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,6,9,10,14,16,18,19,23,25,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 19)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,7,9,10,17,18,19,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==20) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,8,11,16,17,18,20,26))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 21)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,7,12,14,16,19,23,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 22) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(3,4,6,8,13,15,22,24))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==23) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,2,3,5,8,12,13,14,15,17,18,23,24,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 24)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(4,6,13,14,15,16,21,22,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 25) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,3,7,8,12,13,15,16,17,18,21,23,24,25,26,27))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star ==26) {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(2,8,9,11,14,16,17,20,23,24,25))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                        elseif ($request->star == 27)
                        {
                            $user = User::with('caste')
                            ->whereNotIn('star',array(1,10,14,16,18,19,23,25,))
                            ->where('mobile_verified','=','1')
                            ->whereBetween('age',[$minage,$maxage])
                            ->where('caste','=',$request['caste'])
                            ->where('professional','=',$request['professional'])
                            ->where('graduate','=',$request['graduate'])
                            ->where('gender','=','1')
                            ->paginate(5);
                        }
                    }
                }
            }
            else
            {
                $casteid = DB::table('caste')->get(); 
        $subadmins = DB::table('subadmins')->get(); 
                return view('admin.search.searchform',compact('graduate','caste','professional','starArray','casteid','subadmins'));
            }
        }
        $casteid = DB::table('caste')->get(); 
        $subadmins = DB::table('subadmins')->get(); 
        return view('admin.search.show',compact('user','casteid','subadmins'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $casteid = DB::table('caste')->get(); 
        $subadmins = DB::table('subadmins')->get(); 
        return view('admin.search.view',compact('user','casteid','subadmins'));
    }
}
