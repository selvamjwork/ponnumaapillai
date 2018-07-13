<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Session;
use Hash;
use DB;
use Validator;
use App\Subadmin;

class ManageSubAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:subadmins',
            'mobile' => 'required|unique:subadmins|min:10',
            'password' => 'required|min:6',
        ]);
    }

    public function index()
    {
        $managesubadmin = Subadmin::paginate(5);
        $casteid = DB::table('caste')->get(); 
        $subadmins = DB::table('subadmins')->get(); 
        return view('admin.manage-subadmin.index', compact('managesubadmin','casteid','subadmins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $casteid = DB::table('caste')->get(); 
        $subadmins = DB::table('subadmins')->get();
        return view('admin.manage-subadmin.create', compact('casteid','subadmins'));
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
        // dd($request);
        $requestData = $request->all();
        $this->validator($request->all())->validate();
        $requestData['password'] = Hash::make($requestData['password']);
        Subadmin::create($requestData);
        Session::flash('success', 'Subadmin added!');
        return redirect('admin/manage-subadmin');
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
         $managesubadmin = Subadmin::findOrFail($id);
         $casteid = DB::table('caste')->get(); 
        $subadmins = DB::table('subadmins')->get();
        return view('admin.manage-subadmin.show', compact('managesubadmin','casteid','subadmins'));
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
        $managesubadmin = Subadmin::findOrFail($id);
         $casteid = DB::table('caste')->get(); 
        $subadmins = DB::table('subadmins')->get();
        $managesubadmin->password =  '';
        return view('admin.manage-subadmin.edit', compact('managesubadmin','casteid','subadmins'));
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
        $managesubadmin = Subadmin::findOrFail($id);
        if (!empty($requestData['password'])) {
            $requestData['password'] = Hash::make($requestData['password']);
        }else{
            
            $requestData['password'] = $managesubadmin->password;
        }
        $managesubadmin->update($requestData);
        Session::flash('success', 'Subadmin updated!');
        return redirect('admin/manage-subadmin');
    }

    public function activate(Subadmin $subadmin)
    {
        if ($subadmin->is_activated == 'yes') {
            Session::flash('message', 'Already Activated');
        }else{
            $subadmin->is_activated = 'yes';
            $subadmin->update();
            Session::flash('success', 'Deactivated');
        }
        return back();
    }

    public function destroy($id)
    {
        $managesubadmin = Subadmin::findOrFail($id);
        // dd($managesubadmin);
            $managesubadmin->is_activated = 'no';
        
        if ($managesubadmin->role=='admin') 
        {
            $managesubadmin->update();
            Session::flash('success', 'SuccessFully Deactivated');
        }
        else
        {
            $managesubadmin->update();
            Session::flash('success', 'SuccessFully Deactivated');
        }
        return redirect('admin/manage-subadmin');
    }
}
