<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => 'co working name',
        'sort_description' => 'Well there are a few little functions here that may help you. But I\'m not sure what kind of behavior you\'re expecting. You have to decide, for instance, if you are looking for Posts in a category, do you expect to also find Posts in a proper sub-category of that category',
        'date_time' => new DateTime,
        'overview' => 'Well there are a few little functions here that may help you. But I\'m not sure what kind of behavior you\'re expecting. You have to decide, for instance, if you are looking for Posts in a category, do you expect to also find Posts in a proper sub-category of that category',
        'image_link' => '',
        'location' => $faker->address,
        'jp_name' => 'co working jp name',
        'jp_sort_description' => 'Well there are a few little functions here that may help you. But I\'m not sure what kind of behavior you\'re expecting. You have to decide, for instance, if you are looking for Posts in a category, do you expect to also find Posts in a proper sub-category of that category',
        'jp_overview' => 'Well there are a few little functions here that may help you. But I\'m not sure what kind of behavior you\'re expecting. You have to decide, for instance, if you are looking for Posts in a category, do you expect to also find Posts in a proper sub-category of that category',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
