<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use Carbon\Carbon;
use Session;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Gallery::get();
        return view('admin.manage-gallery.index',compact(['images']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage-gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = [];
        foreach ($request->file('image') as $file) {
            $path ='images/uploads/gallery';
            $file->getClientOriginalName();
            $targetFileName = date('YmdHis'.substr((string)microtime(), 1, 8)).'.'.$file->getClientOriginalExtension();
            $file->move($path,$targetFileName);
            $req = $targetFileName;
            $image[] = [
                'title'=>$request->title,
                'discreption' => $request->discreption,
                'image' => $req,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        $Gallery = Gallery::insert($image);
        Session::flash('success', 'Photos Added Successfully');
        return redirect('admin/manage-gallery');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gallery::find($id)->delete();
        return back()
            ->with('success','Image removed successfully.');
    }
}
