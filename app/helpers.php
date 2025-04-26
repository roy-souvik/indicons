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

if (!function_exists('addGst')) {
    function addGst($amount, $gstPercent = 18): int
    {
        return $amount + (($amount * $gstPercent) / 100);
    }
}

