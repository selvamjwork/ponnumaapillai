<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Smsstatus;

class SmsStatusController extends Controller
{
    //
	<<<<<<< HEAD
	public function status(Request $request)
	=======
	    public function status(Request $request)
	>>>>>>> c82c4da2bcdd8b07078ce2a3922bd5c9cfcdcee2
	    {
	    	// Storage::append(
	    	//             'sulekha-response-confirm.txt',
	    	//             print_r($request->all(),true)
	    	//         );

	        $status = new Smsstatus;
	        $user= \Auth::user();

	<<<<<<< HEAD
	<<<<<<< HEAD
	=======
	    	$smsSend = App\SMS::where("MDSD" ,$request->MID)->first();
	=======
	        $status->sender_id = $user->id;
	        $status->message_id = $request->MID;
	        $status->sent_time = $request->Stime;
	        $status->delivered_time = $request->Dtime;
	        $status->operator = $request->Operator;
	        $status->dest_num = $request->Dest;
	        $status->status = $request->Reason;
	        $status->status_code = $request->Status;
	>>>>>>> 24f55a3d2ca9177345494bef9505d5af7e503e4f

	        $status->save();

	>>>>>>> c82c4da2bcdd8b07078ce2a3922bd5c9cfcdcee2
	    	return "success";
	    }
}
