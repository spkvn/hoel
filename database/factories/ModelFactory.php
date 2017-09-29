<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' 			 => $faker->name,
        'email' 		 => $faker->unique()->safeEmail,
        'password' 		 => $password ?: $password = bcrypt('secret'),
        'category'		 => 'Patron',
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Room::class, function (Faker\Generator $faker) {
    return [
        'room_number' 	  => $faker->randomNumber(4,false),
        'beds' 		  	  => $faker->randomNumber(1),
        'max_capacity' 	  => $faker->randomNumber(1),
        'price_per_night' => $faker->randomNumber(3,false)
    ];
});

$factory->define(App\Booking::class, function(Faker\Generator $faker){
	return[
		'user_id'  => $faker->randomNumber(),
		'room_id'  => $faker->randomNumber(),
		'check_in' => $faker->date('Y-m-d','yesterday'),
		'check_out'=> $faker->date('Y-m-d','tomorrow')
	];
});

$factory->define(App\Card::class, function (Faker\Generator $faker){
    return[
        'access'  => $faker->randomNumber(),
        'user_id' => $faker->randomNumber()
    ];
});