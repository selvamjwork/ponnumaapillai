<?php

Route::group(['middleware'],function(){
	Route::get('/subadmin', function () {
	    $users[] = Auth::user();
	    $users[] = Auth::guard()->user();
	    $users[] = Auth::guard('subadmin')->user();
	    return view('subadmin.home');
	});

	Route::get('/',function(){
		return view('subadmin.home');
	});

	//User Register
	Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
	Route::post('/register', 'Auth\RegisterController@register');
	Route::resource('/manage-user', 'SubAdmin\ManageUserController');
	Route::get('/manage-user/{user}/activate', 'SubAdmin\ManageUserController@activate');
	#Payment Details
	Route::get('/paymentdetails', function () {
	$user_id = \Auth::user()->user_id;
    $petani = DB::table('paymentstatus')->where('user_id', $user_id)->get();

    
     Route::patch('/get-subsect/{id}/{selectedSubsect?}', 'SubAdmin\ManageUserController@update1');

    return view('subadmin.dashboard.paymentdetails', ['order_id' => $petani]);
});

	// dashboard
	Route::get('/dashboard','SubAdmin\ReportPageController@index');
	
});

