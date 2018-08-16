<?php

Route::group(['middleware'],function(){
	Route::get('/admin', function () {
		$users[] = Auth::user();
	    $users[] = Auth::guard()->user();
	    $users[] = Auth::guard('admin')->user();
	    $casteid = DB::table('caste')->get(); 
	    $subadmins = DB::table('subadmins')->get(); 
	    return view('admin.home',compact('casteid','subadmins'));
	});

	Route::get('/',function(){
		$casteid = DB::table('caste')->get();
		$subadmins = DB::table('subadmins')->get();
		return view('admin.home',compact('casteid','subadmins'));
	});

	// Caste Controller
    Route::resource('/caste', 'Admin\CasteController');
    // Caste Controller
    Route::resource('/sub-caste', 'Admin\SubCasteController');
    // Caste Controller
    Route::resource('/scrollingmessage', 'Admin\ScrollingMessageController');

    Route::get('/update-horoscope/{user}', 'Admin\HoroscopesEditController@editHoroscope');
    Route::patch('/update-horoscope', 'Admin\HoroscopesEditController@updateHoroscope');

	Route::get('/dashboard/no-of-user','Admin\ReportPageController@index');
	Route::get('/dashboard/paymentdetails','Admin\ReportPageController@index');
	Route::get('/dashboard/adminwisecastereport','Admin\ReportPageController@adminwisecastereport');
	Route::get('/dashboard/subadminwisereport','Admin\ReportPageController@SubadminWiseReport');
	Route::get('/dashboard/castewisereport','Admin\ReportPageController@castewisereport');
	Route::get('/dashboard/onlineusercount','Admin\ReportPageController@onlineUserCount');
	
	Route::resource('/manage-gallery', 'Admin\GalleryController');
	//User Register
	Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
	Route::post('/register', 'Auth\RegisterController@register');
	Route::resource('/manage-user', 'Admin\ManageUserController');
	Route::get('/manage-user/{user}/activate', 'Admin\ManageUserController@activate');

	// Sub Admin Register
	Route::get('/register', 'SubadminAuth\RegisterController@showRegistrationForm');
	Route::post('/register', 'SubadminAuth\RegisterController@register');
	Route::resource('/manage-subadmin', 'Admin\ManageSubAdminController');
	Route::get('/manage-subadmin/{subadmin}/activate', 'Admin\ManageSubAdminController@activate');

	// Profile Search	
    Route::get('/profile/search{page?}', 'Admin\AdminProfileSearchController@index');
    Route::get('/profile/search/{user}', 'Admin\AdminProfileSearchController@show');
});