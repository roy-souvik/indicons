<?php

return [
    'mode' => env('RAZORPAY_MODE', 'sandbox'),
    'sandbox' => [
        'key_id' => env('RAZORPAY_SANDBOX_KEY_ID', ''),
        'key_secret' => env('RAZORPAY_SANDBOX_KEY_SECRET', ''),
    ],
    'live' => [
        'key_id' => env('RAZORPAY_LIVE_KEY_ID', ''),
        'key_secret' => env('RAZORPAY_LIVE_KEY_SECRET', ''),
    ],
    'currency' => env('RAZORPAY_CURRENCY', 'INR'),
    'checkout_url' => 'https://checkout.razorpay.com/v1/checkout.js',
];
