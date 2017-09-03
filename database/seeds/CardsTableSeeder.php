<?php

use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('cards')->insert([
        	'access'  => '1',	
        	'user_id'  => '4',	
        ]);

        DB::table('cards')->insert([
        	'access'  => '2',	
        	'user_id'  => '5',
        ]);

        DB::table('cards')->insert([
        	'access'  => '3',	
        	'user_id'  => '6',
        ]);

        DB::table('cards')->insert([
        	'access'  => '4',	
        	'user_id'  => '7',
        ]);
    }
}
