<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shar extends Model
{
   protected  $fillable = ['shar_name','ostan_id'];
    protected $table = 'shars';
    public $timestamps = true;

    public function get_ostan_name(){
    	return $this->hasOne(Ostan::class,'id','ostan_id')->withDefault(['ostan_name'=>'حذف شده']);
    }
}
