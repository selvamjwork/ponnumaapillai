<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;
use App\Notifications\sendEmailVerifyToken;
use Illuminate\Support\Str;
use DB;
use App\caste;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'user_id',
            'name',
            'fathers_name',
            'fathers_occupation',
            'mothers_name',
            'mothers_occupation',
            'gender',
            'noofbrothers',
            'noofbrothersstatus',
            'noofsisters',
            'noofsistersstatus',
            'month',
            'day',
            'year',
            'age',
            'hour',
            'minutes',
            'seconds',
            'session',
            'height',
            'weight',
            'graduate',
            'qualification',
            'annual_income',
            'professional',
            'mother_tongue',
            'religion',
            'caste',
            'subsect',
            'gothram',
            'moonsign',
            'star',
            'pob',
            'address',
            'mobile',
            'email',
            'password',
            'profile_pic',
            'email_verified',
            'mobile_verified',
            'role',
            'active',
            'payment_completed',
            'profile_completed',
            'admin_id',
            'aboutyourself',
            'dosatype',
            'dosham',
            'dasha_day',
            'dasha_month',
            'dasha_year',
            'payment_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function updateValidate(array $data)
    {
        return Validator::make($data, [
            'name' => 'string|max:255',
            'mobile' => 'string|max:255',
            
        ]);
    }

    public function sendEmail($user)
    {
        return redrect('/resendEmailToken');
        #this function is to send eamil verifcation token
        // $EmailVerifyToken = Str::random(60);
        // $emailVerify = DB::table('email_verify')->insert([
        //     'email'=>$user->email,
        //     'token'=>$EmailVerifyToken,
        //     'created_at'=>\Carbon\Carbon::now(),
        // ]);
        // $user->notify(new sendEmailVerifyToken($EmailVerifyToken));
    }

    public function caste()
    {
        return $this->belongsTo('App\caste','id');
    }

    public function interestedprofile()
    {
        return $this->belongsTo('App\interestedprofile','interesteduserid');
    }
}
