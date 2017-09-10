<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rooms')->insert([
        	'room_number' => 1001,
        	'max_capacity'=> 5,
        	'beds' => 2,
        	'price_per_night' => 475
        ]);

        DB::table('rooms')->insert([
        	'room_number' => 1002,
        	'max_capacity'=> 32,
        	'beds' => 16,
        	'price_per_night' => 440
        ]);
        
        DB::table('rooms')->insert([
        	'room_number' => 1003,
        	'max_capacity'=> 1,
        	'beds' => 10,
        	'price_per_night' => 999
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 1004,
        	'max_capacity'=> 2,
        	'beds' => 1,
        	'price_per_night' => 340
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 1005,
        	'max_capacity'=> 3,
        	'beds' => 2,
        	'price_per_night' => 250
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 1006,
        	'max_capacity'=> 4,
        	'beds' => 2,
        	'price_per_night' => 300
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 1007,
        	'max_capacity'=> 4,
        	'beds' => 3,
        	'price_per_night' => 100
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 1008,
        	'max_capacity'=> 4,
        	'beds' => 4,
        	'price_per_night' => 200
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 1009,
        	'max_capacity'=> 5,
        	'beds' => 5,
        	'price_per_night' => 300
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 1010,
        	'max_capacity'=> 6,
        	'beds' => 6,
        	'price_per_night' => 200
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2001,
        	'max_capacity'=> 6,
        	'beds' => 3,
        	'price_per_night' => 100
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2002,
        	'max_capacity'=> 3,
        	'beds' => 2,
        	'price_per_night' => 200
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2003,
        	'max_capacity'=> 20,
        	'beds' => 10,
        	'price_per_night' => 300
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2004,
        	'max_capacity'=> 22,
        	'beds' => 11,
        	'price_per_night' => 200
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2005,
        	'max_capacity'=> 23,
        	'beds' => 12,
        	'price_per_night' => 100
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2006,
        	'max_capacity'=> 49,
        	'beds' => 40,
        	'price_per_night' => 200
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2007,
        	'max_capacity'=> 2,
        	'beds' => 2,
        	'price_per_night' => 300
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2008,
        	'max_capacity'=> 5,
        	'beds' => 3,
        	'price_per_night' => 200
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2009,
        	'max_capacity'=> 4,
        	'beds' => 3,
        	'price_per_night' => 100
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2010,
        	'max_capacity'=> 2,
        	'beds' => 2,
        	'price_per_night' => 200
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2011,
        	'max_capacity'=> 2,
        	'beds' => 1,
        	'price_per_night' => 300
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2012,
        	'max_capacity'=> 2,
        	'beds' => 1,
        	'price_per_night' => 200
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2013,
        	'max_capacity'=> 2,
        	'beds' => 1,
        	'price_per_night' => 100
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2014,
        	'max_capacity'=> 2,
        	'beds' => 1,
        	'price_per_night' => 200
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2015,
        	'max_capacity'=> 2,
        	'beds' => 1,
        	'price_per_night' => 300
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2016,
        	'max_capacity'=> 2,
        	'beds' => 1,
        	'price_per_night' => 200
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2017,
        	'max_capacity'=> 2,
        	'beds' => 1,
        	'price_per_night' => 100
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2018,
        	'max_capacity'=> 2,
        	'beds' => 1,
        	'price_per_night' => 200
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2019,
        	'max_capacity'=> 14,
        	'beds' => 2,
        	'price_per_night' => 100
        ]);
        DB::table('rooms')->insert([
        	'room_number' => 2020,
        	'max_capacity'=> 12,
        	'beds' => 6,
        	'price_per_night' => 200
        ]);

    }
}
