<?php

use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')->insert([
        	'room_id'  => '1',	//room 1001
        	'user_id'  => '4',	//user data
        	'price'	   => 3.50,
        	'check_in' => '2017/08/14',
        	'check_out'=> '2017/08/16'
        ]);

        DB::table('bookings')->insert([
        	'room_id'  => '2',	//room 1002
        	'user_id'  => '5',	//user geordie
        	'price'	   => 3.50,
        	'check_in' => '2017/08/14',
        	'check_out'=> '2017/08/16'
        ]);

        DB::table('bookings')->insert([
        	'room_id'  => '3',	//room 1003
        	'user_id'  => '6',	//user deanna
        	'price'	   => 3.50,
        	'check_in' => '2017/08/14',
        	'check_out'=> '2017/08/16'
        ]);

        DB::table('bookings')->insert([
        	'room_id'  => '4',	//room 1004
        	'user_id'  => '7',	//user bev
        	'price'	   => 3.50,
        	'check_in' => '2017/08/14',
        	'check_out'=> '2017/08/16'
        ]);
    }
}
