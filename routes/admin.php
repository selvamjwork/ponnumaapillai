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
	#For Caste wise report page Table datas
	Route::get('/paymentdetails', function () {
	    $petani = DB::table('paymentstatus')->get();
	    $casteid = DB::table('caste')->get(); 
	    $subadmins = DB::table('subadmins')->get(); 
	    return view('admin.dashboard.paymentdetails', ['order_id' => $petani], compact('casteid','subadmins'));
	});
	#For Caste wise report page Table datas
	//Route::get('/dashboard/castewisereport', function () {
	//$date = date('y-m-d');
	//$cwr = DB::table('users')->where('created_at', '>=',$date )->get();
	//return view('admin.dashboard.castewisereport', ['caste_name' => $cwr]);
	//});

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