<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use View;
class load_admin_data
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
        $count_comment = DB::table('product_comment')
        ->where('status',0)->count();

        $count_question = DB::table('question')
        ->where('status',0)->count();
        View::share([
            'count_comment'=>$count_comment,
            'count_question'=>$count_question
        ]);
        return $next($request);
    }
}
