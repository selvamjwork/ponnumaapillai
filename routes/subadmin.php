<?php

Route::group(['middleware'],function(){
	Route::get('/subadmin', function () {
	    $users[] = Auth::user();
	    $users[] = Auth::guard()->user();
	    $users[] = Auth::guard('subadmin')->user();
	    return view('subadmin.home');
	});

	Route::get('/home',function(){
		return view('subadmin.home');
	});

	Route::get('/update-horoscope/{user}', 'SubAdmin\HoroscopesEditController@editHoroscope');
    Route::patch('/update-horoscope', 'SubAdmin\HoroscopesEditController@updateHoroscope');

	//User Register
	Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
	Route::post('/register', 'Auth\RegisterController@register');
	Route::resource('/manage-user', 'SubAdmin\ManageUserController');
	Route::get('/manage-user/{user}/activate', 'SubAdmin\ManageUserController@activate');
	
	// Report
	Route::get('/dashboard','SubAdmin\ReportPageController@index');
	Route::get('/subadminwisecaste','SubAdmin\ReportPageController@monthwisereport');
	
});

