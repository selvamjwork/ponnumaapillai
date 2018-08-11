<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\caste;
use App\subcaste;
use Session;
use Validator;

class SubCasteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'subcaste_name' => 'required|max:255',
            'caste_id' => 'required|max:255',
        ]);
    }

    public function index()
    {
    	$caste = caste::orderBy('id','ASC')->get()->toArray();
        foreach ($caste as $Value) {
            $casteArray[$Value['id']] = ucfirst($Value['caste_name']);
        }
    	$subcaste = subcaste::with(['caste'])->paginate(5);
    	return view ('admin.manage-sub-caste.index',compact('subcaste','casteArray'));
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
        $requestData = $request->all();
        $this->validator($request->all())->validate();
        SubCaste::create($requestData);
        Session::flash('success', 'Sub Caste Added Successfully Done !!!');
        return redirect('admin/sub-caste');
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
    	$caste = caste::orderBy('id','ASC')->get()->toArray();
        foreach ($caste as $Value) {
            $casteArray[$Value['id']] = ucfirst($Value['caste_name']);
        }
        $subcaste = SubCaste::findOrFail($id);
        return view('admin.manage-sub-caste.edit', compact('subcaste','casteArray'));
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
        $subcaste = SubCaste::findOrFail($id);
        $subcaste->update($requestData);
        Session::flash('success', 'Sub Caste Update Successfully Done !!!');
        return redirect('admin/sub-caste');
    }

    public function destroy($id)
    {
        $subcaste = SubCaste::findOrFail($id);
        $subcaste->delete();
        Session::flash('success', 'Sub Caste Deleted Successfully Done !!!');        
        return redirect('admin/sub-caste');
    }
}
