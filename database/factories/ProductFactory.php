<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

//faker : données d'exemples et aléatoire pour montrer au client ce que ça donne
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->paragraph(),
        'price' => $faker->numberBetween(1,100),
        'reference' => $faker->ean8(),
        'size_id' => rand(1,6),
        'categorie_id' => rand(1,2)
    ];
});
