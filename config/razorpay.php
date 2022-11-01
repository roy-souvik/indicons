<?php

return [
    'mode' => env('RAZORPAY_MODE', 'sandbox'),
    'sandbox' => [
        'key_id' => env('RAZORPAY_SANDBOX_KEY_ID', ''),
        'key_secret' => env('RAZORPAY_SANDBOX_KEY_SECRET', ''),
    ],
    'live' => [
        'key_id' => env('RAZORPAY_LIVE_KEY_ID', ''),
        'key_secret'     => env('RAZORPAY_LIVE_KEY_SECRET', ''),
    ],
    'currency' => env('RAZORPAY_CURRENCY', 'INR'),
    'notify_url' => env('RAZORPAY_NOTIFY_URL', ''), // Change this accordingly for your application.
    'locale' => env('RAZORPAY_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
];
