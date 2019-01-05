<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View()->composer('layouts.site',function($view){
           $category = \App\Category::where('parent_id',0)->get();
           $view->with(compact('category'));
        });

         View()->composer('mobile.layout',function($view){
           $category = \App\Category::where('parent_id',0)->get();
           $view->with(compact('category'));
        });

        Validator::extend('check_username',function($attr,$value,$params){

           if(filter_var($value,FILTER_VALIDATE_EMAIL)){
            return true;
           }

            $len = strlen($value);

            if($len==10){

                if(substr($value,0,1)=='9'){return true;}else{ return false;}
            }
            if($len==11){
                if(substr($value,0,2)=='09'){return true;}else{return false;}
            }
            return false;



        });

        ////////////////
            Validator::extend('unique_username',function($attr,$value,$params){

                $user = DB::table('users')->where('username',$value)->first();
                if($user){
                    return false;
                }else{
                    return true;
                }

            });

     }



    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
