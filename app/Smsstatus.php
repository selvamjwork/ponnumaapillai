<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smsstatus extends Model
{
    protected $table = 'sms_status';

    protected $fillable = [
    	'sender_id',
    	'message_id',
    	'sent_time',
    	'delivered_time',
    	'operator',
    	'dest_num',
    	'status',
    	'status_code',
    ];
}
