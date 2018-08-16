<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

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
    public function gallery()
    {
        $gallery = Gallery::orderBy('id','desc')->paginate(6);
        // dd($gallery);
        return view('default.gallery',compact(['gallery']));
    }
}

