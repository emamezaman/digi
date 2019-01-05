<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
   protected $fillable = [
		 'product_id','user_id','time','value'
   ];
   protected $table = 'score';

   public $timestamps = false;

   public static function get_list_score($score1){
   	$score = array();
   	  if(!empty($score1)){
           $n = explode('@#$%',$score1->value);
        foreach ($n as $key => $value) {
         if(!empty($value)){
           $m=explode('_', $value);
          if(sizeof($m)==2){
            $score[$m[0]] = $m[1];
          }
         }
        }
         }
         return $score;
   }

   public static function get_data($product_id){
       $sum_score = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,);
       $data =array();
       $scores = Score::where('product_id',$product_id)->get();
       foreach ($scores as $key=>$value){
           $score = self::get_list_score($value);
           foreach ($score as $key2 => $value2){
               $sum_score[$key2] += $value2;
           }
       }


       $total= sizeof($scores);
       for ($i = 1; $i <= 6 ; $i++){
           if($total > 0){

               $sum_score[$i] = $sum_score[$i] / $total;
           }
       }

       $avg_score = number_format(collect($sum_score)->avg(),1);
       $data['sum_score']=  $sum_score;
       $data['total']=  $total;
       $data['avg_score']=  $avg_score;
       return $data;
   }
   
   public function get_user(){
   	return $this->hasOne(User::class,'id','user_id')->withDefault(['name'=>'']);
   }
    public function get_comment(){
   	return $this->hasOne(ProductComment::class,'score_id','id')->where(['status'=>1]);
   }

    public function get_comment_admin(){
    return $this->hasOne(ProductComment::class,'score_id','id');
   }

    public function get_product(){
    return $this->hasOne(Product::class,'id','product_id');
   }
}
