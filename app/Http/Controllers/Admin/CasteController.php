<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\caste;
use Session;
use Validator;

class CasteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'caste_name' => 'required|max:255',
        ]);
    }

    public function index()
    {
    	$caste = caste::paginate(5);
    	return view ('admin.manage-caste.index',compact('caste'));
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
        caste::create($requestData);
        Session::flash('success', 'Caste Added Successfully Done !!!');
        return redirect('admin/caste');
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
        $caste = caste::findOrFail($id);
        return view('admin.manage-caste.edit', compact('caste'));
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
        $caste = caste::findOrFail($id);
        $caste->update($requestData);
        Session::flash('success', 'Caste Update Successfully Done !!!');
        return redirect('admin/caste');
    }

    public function destroy($id)
    {
        $caste = caste::findOrFail($id);
        $caste->delete();
        Session::flash('success', 'Caste Deleted Successfully Done !!!');        
        return redirect('admin/caste');
    }
}
