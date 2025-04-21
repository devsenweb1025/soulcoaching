<?php

namespace App\Helpers;

class CurrencyHelper
{
    /**
     * Format amount as Swiss Franc (CHF)
     *
     * @param float $amount
     * @return string
     */
    public static function formatCHF(float $amount): string
    {
        $fmt = new \NumberFormatter('de_CH', \NumberFormatter::CURRENCY);

        // Format with 2 decimals first
        $fmted = $fmt->formatCurrency($amount, 'CHF');

        // If it's a whole number, remove '.00'
        if (fmod($amount, 1) == 0.0) {
            $fmted = preg_replace('/([,.]00)(?=\s|$)/', '', $fmted);
        }

        return $fmted;
    }

    /**
     * Format amount as Swiss Franc (CHF) with symbol
     *
     * @param float $amount
     * @return string
     */
    public static function formatCHFWithSymbol(float $amount): string
    {
        return self::formatCHF($amount);
    }

    /**
     * Format amount as Swiss Franc (CHF) without symbol
     *
     * @param float $amount
     * @return string
     */
    public static function formatCHFWithoutSymbol(float $amount): string
    {
        $fmt = new \NumberFormatter('de_CH', \NumberFormatter::DECIMAL);
        return $fmt->format($amount);
    }
}
