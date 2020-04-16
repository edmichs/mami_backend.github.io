<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Commande;
use Faker\Generator as Faker;

$factory->define(Commande::class, function (Faker $faker) {

    return [
        'client_id' => $faker->randomDigitNotNull,
        'product_id' => $faker->randomDigitNotNull,
        'prix_unit' => $faker->randomDigitNotNull,
        'nombre_total' => $faker->randomDigitNotNull,
        'numerp_commande' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
