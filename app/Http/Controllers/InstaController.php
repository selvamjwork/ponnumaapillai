<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay;
use DB;
use App\Sms;
class InstaController extends Controller
{
    public function checkout(request $request) 
    {
      $orderCode = time('YmdHis'.substr((string)microtime(), 1, 8));
      $pmid = \Auth::user()->user_id;
      //$newOrderCode = ($orderCode) ? ++$orderCode->order_code : 'ORD-000000001';
      $parameters = [
        'tid' => '123',
        'order_id' => $orderCode,
        'amount' => '600.00',
        'pm_id' => $pmid,
        "billing_name" => \Auth::user()->name,
        'billing_address' => \Auth::user()->address,
        'billing_tel'=> \Auth::user()->mobile,
        'billing_email' => \Auth::user()->email,
        'delivery_name' => \Auth::user()->name,
        'delivery_address' => \Auth::user()->address,
      ];
      $order = Indipay::gateway('CCavenue')->prepare($parameters);
      return Indipay::process($order);
    }
    public function response(Request $request)
    {
      // For default Gateway
      $response = Indipay::response($request);
      // For Otherthan Default Gateway
      $response = Indipay::gateway('CCAvenue')->response($request);
      //return view('default.indipay/response');        
      $order_id = $response['order_id'];
      $tracking_id = $response['tracking_id'];
      $bank_ref_no = $response['bank_ref_no'];
      $order_status = $response['order_status'];
      $failure_message = $response['failure_message'];
      $payment_mode = $response['payment_mode'];
      $card_name = $response['card_name'];
      $status_code = $response['status_code'];
      echo "payment Status" . $status_message = $response['status_message'];
      $currency = $response['currency'];
      $amount = $response['amount'];
      $billing_name = $response['billing_name'];
      $billing_address = $response['billing_address'];
      $billing_city = $response['billing_city'];
      $billing_state = $response['billing_state'];
      $billing_zip = $response['billing_zip'];
      $billing_country = $response['billing_country'];
      $billing_tel = $response['billing_tel'];
      $billing_email = $response['billing_email'];
      $mer_amount = $response['mer_amount'];
      $response_code = $response['response_code'];
      $billing_notes = $response['billing_notes'];
      $trans_date = $response['trans_date'];
      $pmid = \Auth::user()->user_id;
      echo "<a href='http://www.ponnumaapillai.com/home'>Return to Home</a>";
      //dd($response);
      $dataSet[] = [
      'order_id' => $order_id,
      'tracking_id' => $tracking_id,
      'bank_ref_no' => $bank_ref_no,
      'order_status' => $order_status,
      'failure_message' => $failure_message,
      'payment_mode' => $payment_mode,
      'card_name' => $card_name,
      'status_code' => $status_code,
      'status_message' => $status_message,
      'currency' => $currency,
      'amount' => $amount,
      'billing_name' => $billing_name,
      'billing_address' => $billing_address,
      'billing_city' => $billing_city,
      'billing_state' => $billing_state,
      'billing_zip' => $billing_zip,
      'billing_country' => $billing_country,
      'billing_tel' => $billing_tel,
      'billing_email' => $billing_email,
      'mer_amount' => $mer_amount,
      'response_code' => $response_code,
      'billing_notes' => $billing_notes,
      'trans_date' => $trans_date,
      'user_id' => $pmid,
      ];
      DB::table('paymentstatus')->insert($dataSet);
      if ($order_status == 'Success') {
        $user = \Auth::user();
        if ($user->gender == 1) 
        {
          if ($user->star == 1) 
          {
            $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,6,9,10,13,15,18,19,23,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 2) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,6,8,11,16,17,20,23,25,26))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 3) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(5,7,12,14,20,21,22,23,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 4) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(4,10,11,13,15,22,24))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 5) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(5,10,11,14,23))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 6) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(4,6,7,8,9,13,15,17,18,22,24))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 7) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,6,7,9,10,11,12,16,19,21,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 8) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,8,9,11,14,16,17,20,22,23,25,26))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 9) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,6,9,10,11,18,19,26))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 10) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,5,7,9,10,18,19,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 11) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,4,5,7,8,9,11,17,20,26))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 12) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,7,14,16,21,23,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 13) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,4,6,13,15,16,22,23,24,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 14) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,3,5,8,12,13,14,15,17,18,21,23,24,26,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 15) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,4,6,13,14,15,16,17,22,23,24,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 16) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,3,7,8,11,12,13,17,18,20,21,24,25,26,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 17) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,6,8,11,16,19,20,23,25,26))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 18) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,6,9,10,14,16,18,19,20,23,25,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 19) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,7,9,10,17,18,19,21,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 20) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,3,8,11,17,20,26))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 21) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,7,12,14,16,24,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 22) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,4,6,8,13,15,22,24))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 23) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,2,3,8,9,11,13,14,15,17,18,21,23,24,25,26,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 24) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,4,6,13,14,15,22,23,24,25,26))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 25) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,2,3,7,8,12,13,15,16,17,18,21,24,25,26,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 26) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,4,8,11,14,19,20,23,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 27) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','2')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,9,10,14,16,18,19,23,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
        }
        #female
        else{
          if ($user->star == 1) 
          {
            $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,9,10,13,15,18,19,23,25,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 2) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,8,11,14,16,20,23,24,25,26))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 3) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,7,12,14,16,17,20,21,22,23,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 4) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(4,6,11,13,15,22,24,26))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 5) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,5,10,11,14,23))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 6) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,2,4,6,7,9,13,15,17,18,22,24))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 7) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,6,7,10,11,12,16,19,21,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 8) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,6,8,11,14,16,17,20,22,23,25,26))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 9) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,6,7,8,9,10,11,18,19,23,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 10) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,4,5,7,9,10,18,19,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 11) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,4,5,7,8,9,11,16,17,20,23,26))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 12) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,7,14,16,21,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 13) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,4,6,13,14,15,16,22,23,24,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 14) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,5,8,12,14,15,18,21,23,24,26,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 15) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,4,6,13,14,15,22,23,24,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 16) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,3,7,8,12,13,15,17,18,21,24,25,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 17) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,6,8,11,14,15,16,19,20,23,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 18) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,6,9,10,14,16,18,19,23,25,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 19) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,7,9,10,17,18,19,26,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 20) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,3,8,11,16,17,18,20,26))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 21) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,7,12,14,16,19,23,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 22) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(3,4,6,8,13,15,22,24))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 23) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,2,3,5,8,12,13,14,15,17,18,23,24,26,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 24) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(4,6,13,14,15,16,21,22,23,24,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 25) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,3,7,8,12,13,15,16,17,18,21,23,24,25,26,27))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 26) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(2,8,9,11,14,16,17,20,23,24,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
              elseif ($user->star == 27) {
                $caste = User::where('caste', '=',$user->caste)->get();
            foreach ($caste as $value) {
              $male = User::where('caste','=',$value->caste)->where('active', '=',1)->where('gender','=','1')->where('payment_completed','=',1)->where('mobile_verified','=',1)->whereNotIn('star',array(1,10,14,16,18,19,23,25))->get();
            }
            foreach ($male as $key => $male) 
            {
              #send Short Url SMS
              $message = 'New Matching Profile fond for your star in PONNU MAAPILLAI -http://linepix.in/profile/search/'.$user->id;
              $sms = new Sms;
              $smsStatus = $sms->sendSms($male,$message,'user');
            }
              }
        }
        DB::table('users')->where('user_id', $pmid)->update(['payment_completed' => '1']);
      } else {
        DB::table('users')->where('user_id', $pmid)->update(['payment_completed' => '0']);
      }

      return redirect('/home');
    }  
    public function paymentsuccess()
    {
      $response = Indipay::response($request);
      // For Otherthan Default Gateway
      $response = Indipay::gateway('CCAvenue')->response($request);
      dd($response);
    }
    public function paymentfailure()
    {
      return view ('pages.paymentfailed');
    }
}