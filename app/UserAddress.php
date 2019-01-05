<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = ['full_name','user_id','ostan_id','shar_id','phone','city_code','mobile','zip_code','address'];
    protected $table = 'user_address';
    
    public function get_ostan(){
        return $this->hasOne(Ostan::class,'id','ostan_id')->withDefault(['ostan_name'=>'-']);
    }
    
      public function get_shar(){
        return $this->hasOne(Shar::class,'id','shar_id')
            ->withDefault(['shar_name'=>'-']);
    }

}
