<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['id','option_name' , 'option_value'];
    protected $table = 'setting';
    public $timestamps = false;

    public static function get_value($option_name){
       $option = self::where('option_name',$option_name)->first();
        if($option){
        	return $option->option_value; 
        }
        return '';
        
    }

     public static function set_value($data){
     foreach ($data as $key => $value) {
     	 
       DB::table('setting')->where('option_name',$key)->update(['option_value'=>$value]);
       
     }

     }
}
