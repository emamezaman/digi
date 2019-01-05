<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ostan extends Model
{
    protected  $fillable = ['ostan_name'];
    protected $table = 'ostans';
    public $timestamps = true;

}
