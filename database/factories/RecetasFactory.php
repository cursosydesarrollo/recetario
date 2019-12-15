<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Receta;
use App\User;
use Faker\Generator as Faker;

$factory->define(Receta::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence,
        'descripcion' => $faker->text(300),
        'user_id' => factory(User::class)->create()->id,
    ];
});
