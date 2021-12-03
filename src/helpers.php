<?php

use Tintnaingwin\MyanFont\Facades\MyanFont;

if (!function_exists('zg2uni')) {
    /**
     * Convert text zawgyi to unicode.
     *
     * @param string|null $text
     *
     * @return string|null
     */
    function zg2uni(?string $text = ''): ?string
    {
        return MyanFont::zg2uni($text);
    }
}

if (!function_exists('uni2zg')) {
    /**
     * Convert text unicode to zawgyi.
     *
     * @param string|null $text
     *
     * @return string|null
     */
    function uni2zg(?string $text = ''): ?string
    {
        return MyanFont::uni2zg($text);
    }
}

if (!function_exists('isZgOrUni')) {
    /**
     * Determine the font unicode or zawgyi.
     *
     * @param string|null $text
     *
     * @return string
     */
    function isZgOrUni(?string $text = ''): string
    {
        return MyanFont::isZgOrUni($text);
    }
}

if (!function_exists('isUnicode')) {
    /**
     * Check the font unicode or not.
     *
     * @param string $text
     *
     * @return bool
     */
    function isUnicode(string $text = ''): bool
    {
        return MyanFont::isUnicode($text);
    }
}

if (!function_exists('isZawgyi')) {
    /**
     * Check the font zawgyi or not.
     *
     * @param string $text
     *
     * @return bool
     */
    function isZawgyi(string $text = ''): bool
    {
        return MyanFont::isZawGyi($text);
    }
}
