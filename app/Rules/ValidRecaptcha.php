<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use GuzzleHttp\Client;
use Helpers;

class ValidRecaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Create http client
        $client = new Client([
            'base_uri' => 'https://google.com/recaptcha/api/'
        ]);

        // Send data to google recaptcha handling
        $response = $client->post('siteverify', [
            'query' => [
                'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                'response' => $value
            ]
        ]);

        // Google reCaptcha return result
        return json_decode($response->getBody())->success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return Helpers::changeLanguage("Please do not click continuously","連続してクリックしないでください");
    }
}
