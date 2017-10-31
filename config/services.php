<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '305981443204613',
        'client_secret' => 'deafd3f6c7a778b7b363458ffc98ae4b',
        'redirect' => 'http://localhost:8000/callback',
    ],

    'google' => [
        'client_id' => '38520541466-r8okdb4kl2ds162i81daa6ij02c85csh.apps.googleusercontent.com',
        'client_secret' => 'GaSzS0mPNIqYFgw3izer0vZy',
        'redirect' => 'http://localhost:8000/callbackG',


    ],

];
