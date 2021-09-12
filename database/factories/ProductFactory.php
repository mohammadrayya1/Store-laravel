<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $name=$this->faker->words(3,true);
    return [
        'vendor_id'=>\App\Models\Vendor::inRandomOrder()->first()->vendor_id,
        'category_id'=>\App\Models\Category::inRandomOrder()->first()->id,
        'name'=>$name,
        'description'=>$this->faker->words(100,true),
        'slug'=>Str::slug($name),
        'price'=>$this->faker->numberbetween(50,500),
        'image'=>$this->faker->imageUrl(),

    ];
});
