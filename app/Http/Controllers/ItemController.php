<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;


class ItemController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $invoiceid=$request->invoiceid;
        $user_id=$request->user_id.'.pdf';
        $pay = DB::table("paymentstatus")
        ->where('id','=', $invoiceid)
        ->get();
        view()->share('pay',$pay);
        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download($user_id);
        }
        return view('pdfview',compact('pay'));
    }
}