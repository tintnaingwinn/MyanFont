<?php


namespace Tintnaingwin\MyanFont;

use Googlei18n\MyanmarTools\ZawgyiDetector;
use Rabbit;

class MyanFont
{
    /**
     * Convert zawgyi input to unicode.
     *
     * @param $zawgyi_input
     * @return string
     * @throws \Exception
     * @author TintNaingWin
     */
    public static function zg2uni(string $zawgyi_input): string
    {
        $font = self::ZgOrUni($zawgyi_input);

        if($font == "ZawGyi") {
            return Rabbit::zg2uni($zawgyi_input);
        }else {
            return $zawgyi_input;
        }
    }

    /**
     * Convert unicode input to zawgyi.
     *
     * @param $unicode_input
     * @return string
     * @throws \Exception
     * @author TintNaingWin
     */
    public static function uni2zg(string $unicode_input): string
    {
        $font = self::ZgOrUni($unicode_input);

        if($font == "Unicode") {
            return Rabbit::uni2zg($unicode_input);
        }else{
            return $unicode_input;
        }
    }

    /**
     * @param $value
     * @return string
     * @author TintNaingWin
     * @throws \Exception
     */
    public static function checkFont(string $value): string
    {
        $font = self::ZgOrUni($value);
        return $font;
    }

    /**
     * Score is 1.0 (The input is definitely Zawgyi)
     * Score is 0.0 (The input is definitely Unicode).
     *
     * @param $input
     * @return string
     * @throws \Exception
     * @author TintNaingWin
     */
    protected static function ZgOrUni(string $input): string
    {
        $input_length = strlen($input);

        $zawgyi_score = $input_length < 15 ? 0.999 : 0.995;
        $unicode_score = $input_length < 15 ? 0.001 : 0.005;

        $detector = new ZawgyiDetector();

        try {
            $score = $detector->getZawgyiProbability($input);
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