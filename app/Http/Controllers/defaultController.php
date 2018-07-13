<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class defaultController extends Controller
{
    public function about_us()
    {
    	return view('default.about');
    }

    public function Privacy()
    {
    	return view('default.Privacy');
    }

    public function Terms()
    {
    	return view('default.Terms');
    }

    public function contactus()
    {
    	return view('default.contactus');
    }

    public function payment()
    {
        return view('default.payment');
    }
    public function paymentsuccess()
    {
        return view('default.paymentsuccess');
    }
    public function paymentfailed()
    {
        return view('default.paymentfailed');
    }
     public function payments()
    {
        return view('default.payments');
    }
    public function paymentstatus()
    {
        return view('default.paymentstatus');
    }
    //  public function response()
    // {
    //     return view('default.response');
    // }
    // public function response(Request $request)
    //  {
    //     $response = Indipay::response($request);
    //     dd($response);
    //     return view ('pages.paymentsuccess');
    //  }

}

