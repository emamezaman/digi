<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
   protected $fillable =['product_id','user_id','time','subject','advantages','desadvantages','comment_text','status','score_id'];
   protected $table = 'product_comment';
   public $timestamps =false;

}
