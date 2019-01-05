<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // factory(App\User::class,2)->create()->each(function($u){
       // 	$u->issues()->save(factory(App\Issues::class)->make());

       // });
    	// for ($i=0; $i <10 ; $i++) { 
    	// 	\DB::table('users')->insert([
     //    'name' => str_random(10),
     //    'email' => str_random(10).'@gmail.com',
     //    'password' => bcrypt(str_random(10)), 
     //    'remember_token' => str_random(10),
     //    'created_at'=>Carbon\Carbon::now(),
     //    'updated_at'=>Carbon\Carbon::now()
    	// 	]);
    	// }
    	\DB::table('users')->insert([
           'name' => str_random('10'),
           'email' => str_random('10'),
           'password' => bcrypt('secret'),
           'created_at'=>Carbon\Carbon::now(),
           'updated_at'=>Carbon\Carbon::now(),
       ]);
    }
}
