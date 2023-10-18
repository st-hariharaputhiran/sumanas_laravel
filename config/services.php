<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '909077627050-nggpbpsbh028mho2h41667te3ek8og02.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:80/laravel_ten_features/public/authorized/google/callback',
    ],
    'facebook' => [
        'client_id' => '735519938383727',
        'client_secret' => '7c6208d1bbc7a2c04d6539fded0ee2ec',
        'redirect' => 'http://localhost:80/laravel_ten_features/public/auth/facebook/callback',
    ],

];
