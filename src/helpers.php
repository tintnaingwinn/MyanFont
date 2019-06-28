<?php

use Tintnaingwin\MyanFont\MyanFont;

if (!function_exists('zg2uni')) {
    /**
     * Convert zawgyi text to unicode.
     *
     * @param string $text
     *
     * @throws \Exception
     *
     * @return string
     *
     * @author Tint Naing Win <tnwdeveloper@gmail.com>
     */
    function zg2uni($text = '', $myanmar_tools = null)
    {
        return MyanFont::zg2uni($text, $myanmar_tools);
    }
}

if (!function_exists('uni2zg')) {
    /**
     * Convert unicode text to zawgyi.
     *
     * @param string $text
     *
     * @throws \Exception
     *
     * @return string
     *
     * @author Tint Naing Win <tnwdeveloper@gmail.com>
     */
    function uni2zg($text = '', $myanmar_tools = null)
    {
        return MyanFont::uni2zg($text, $myanmar_tools);
    }
}

if (!function_exists('isZgOrUni')) {
    /**
     * Check Zawgyi Font or Unicode Font.
     *
     * @param string $text
     *
     * @throws \Exception
     *
     * @return string
     *
     * @author Tint Naing Win <tnwdeveloper@gmail.com>
     */
    function isZgOrUni($text = '', $myanmartools = null)
    {
        return MyanFont::isZgOrUni($text, $myanmartools);
    }
}
