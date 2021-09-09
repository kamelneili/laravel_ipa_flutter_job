<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Manager;
use App\Model;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;


$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' =>  $this->faker->name,
        'email' =>  $this->faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
      //  'api_token' => bin2hex( openssl_random_pseudo_bytes( 30 ) ),
        'remember_token' => Str::random(10),
        //'avatar'    =>  $this->faker->imageUrl( 150 , 150 ),
    ];
});
