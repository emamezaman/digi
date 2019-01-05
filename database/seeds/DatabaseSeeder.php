<?php

use Illuminate\Database\Seeder;
use database\seeds\UserTableSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	 Model::unguard();
         $this->call(UsersTableSeeder::class);
         // $this->call(IssueTableSeeder::class);
        Model::reguard();
    }
}
