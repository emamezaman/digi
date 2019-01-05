<?php

namespace App\Http\Middleware;

use Closure;
use App\lib\JDF;
use DB;

class Statistics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip= $request->ip();

        $jdf = new JDF();

        $year = $jdf->tr_num($jdf->jdate('Y'));

        $month = $jdf->tr_num($jdf->jdate('n'));
        
        $day = $jdf->tr_num($jdf->jdate('d'));
        
        $count_days = $jdf->tr_num($jdf->jdate('t'));
        
        $boll = null;

        $row = DB::table('statistics_user')

        ->where(['year'=>$year,'month'=>$month,'day'=>$day,'user_ip'=>$ip])->first();
        
        if(!$row){

            $boll = DB::table('statistics_user')

            ->insert(['year'=>$year,'month'=>$month,'day'=>$day,'user_ip'=>$ip]);
        }

        $row2 = DB::table('statistics')

        ->where(['year'=>$year,'month'=>$month,'day'=>$day])

        ->first();

        if($row2){

            $view = $row2->view + 1;

            $total_view = $row2->total_view + 1;

            if($boll){

                DB::table('statistics')

                 ->where(['year'=>$year,'month'=>$month,'day'=>$day])

                 ->update(['view'=>$view,'total_view'=>$total_view]);

            }else{

                 DB::table('statistics')

                 ->where(['year'=>$year,'month'=>$month,'day'=>$day])

                 ->update(['total_view'=>$total_view]);

            }

        }
        else{

            DB::table('statistics')

            ->insert(['year'=>$year,'month'=>$month,'day'=>$day,'view'=>1,'total_view'=>1]);

        } 

        
        return $next($request);
    }
}
