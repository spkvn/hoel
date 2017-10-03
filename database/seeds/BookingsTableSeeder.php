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
        	'user_id'  => '9',	
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
            'room_id'  => '7',  
            'user_id'  => '4',  
            'check_in' => '2017/08/14',
            'check_out'=> '2017/08/16'
        ]);
        DB::table('bookings')->insert([
            'room_id'  => '8',  
            'user_id'  => '4',  
            'check_in' => '2017/08/14',
            'check_out'=> '2017/08/16'
        ]);        
        DB::table('bookings')->insert([
            'room_id'  => '9',  
            'user_id'  => '4',  
            'check_in' => '2017/08/17',
            'check_out'=> '2017/08/18'
        ]);        
        DB::table('bookings')->insert([
            'room_id'  => '10',  
            'user_id'  => '4',  
            'check_in' => '2017/08/19',
            'check_out'=> '2017/08/20'
        ]);        
        DB::table('bookings')->insert([
            'room_id'  => '11',  
            'user_id'  => '4',  
            'check_in' => '2017/08/21',
            'check_out'=> '2017/09/12'
        ]);        
        DB::table('bookings')->insert([
            'room_id'  => '12',  
            'user_id'  => '4',  
            'check_in' => '2017/09/13',
            'check_out'=> '2018/09/16'
        ]);        
        DB::table('bookings')->insert([
            'room_id'  => '13',  
            'user_id'  => '4',  
            'check_in' => '2018/08/14',
            'check_out'=> '2018/08/16'
        ]);        
        DB::table('bookings')->insert([
            'room_id'  => '14',  
            'user_id'  => '4',  
            'check_in' => '2018/09/14',
            'check_out'=> '2018/09/16'
        ]);
    }
}
