<?php

if (!function_exists('currencySymbol')) {
    function currencySymbol(string $currency): string
    {
        $symbols = [
            'INR' => '₹',
            'USD' => '$',
            'EUR' => '€',
            'GBP' => '£',
        ];

        return $symbols[strtoupper($currency)] ?? $currency;
    }
}
