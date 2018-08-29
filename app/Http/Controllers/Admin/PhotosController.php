<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Photo;

class PhotosController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($album_id)
    {
        return view('admin.manage-photos.create',compact(['album_id']));
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
            // 'title' => 'required',
            // 'description' => 'required',
            'photo' => 'image|max:1999',
        ]);
        $path ='images/uploads/photos/'.$request->album_id;
        $file = $request->file('photo');
        $file->getClientOriginalName();
        $targetFileName = date('YmdHis'.substr((string)microtime(), 1, 8)).'.'.$file->getClientOriginalExtension();
        $file->move($path,$targetFileName);     
        
        // Upload Photo
        $photo = new Photo;
        $photo->album_id = $request->album_id;
        $photo->photo = $targetFileName;
        $photo->title = $request->title;
        $photo->size = $file->getClientSize();
        $photo->description = $request->description;
        $photo->save();
        return redirect('admin/album/'.$request->album_id)->with('success','Photo Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);
        return view('admin.manage-photos.show',compact(['photo']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->delete();
        return redirect('admin/album/'.$photo->album_id)->with('success','Photo Deleted Successfully');
    }
}
