<?php

namespace Tintnaingwin\MyanFont;

use Exception;
use Googlei18n\MyanmarTools\ZawgyiDetector;
use Rabbit;

class MyanFont
{
    const ZAWGYI = 'ZawGyi';

    const UNICODE = 'Unicode';

    const MYANMAR = 'Myanmar';

    const NOT_MYANMAR = 'NotMyanmar';

    /**
     * Convert text zawgyi to unicode.
     *
     * @param string $text
     *
     * @return string
     */
    public static function zg2uni($text)
    {
        if (self::isEmptyString($text)) {
            return '';
        }

        $font = self::ZgOrUni($text);

        if ($font === self::ZAWGYI) {
            return Rabbit::zg2uni($text);
        }

        return $text;
    }

    /**
     * Convert text unicode to zawgyi.
     *
     * @param string $text
     *
     * @return string
     */
    public static function uni2zg($text)
    {
        if (self::isEmptyString($text)) {
            return '';
        }

        $font = self::ZgOrUni($text);

        if ($font === self::UNICODE) {
            return Rabbit::uni2zg($text);
        }

        return $text;
    }

    /**
     * Determine the font zawgyi or unicode.
     *
     * @param string $text
     *
     * @return string
     */
    public static function checkFont($text)
    {
        if (self::isEmptyString($text)) {
            return self::UNICODE;
        }

        return self::ZgOrUni($text);
    }

    /**
     * Determine the font zawgyi or unicode.
     *
     * @param string $text
     *
     * @return string
     */
    public static function isZgOrUni($text)
    {
        if (self::isEmptyString($text)) {
            return self::UNICODE;
        }

        return self::ZgOrUni($text);
    }

    /**
     * Score is 1.0 (The input is definitely Zawgyi)
     * Score is 0.0 (The input is definitely Unicode).
     *
     * @param string $text
     *
     * @return string
     */
    protected static function ZgOrUni($text)
    {
        $input_length = strlen($text);

        $zawgyi_score = $input_length < 15 ? 0.999 : 0.995;
        $unicode_score = $input_length < 15 ? 0.001 : 0.005;

        try {
            $detector = new ZawgyiDetector();
            $score = $detector->getZawgyiProbability($text);
        } catch (Exception $e) {
            report($e);
        }

        if ($score < $unicode_score) {
            return self::UNICODE;
        } elseif ($score > $zawgyi_score) {
            return self::ZAWGYI;
        } elseif ($score === INF) {
            return self::NOT_MYANMAR;
        } else {
            return self::UNICODE;
        }
    }

    /**
     * Determine if the text is empty.
     *
     * @param string $text
     *
     * @return bool
     */
    protected static function isEmptyString($text)
    {
        return is_null($text) || $text === '';
    }
}
