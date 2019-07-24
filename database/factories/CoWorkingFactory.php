<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Web;
use App\Models\Web\CoWorking;
use Faker\Generator as Faker;

$factory->define(CoWorking::class, function (Faker $faker) {
    return [
        'name' => 'co working name',
        'image_link' => '',
        'overview' => 'Well there are a few little functions here that may help you. But I\'m not sure what kind of behavior you\'re expecting. You have to decide, for instance, if you are looking for Posts in a category, do you expect to also find Posts in a proper sub-category of that category',
        'location' => '["Duy Tan University","100 Quang Trung","Da Nang"]',
        'jp_name' => 'co working jp name JP',
        'jp_overview' => 'Well there are a few little functions here that may help you. But I\'m not sure what kind of behavior you\'re expecting. You have to decide, for instance, if you are looking for Posts in a category, do you expect to also find Posts in a proper sub-category of that category JP',
        'jp_location' => '["Duy Tan University JP","100 Quang Trung JP","Da Nang JP"]',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
