<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contect;

class ContectUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contect = Contect::paginate(5);
        // dd($contect);
        return view('admin.contect_us.index',compact(['contect']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contect_us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'area' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);
        $contect_us = new Contect();
        $contect_us->area = $request->area;
        $contect_us->mobile = $request->mobile;
        $contect_us->email = $request->email;
        $contect_us->address = $request->address;
        $contect_us->save();
        return redirect('admin/contectus')->with('success','Contect Us Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contect = Contect::findOrFail($id);
        return view('admin.contect_us.edit',compact(['contect']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        // dd($requestData);
        $contect = Contect::findOrFail($id);
        $contect->update($requestData);
        return redirect('admin/contectus')->with('success','Contect Us Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contect = Contect::findOrFail($id);
        $contect->delete();        
        return redirect('admin/contectus')->with('success','Contect Us Deleted Successfully');
    }
}
