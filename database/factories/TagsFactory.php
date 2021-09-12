<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tag;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $name=$this->faker->SafecolorName;
    return [

        "name"=>$name,
        'slug'=>Str::slug($name)
    ];
});
