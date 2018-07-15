<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\scrollingmessage;
use Session;
use Validator;

class ScrollingMessageController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'scrolling_message' => 'required|max:1000',
        ]);
    }

    public function index()
    {
    	$scrollingmessage = scrollingmessage::paginate(5);
    	return view ('admin.manage-scrollingmessage.index',compact('scrollingmessage'));
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
        scrollingmessage::create($requestData);
        Session::flash('success', 'Scrolling Message Added Successfully Done !!!');
        return redirect('admin/scrollingmessage');
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
        $scrollingmessage = scrollingmessage::findOrFail($id);
        return view('admin.manage-scrollingmessage.edit', compact('scrollingmessage'));
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
        $scrollingmessage = scrollingmessage::findOrFail($id);
        $scrollingmessage->update($requestData);
        Session::flash('success', 'Scrolling Message Update Successfully Done !!!');
        return redirect('admin/scrollingmessage');
    }

    public function destroy($id)
    {
        $scrollingmessage = scrollingmessage::findOrFail($id);
        if ($scrollingmessage->active == 1) {
            $scrollingmessage->active = '0' ;
            $scrollingmessage->update();
            Session::flash('success', 'Scrolling Message Disable Successfully Done !!!'); 
        }
        else{
            $scrollingmessage->active = '1' ;
            $scrollingmessage->update();
            Session::flash('success', 'Scrolling Message Enable Successfully Done !!!'); 
        }
        return redirect('admin/scrollingmessage');
    }
}
