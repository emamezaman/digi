<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected  $fillable = ['product_id','user_id','status','time','question','send_email','parent_id'];
    protected $table = 'question';
    public $timestamps = false;
    public function get_user(){
    	return $this->hasOne(User::class,'id','user_id')->withDefault(['name'=>'بی نام']);
    } 
    public function get_answers(){
    	return $this->hasMany(Question::class,'parent_id','id')
    	->where(['status'=>1]);
    }

    public function get_answers2(){
    	return $this->hasMany(Question::class,'parent_id','id') ;
    }

    public function get_product(){
    	return $this->hasOne(product::class,'id','product_id')->withDefault(['title'=>'حذف شده']);
    }
}

