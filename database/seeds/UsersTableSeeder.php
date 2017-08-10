<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Jean Luc Picard',
        	'email' => 'jlp@enterprise.com',
        	'password' => bcrypt('JLPipes'),
        	'category' => 'Administrator'
        ]);

        DB::table('users')->insert([
        	'name' => 'Worf, son of Mogh',
        	'email' => 'worf@enterprise.com',
        	'password' => bcrypt('klest'),
        	'category' => 'Housekeeping'
        ]);

        DB::table('users')->insert([
        	'name' => 'Riker William T',
        	'email' => 'riker@enterprise.com',
        	'password' => bcrypt('holodeck'),
        	'category' => 'Reception'
        ]);

        DB::table('users')->insert([
        	'name' => 'Data',
        	'email' => 'data@enterprise.com',
        	'password' => bcrypt('spot'),
        	'category' => 'Patron'
        ]);

        DB::table('users')->insert([
        	'name' => 'Geordie LaForge',
        	'email' => 'glasses@enterprise.com',
        	'password' => bcrypt('leah'),
        	'category' => 'Patron'
        ]);

        DB::table('users')->insert([
        	'name' => 'Deanna Troi',
        	'email' => 'troi@enterprise.com',
        	'password' => bcrypt('imzadi'),
        	'category' => 'Patron'
        ]);

        DB::table('users')->insert([
        	'name' => 'Beverly Crusher',
        	'email' => 'crusher@enterprise.com',
        	'password' => bcrypt('shutupwesley'),
        	'category' => 'Patron'
        ]);

        DB::table('users')->insert([
        	'name' => 'Wesley Crusher',
        	'email' => 'wez@enterprise.com',
        	'password' => bcrypt('ilovetraveller'),
        	'category' => 'Patron'
        ]);

        DB::table('users')->insert([
        	'name' => 'Miles O\'Brien',
        	'email' => 'obrien@enterprise.com',
        	'password' => bcrypt('chief'),
        	'category' => 'Patron'
        ]);

        DB::table('users')->insert([
        	'name' => 'Ro Laren',
        	'email' => 'bajor@enterprise.com',
        	'password' => bcrypt('marquis'),
        	'category' => 'Patron'
        ]);

        DB::table('users')->insert([
        	'name' => 'Alyssa Ogawa',
        	'email' => 'ogawa@enterprise.com',
        	'password' => bcrypt('nolines'),
        	'category' => 'Patron'
        ]);


        DB::table('users')->insert([
        	'name' => 'Keiko O\'Brien',
        	'email' => 'keiko@enterprise.com',
        	'password' => bcrypt('plants'),
        	'category' => 'Patron'
        ]);

        DB::table('users')->insert([
        	'name' => 'Q',
        	'email' => 'q@continuum.biz',
        	'password' => bcrypt('lame'),
        	'category' => 'Patron'
        ]);


        DB::table('users')->insert([
        	'name' => 'Tasha Yar',
        	'email' => 'yar@enterprise.com',
        	'password' => bcrypt('lefttheshowlol'),
        	'category' => 'Patron'
        ]);

        DB::table('users')->insert([
        	'name' => 'Guinan',
        	'email' => 'guinan@10fwd.com',
        	'password' => bcrypt('booze'),
        	'category' => 'Patron'
        ]);

        DB::table('users')->insert([
        	'name' => 'Lwaxana Troi',
        	'email' => 'troi@betazed.gov',
        	'password' => bcrypt('ambassador'),
        	'category' => 'Patron'
        ]);

        DB::table('users')->insert([
        	'name' => 'Alexander Rozhenko',
        	'email' => 'shitkid@enterprise.com',
        	'password' => bcrypt('shitkid'),
        	'category' => 'Patron'
        ]);
    }
}
