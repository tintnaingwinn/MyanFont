<?php

use Tintnaingwin\MyanFont\Facades\MyanFont;

if (! function_exists('zg2uni')) {
    /**
     * Convert text zawgyi to unicode.
     *
     * @param string $text
     * @return string
     */
    function zg2uni($text = '', $myanmar_tools = null)
    {
        return MyanFont::zg2uni($text, $myanmar_tools);
    }
}

if (! function_exists('uni2zg')) {
    /**
     * Convert text unicode to zawgyi.
     *
     * @param string $text
     * @return string
     */
    function uni2zg($text = '', $myanmar_tools = null)
    {
        return MyanFont::uni2zg($text, $myanmar_tools);
    }
}

if (! function_exists('isZgOrUni')) {
    /**
     * Determine the font zawgyi or unicode.
     *
     * @param string $text
     * @return string
     */
    function isZgOrUni($text = '', $myanmartools = null)
    {
        return MyanFont::isZgOrUni($text, $myanmartools);
    }
}
