<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Models\CoWorking;
use Faker\Generator as Faker;

$factory->define(CoWorking::class, function (Faker $faker) {
    return [
        'name' => 'co working name',
        'image_link' => '',
        'overview' => 'Well there are a few little functions here that may help you. But I\'m not sure what kind of behavior you\'re expecting. You have to decide, for instance, if you are looking for Posts in a category, do you expect to also find Posts in a proper sub-category of that category',
        'location' => $faker->address,
        'jp_name' => 'co working jp name',
        'jp_overview' => 'Well there are a few little functions here that may help you. But I\'m not sure what kind of behavior you\'re expecting. You have to decide, for instance, if you are looking for Posts in a category, do you expect to also find Posts in a proper sub-category of that category',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
