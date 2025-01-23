<?php
if (!function_exists('formatCurrency')) {
    function formatCurrency($amount, $currency = 'RUB')
    {
        $format = new NumberFormatter(app()->getLocale(), NumberFormatter::CURRENCY);

        return $format->formatCurrency($amount, $currency);
    }
}

if (!function_exists('formatPrice')) {
    function formatPrice($amount, $unit = 'руб./шт')
    {
        $amount = number_format((float)$amount, 2, ',', ' ');
        $amount = str_replace(',00', '', $amount);

        if (!empty($unit)) {
            $amount .= ' ' . $unit;
        }

        return $amount;
    }
}