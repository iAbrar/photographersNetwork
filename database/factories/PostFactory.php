<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
      'user_id' => 1,
      'caption' => $faker->text(100) ,
      'image' => 'uploads/6jlZxXsLhjrHDv1Pk6276XX9D8uHEY4vUj7eVeHt.jpeg', // static image
    ];
});
