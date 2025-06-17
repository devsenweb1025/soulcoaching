<?php

return [
    'driver' => 'mailchimp',

    'drivers' => [
        'mailchimp' => [
            'apiKey' => env('MAILCHIMP_APIKEY'),
            'serverPrefix' => env('MAILCHIMP_SERVER_PREFIX'),
            'listId' => env('MAILCHIMP_LIST_ID'),
        ],
    ],
];
