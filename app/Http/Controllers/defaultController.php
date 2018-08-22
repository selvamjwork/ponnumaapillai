<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use DB;
use Carbon\Carbon;
use Auth;
use App\Album;
use App\Photo;
use App\Contect;

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
        $cantact = Contect::paginate(10);
    	return view('default.contactus',compact(['cantact']));
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
    public function makepayment()
    {
        return view('default.makepayment');
    }
    public function paymentstatus()
    {
        $user = \Auth::user();
        $created_at = new Carbon(($user->payment_date));
        if (is_null($created_at)) {
            $expired_date = Carbon::parse($created_at)->addMonths(12)->format('d-m-Y');
        }
        else{
            $expired_date = 'null';
        }
        
        return view('default.paymentstatus',compact(['expired_date']));
    }
    public function gallery()
    {
        $gallery = Album::with('photos')->orderBy('id','desc')->paginate(8);
        return view('default.gallery',compact(['gallery']));
    }

    public function galleryshow($id)
    {
        $album = Album::with('photos')->find($id);
        return view('default.galleryshow',compact('album'));
    }
}

