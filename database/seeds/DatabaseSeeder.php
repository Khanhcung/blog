<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('admins')->insert([
        	'name'  => 'son',
        	'email' => 'son@gmail.com',
        	'password'=>bcrypt('secret'),
        	'phone'=>'32432423423',
        	'status'=>0,
        	'created_at'=>'2018-03-27 10:10:09'

        ]);
    }
}
