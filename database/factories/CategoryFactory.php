<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */



use App\Models\Web;
use App\Models\Web\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => 'test',
        'position' => 0,
        'jp_name' => 'test jp',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
