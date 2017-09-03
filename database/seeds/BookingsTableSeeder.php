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
        	'room_id'  => '1',	
        	'user_id'  => '4',	
        	'check_in' => '2017/08/14',
        	'check_out'=> '2017/08/16'
        ]);

        DB::table('bookings')->insert([
        	'room_id'  => '2',	
        	'user_id'  => '5',	
        	'check_in' => '2017/08/14',
        	'check_out'=> '2017/08/16'
        ]);

        DB::table('bookings')->insert([
        	'room_id'  => '3',	
        	'user_id'  => '6',	
        	'check_in' => '2017/08/14',
        	'check_out'=> '2017/08/16'
        ]);

        DB::table('bookings')->insert([
        	'room_id'  => '4',	
        	'user_id'  => '7',	
        	'check_in' => '2017/08/14',
        	'check_out'=> '2017/08/16'
        ]);
    }
}
