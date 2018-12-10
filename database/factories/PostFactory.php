<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'author_id' => 1,
        'title'     => $faker->sentence(rand(8, 12)),
        'slug'      => $faker->slug(),
        'body'      => $faker->paragraphs(rand(10, 15), true)
    ];
});
