<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use Hash;
use Validator;
use App\Http\Requests;
use App\rasipalan;
use App\natchathiram;
use App\mothers_tongue;
use App\caste;
use App\subcaste;
use Carbon;
use DB;
use App\day;
use App\month;
use App\year;
use App\hour;
use App\minute;
use App\second;
use App\qualification;
use App\graduate;
use App\professional;
use App\UserRole;

class ManageUserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = User::paginate(20);
        $casteid = DB::table('caste')->get(); 
        $subadmins = DB::table('subadmins')->get(); 
        return view('admin.manage-user.index', compact('user','casteid','subadmins'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        #caste dropdown
        $caste = caste::orderBy('caste_name','ASC')->get();
        $casteArray = array();
        foreach ($caste as $value) {
            $casteArray[$value['id']] =ucfirst($value['caste_name']);
        }

        #subcaste dropdown
        $subsect = subcaste::orderBy('subcaste_name','ASC')->get();
        $subsectArray = array();
        foreach ($subsect as $value) {
            $subsectArray[$value['id']] =ucfirst($value['subcaste_name']);
        }

        #graduate dropdown
        $graduate = graduate::orderBy('id','dec')->get();
        $graduateArray = array();
        foreach ($graduate as $value) {
            $graduateArray[$value['id']] =ucfirst($value['graduate_name']);
        }

        #professional dropdown
        $professional = professional::orderBy('professional_name','ASC')->get();
        $professionalArray = array();
        foreach ($professional as $value) {
            $professionalArray[$value['id']] =ucfirst($value['professional_name']);
        }

        #rasi dropdown
        $rasipalan = rasipalan::orderBy('id','ASC')->get();
        $rasipalanArray = array();
        foreach ($rasipalan as $value) {
            $rasipalanArray[$value['id']] =ucfirst($value['rasi_name']);
        }

        #star dropdown
        $star = natchathiram::orderBy('id','ASC')->get();
        $starArray = array();
        foreach ($star as $value) {
            $starArray[$value['id']] =ucfirst($value['star_name']);
        }

        #mother Tongue dropdown
        $mothers_tongue = mothers_tongue::orderBy('id','ASC')->get();
        $mothers_tongueArray = array();
        foreach ($mothers_tongue as $value) {
            $mothers_tongueArray[$value['id']] =ucfirst($value['language_name']);
        }

        #day dropdown
        $day = day::orderBy('id','ASC')->get();
        $dayArray = array();
        foreach ($day as $value) {
            $dayArray[$value['id']] =ucfirst($value['day_name']);
        }
        
        #month dropdown
        $month = month::orderBy('id','ASC')->get();
        $monthArray = array();
        foreach ($month as $value) {
            $monthArray[$value['id']] =ucfirst($value['month_name']);
        }

        #year dropdown
        $year = year::orderBy('year_id','ASC')->get();
        $yearArray = array();
        foreach ($year as $value) {
            $yearArray[$value['year_id']] =ucfirst($value['year_name']);
        }

        #hour dropdown
        $hour = hour::orderBy('id','ASC')->get();
        $hourArray = array();
        foreach ($hour as $value) {
            $hourArray[$value['id']] =ucfirst($value['hour']);
        }

        #minute dropdown
        $minute = minute::orderBy('id','ASC')->get();
        $minuteArray = array();
        foreach ($minute as $value) {
            $minuteArray[$value['id']] =ucfirst($value['minute_name']);
        }

        #second dropdown
        $second = second::orderBy('id','ASC')->get();
        $secondArray = array();
        foreach ($second as $value) {
            $secondArray[$value['id']] =ucfirst($value['second_name']);
        }

        #qualification dropdown
        $qualification = qualification::orderBy('id','ASC')->get();
        $qualificationArray = array();
        foreach ($qualification as $value) {
            $qualificationArray[$value['id']] =ucfirst($value['qualification_name']);
        }
        $casteid = DB::table('caste')->get(); 
        $subadmins = DB::table('subadmins')->get();
        return view('admin.manage-user.create',compact(['casteArray','casteid','subadmins','subsectArray','rasipalanArray','starArray','mothers_tongueArray','dayArray','monthArray','yearArray','hourArray','minuteArray','secondArray','qualificationArray','graduateArray','professionalArray']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'fathers_name' => 'required|max:255',
            // 'fathers_occupation' => 'required|max:255',
            'mothers_name' => 'required|max:255',
            // 'mothers_occupation' => 'required|max:255',
            'gender' => 'required|max:255',
            'noofbrothers' => 'required|max:255',
            'noofbrothersstatus' => 'required|max:255',
            'noofsisters' => 'required|max:255',
            'noofsistersstatus' => 'required|max:255',
            'month' => 'required|max:255',
            'day' => 'required|max:255',
            'year' => 'required|max:255',
            'hour' => 'required|max:255',
            'minutes' => 'required|max:255',
            'seconds' => 'required|max:255',
            'session' => 'required|max:255',
            // 'height' => 'required|max:255',
            // 'weight' => 'required|max:255',
            'graduate' => 'required|max:255',
            'qualification' => 'required|max:255',
            // 'annual_income' => 'required|max:255',
            'professional' => 'required|max:255',
            'mother_tongue' => 'required|max:255',
            'religion' => 'required|max:255',
            'caste' => 'required|max:255',
            'subsect' => 'required|max:255',
            // 'gothram' => 'required|max:255',
            'moonsign' => 'required|max:255',
            'star' => 'required|max:255',
            'pob' => 'required|max:255',
            'mobile' => 'required|max:10|unique:users',
            'email' => 'email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $admin = \Auth::user()->id; 
        $requestData = $request->all();
        $this->validator($request->all())->validate();
        $requestData['password'] = Hash::make($requestData['password']);
        $from = $requestData['year'];
        $to = date('Y');
        $requestData['age'] = $to-$from;
        // dd($requestData['age']);
        $usercreate = User::create($requestData);
        $userid_generete = 'PM000'  .$usercreate->id ;
        $usercreate->user_id = $userid_generete;
        $usercreate->save();
        $userRole = UserRole::create(['user_id'=>$usercreate->id,'role'=>'user']);
        Session::flash('success', 'User added!');

        return redirect('admin/manage-user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
         $user = User::findOrFail($id);
        $casteid = DB::table('caste')->get(); 
        $subadmins = DB::table('subadmins')->get();
        return view('admin.manage-user.show', compact('user','casteid','subadmins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        #caste dropdown
        $caste = caste::orderBy('caste_name','ASC')->get();
        $casteArray = array();
        foreach ($caste as $value) {
            $casteArray[$value['id']] =ucfirst($value['caste_name']);
        }

        #graduate dropdown
        $graduate = graduate::orderBy('id','dec')->get();
        $graduateArray = array();
        foreach ($graduate as $value) {
            $graduateArray[$value['id']] =ucfirst($value['graduate_name']);
        }

        #professional dropdown
        $professional = professional::orderBy('professional_name','ASC')->get();
        $professionalArray = array();
        foreach ($professional as $value) {
            $professionalArray[$value['id']] =ucfirst($value['professional_name']);
        }

        #rasi dropdown
        $rasipalan = rasipalan::orderBy('id','ASC')->get();
        $rasipalanArray = array();
        foreach ($rasipalan as $value) {
            $rasipalanArray[$value['id']] =ucfirst($value['rasi_name']);
        }

        #star dropdown
        $star = natchathiram::orderBy('id','ASC')->get();
        $starArray = array();
        foreach ($star as $value) {
            $starArray[$value['id']] =ucfirst($value['star_name']);
        }

        #mother Tongue dropdown
        $mothers_tongue = mothers_tongue::orderBy('id','ASC')->get();
        $mothers_tongueArray = array();
        foreach ($mothers_tongue as $value) {
            $mothers_tongueArray[$value['id']] =ucfirst($value['language_name']);
        }

        #day dropdown
        $day = day::orderBy('id','ASC')->get();
        $dayArray = array();
        foreach ($day as $value) {
            $dayArray[$value['id']] =ucfirst($value['day_name']);
        }
        
        #month dropdown
        $month = month::orderBy('id','ASC')->get();
        $monthArray = array();
        foreach ($month as $value) {
            $monthArray[$value['id']] =ucfirst($value['month_name']);
        }

        #year dropdown
        $year = year::orderBy('year_id','ASC')->get();
        $yearArray = array();
        foreach ($year as $value) {
            $yearArray[$value['year_id']] =ucfirst($value['year_name']);
        }

        #hour dropdown
        $hour = hour::orderBy('id','ASC')->get();
        $hourArray = array();
        foreach ($hour as $value) {
            $hourArray[$value['id']] =ucfirst($value['hour']);
        }

        #minute dropdown
        $minute = minute::orderBy('id','ASC')->get();
        $minuteArray = array();
        foreach ($minute as $value) {
            $minuteArray[$value['id']] =ucfirst($value['minute_name']);
        }

        #second dropdown
        $second = second::orderBy('id','ASC')->get();
        $secondArray = array();
        foreach ($second as $value) {
            $secondArray[$value['id']] =ucfirst($value['second_name']);
        }

        #qualification dropdown
        $qualification = qualification::orderBy('id','ASC')->get();
        $qualificationArray = array();
        foreach ($qualification as $value) {
            $qualificationArray[$value['id']] =ucfirst($value['qualification_name']);
        }
        $casteid = DB::table('caste')->get(); 
        $subadmins = DB::table('subadmins')->get();
        $user->password =  '';
        return view('admin.manage-user.edit', compact('user','casteArray','rasipalanArray','casteid','subadmins','starArray','mothers_tongueArray','dayArray','monthArray','yearArray','hourArray','minuteArray','secondArray','qualificationArray','graduateArray','professionalArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        var_dump($requestData);
        $user = User::findOrFail($id);
        if (!empty($requestData['password'])) {
            
            $requestData['password'] = Hash::make($requestData['password']);
        }else{
            
            $requestData['password'] = $user->password;
        }
        $from = $requestData['year'];
        $to = date('Y');
        $requestData['age'] = $to-$from;
        // dd($requestData['age']);
        $user->update($requestData);

        Session::flash('success', 'User updated!');

        return redirect('admin/manage-user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
            $user->active = '0';
        
        if ($user->role=='admin') {
           
            $user->update();
            Session::flash('success', 'SuccessFully Deactivated');
        }else{
            $user->update();
            Session::flash('success', 'SuccessFully Deactivated');
        }

        return redirect('admin/manage-user');
    }

    public function activate(User $user)
    {
        if ($user->active == '1') {
            Session::flash('message', 'Already Activated');
        }else{
            $user->active = '1';
            $user->update();
            Session::flash('success', 'Deactivated');
        }
        return back();
    }
}
