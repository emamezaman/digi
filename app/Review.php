<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['review_tozihat','product_id','type'];
    protected $table = 'review';
    public $timestamps = false;
}
