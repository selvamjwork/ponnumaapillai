<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/get-subsect/{id}/{selectedSubsect?}','UserController@selectSubsect');
Route::get('/status','SmsStatusController@status');
Route::post('/password/mobile', 'Auth\ForgotPasswordController@resetPasswrodThrougSms');
Route::post('/password/mobile/verify', 'Auth\ForgotPasswordController@verifyMobileResetCode');
Route::get('/password/reset-mobile',function()
{
   return view('auth.passwords.mobile');
})->middleware('guest');
Route::get('reset-password','Auth\ForgotPasswordController@resetpass');
Route::get('/password/reset-type',function()
{
   return view('auth.passwords.by');
});
Route::get('/about-us','defaultController@about_us');
Route::get('/Privacy','defaultController@Privacy');
Route::get('/Terms','defaultController@Terms');
Route::get('/contactus','defaultController@contactus');
Route::get('/payment','defaultController@payment');
Route::get('/response','InstaController@response');
Route::POST('checkout','InstaController@checkout');
Route::POST('/indipay/response','InstaController@response');
Route::get('paymentsuccess','InstaController@paymentsuccess');
Route::get('paymentfailure','InstaController@paymentfailure');
//Route::get('/paymentstatus','defaultController@paymentstatus');
Route::get('/paymentstatus', function () {
    $user_id = \Auth::user()->user_id;
    $petani = DB::table('paymentstatus')->where('user_id', $user_id)->paginate(5);
    return view('default.paymentstatus', ['order_id' => $petani]);
});


# Route for PDF
Route::get('pdfview',array('as'=>'pdfview','uses'=>'ItemController@pdfview'));

// Route::get('/verifyEmail/{token}', 'Auth\VerificationController@VerifyEmail');
Route::group(['middleware' => ['auth', 'userLog',]], function () {

    Route::get('/', function () {
        return redirect('/home');
    })->name('home');

    Route::get('pdf','HomeController@pdf');

    Route::get('/home/{user}','HomeController@show')->name('home');

    #VerificationController Route
    Route::get('/mobileVerification', 'Auth\VerificationController@VerifyMobile');
    // Route::get('/notVerified', 'Auth\VerificationController@notVerified');
    // Route::get('/resendEmailToken', 'Auth\VerificationController@resendEmailToken');
    Route::patch('/resend-code', 'Auth\VerificationController@resendCode');
    Route::patch('/verify-code', 'Auth\VerificationController@verifyCode');

    #homeController Route
    Route::get('/home', 'HomeController@index')->name('home');

    #Change Password
    Route::get('/profile/change-password', 'UserController@changePassword');
    Route::post('/profile/change-password', 'UserController@updatePassword');

    #myprofile Route
    Route::get('/myprofile','HomeController@myprofile');
    
    #UserController Route
    Route::get('/user/update-profile1', 'UserController@updateProfile1');
    Route::patch('/user/update-profile1', 'UserController@update1');
    Route::get('/user/remove-profile', 'UserController@removepic');
    Route::get('/user/create-profile1', 'createProfileController@createForm1');
    Route::patch('/user/create-profile1', 'createProfileController@create1');
    Route::get('/user/create-profile2', 'createProfileController@createForm2');
    Route::patch('/user/create-profile2', 'createProfileController@create2');
    Route::get('/user/create-profile3', 'createProfileController@createForm3');
    Route::patch('/user/create-profile3', 'createProfileController@create3');
    Route::get('/user/create-form-preview','createProfileController@createprofilepreview');
    Route::post('/user/create-form-preview','createProfileController@createprofilesms');
    

    #search Controller
    Route::get('profile/search{page?}', 'ProfileSearchController@index');
    Route::get('profile/search/{user}', 'ProfileSearchController@show');
    Route::get('interestedprofile/{user}', 'ProfileSearchController@create');
    Route::get('view/profile/photo/{user}', 'ProfileSearchController@profilePhoto');

    #Interested Profile
    Route::get('/interestedprofile', 'interestedProfileController@index');
    Route::get('/interestprofile/{user}', 'interestedProfileController@show');
    Route::get('/interestprofileremove/{user}', 'interestedProfileController@delete');

    #Deactivete Profile
    Route::get('/deactiveUser','UserController@deactiveUser');

});

//Admin Login
Route::get('admin', 'AdminAuth\LoginController@showLoginForm');
Route::get('admin/login', 'AdminAuth\LoginController@showLoginForm');
Route::post('admin/login', 'AdminAuth\LoginController@login');
Route::post('admin/logout', 'AdminAuth\LoginController@logout');

//Admin Passwords
Route::post('admin/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::post('admin/password/reset', 'AdminAuth\ResetPasswordController@reset');
Route::get('admin/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
Route::get('admin/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

//Subadmin Login
Route::get('subadmin', 'SubadminAuth\LoginController@showLoginForm');
Route::get('subadmin/login', 'SubadminAuth\LoginController@showLoginForm');
Route::post('subadmin/login', 'SubadminAuth\LoginController@login');
Route::post('subadmin/logout', 'SubadminAuth\LoginController@logout');

//Subadmin Passwords
Route::post('subadmin/password/email', 'SubadminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::post('subadmin/password/reset', 'SubadminAuth\ResetPasswordController@reset');
Route::get('subadmin/password/reset', 'SubadminAuth\ForgotPasswordController@showLinkRequestForm');
Route::get('subadmin/password/reset/{token}', 'SubadminAuth\ResetPasswordController@showResetForm');
