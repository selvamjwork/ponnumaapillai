<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class horoscope extends Model
{
    protected $table = 'horoscope';

    protected $fillable = ['user_id','raasi_sun','raasi_moon','raasi_mars','raasi_mercury','raasi_jupiter','raasi_venus','raasi_saturn','raasi_raagu','raasi_kethu','raasi_lagna','amsam_sun','amsam_moon','amsam_mars','amsam_mercury','amsam_jupiter','amsam_venus','amsam_saturn','amsam_raagu','amsam_kethu','amsam_lagna'];
}
