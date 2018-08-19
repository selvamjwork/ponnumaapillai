<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$albums = Album::with('photos')->paginate(8);
    	return view('admin.manage-album.index',compact(['albums']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage-album.create');
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
    		'name' => 'required',
    		'description' => 'required',
    		'cover_image' => 'image|max:1999',
    	]);
    	$path ='images/uploads/albums';
		$file = $request->file('cover_image');
		$file->getClientOriginalName();

		$targetFileName = date('YmdHis'.substr((string)microtime(), 1, 8)).'.'.$file->getClientOriginalExtension();
		$file->move($path,$targetFileName);		
    	
    	// Create Album
    	$albums = new Album;
    	$albums->name = $request->name;
    	$albums->description = $request->description;
    	$albums->cover_image = $targetFileName;
    	$albums->save();
    	return redirect('admin/album')->with('success','Album Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$album = Album::with('photos')->find($id);
    	return view('admin.manage-album.show',compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.manage-album.edit');
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
        //
    }
}
