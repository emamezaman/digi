<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
   protected $fillable =['title','code','product_id'];
    protected $table = 'color';
    
}
