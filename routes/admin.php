<?php
Route::group(['middleware'=>'checkAdminActiveStatus'],function(){
	Route::get('/home', function () {
	    $users[] = Auth::user();
	    $users[] = Auth::guard()->user();
	    $users[] = Auth::guard('admin')->user();

	    //dd($users);

	    return view('admin.home');
	})->name('home');
	// Caste Controller
    Route::resource('/caste', 'Admin\CasteController');
});

