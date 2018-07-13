<?php


namespace Tintnaingwin\MyanFont;

use Googlei18n\MyanmarTools\ZawgyiDetector;
use Rabbit;

class MyanFont
{
    /**
     * Convert zawgyi text to unicode.
     *
     * @param $zawgyi_text
     * @return string
     * @throws \Exception
     * @author TintNaingWin
     */
    public static function zg2uni($zawgyi_text)
    {
        if (is_null($zawgyi_text)) {
            $zawgyi_text = '';
        }

        $font = self::ZgOrUni($zawgyi_text);

        if($font == 'ZawGyi') {
            return Rabbit::zg2uni($zawgyi_text);
        }

        return $zawgyi_text;
    }

    /**
     * Convert unicode text to zawgyi.
     *
     * @param $unicode_text
     * @return string
     * @throws \Exception
     * @author TintNaingWin
     */
    public static function uni2zg($unicode_text)
    {
        if (is_null($unicode_text)) {
            $unicode_text = '';
        }

        $font = self::ZgOrUni($unicode_text);

        if($font == 'Unicode') {
            return Rabbit::uni2zg($unicode_text);
        }

        return $unicode_text;
    }

    /**
     * @param $text
     * @return string
     * @author TintNaingWin
     * @throws \Exception
     */
    public static function checkFont($text)
    {
        if (is_null($text)) {
            $text = '';
        }

        $font = self::ZgOrUni($text);
        return $font;
    }

    /**
     * Score is 1.0 (The input is definitely Zawgyi)
     * Score is 0.0 (The input is definitely Unicode).
     *
     * @param $text
     * @return string
     * @throws \Exception
     * @author TintNaingWin
     */
    protected static function ZgOrUni($text)
    {
        $input_length = strlen($text);

        $zawgyi_score = $input_length < 15 ? 0.999 : 0.995;
        $unicode_score = $input_length < 15 ? 0.001 : 0.005;

        $detector = new ZawgyiDetector();

        try {
            $score = $detector->getZawgyiProbability($text);
        } catch (\Exception $exception) {
            return $exception;
        }

        if($score < $unicode_score) {
            return "Unicode";
        } elseif ($score > $zawgyi_score) {
            return "ZawGyi";
        }elseif ($score === INF) {
            return "NotMyanmar";
        }else {
            return "Unicode";
        }
    }
}