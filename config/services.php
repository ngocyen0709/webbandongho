<?php

return [
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '849637096399679',
        'client_secret' => 'd78bdede844799c67f6185a46ec79e80', 
        'redirect' => 'http://localhost/shopbanhangdientu/quanli/callback' 
    ],
    'google' => [
        'client_id' => '908049240557-nelr6rvat7m65432rnmd3fccm4s5nguh.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost/shopbanhangdientu/google/callback'
    ],

];
