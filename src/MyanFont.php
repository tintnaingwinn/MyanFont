<?php


namespace Tintnaingwin\MyanFont;

use Googlei18n\MyanmarTools\ZawgyiDetector;
use Rabbit;
use Exception;

class MyanFont
{
    /**
     * Convert zawgyi text to unicode.
     *
     * @param $text
     * @return string
     * @throws \Exception
     * @author TintNaingWin
     */
    public static function zg2uni($text, $myanmar_tools = null)
    {
        if (is_null($text) || $text === '') {
            return '';
        }

        $font = self::isZgOrUni($text, $myanmar_tools);

        if($font === 'zawgyi') {
            return Rabbit::zg2uni($text);
        }

        return $text;
    }

    /**
     * Convert unicode text to zawgyi.
     *
     * @param $text
     * @return string
     * @throws \Exception
     * @author TintNaingWin
     */
    public static function uni2zg($text, $myanmar_tools = null)
    {
        if (is_null($text) || $text === '') {
            return '';
        }

        $font = self::isZgOrUni($text, $myanmar_tools);

        if($font === 'unicode') {
            return Rabbit::uni2zg($text);
        }

        return $text;
    }

    /**
     * Check Zawgyi Font or Unicode Font
     * Score is 1.0 (The input is definitely Zawgyi)
     * Score is 0.0 (The input is definitely Unicode).
     *
     * @param $text
     * @return string
     * @throws Exception
     * @author TintNaingWin
     */
    public static function isZgOrUni($text, $myanmar_tools = null)
    {
        $myanmar_tools = is_null($myanmar_tools) ? config('myanfont.myanmar_tools.enabled') : $myanmar_tools;

        if (is_null($text) || $text === '') {
            return 'unicode';
        }

        if ($myanmar_tools) {
            $zawgyi_score = config('myanfont.myanmar_tools.zawgyi_score');
            $unicode_score = config('myanfont.myanmar_tools.unicode_score');

            $detector = new ZawgyiDetector();

            try {
                $score = $detector->getZawgyiProbability($text);
            } catch (Exception $exception) {
                return $exception;
            }

            if($score < $unicode_score) {
                return "unicode";
            } elseif ($score > $zawgyi_score) {
                return "zawgyi";
            }

        } else {
            $zgPattern = "/[\x{105a}\x{1060}-\x{1097}]|[\x{1033}\x{1034}]|\x{1031}\x{108f}|\x{1031}[\x{103b}-\x{103e}]|[\x{102b}-\x{1030}\x{1032}]\x{1031}| \x{1031}| \x{103b}|^\x{1031}|^\x{103b}|\x{1038}\x{103b}|\x{1038}\x{1031}|[\x{102d}\x{102e}\x{1032}]\x{103b}|\x{1039}[^\x{1000}-\x{1021}]|\x{1039}$|\x{1004}\x{1039}[\x{1001}-\x{102a}\x{103f}\x{104e}]|\x{1039}[^u1000}-\x{102a}\x{103f}\x{104e}]|\x{103c}\x{103b}|\x{103d}\x{103b}|\x{103e}\x{103b}|\x{103d}\x{103c}|\x{103e}\x{103c}|\x{103e}\x{103d}|\x{103b}\x{103c}|[\x{102f}\x{1030}\x{102b}\x{102c}][\x{102d}\x{102e}\x{1032}]|[\x{102b}\x{102c}][\x{102f}\x{102c}]|[\x{1040}-\x{1049}][\x{102b}-\x{103e}\x{102b}-\x{1030}\x{1032}\x{1036}\x{1037}\x{1038}\x{103a}]|^[\x{1040}\x{1047}][^\x{1040}-\x{1049}]|[\x{1000}-\x{102a}\x{103f}\x{104e}]\x{1039}[\x{101a}\x{101b}\x{101d}\x{101f}\x{1022}-\x{103f}]|\x{103a}\x{103e}|\x{1036}\x{102b}]|\x{102d}[\x{102e}\x{1032}]|\x{102e}[\x{102d}\x{1032}]|\x{1032}[\x{102d}\x{102e}]|\x{102f}\x{1030}|\x{1030}\x{102f}|\x{102b}\x{102c}|\x{102c}\x{102b}|[\x{1090}-\x{1099}][\x{102b}-\x{1030}\x{1032}\x{1037}\x{103a}-\x{103e}]|[\x{1000}-\x{10f4}][\x{1090}-\x{1099}][\x{1000}-\x{104f}]|^[\x{1090}-\x{1099}][\x{1000}-\x{102a}\x{103f}\x{104e}\x{104a}\x{104b}]|[\x{1000}-\x{104f}][\x{1090}-\x{1099}]$|[\x{105e}-\x{1060}\x{1062}-\x{1064}\x{1067}-\x{106d}\x{1071}-\x{1074}\x{1082}-\x{108d}\x{108f}\x{109a}-\x{109d}][\x{102b}-\x{103e}]|[\x{1000}-\x{102a}]\x{103a}[\x{102d}\x{102e}\x{1032}]|[\x{102b}-\x{1030}\x{1032}\x{1036}-\x{1038}\x{103a}]\x{1031}|[\x{1087}-\x{108d}][\x{106e}-\x{1070}\x{1072}-\x{1074}]|^[\x{105e}-\x{1060}\x{1062}-\x{1064}\x{1067}-\x{106d}\x{1071}-\x{1074}\x{1082}-\x{108d}\x{108f}\x{109a}-\x{109d}]|[\x{0020}\x{104a}\x{104b}][\x{105e}-\x{1060}\x{1062}-\x{1064}\x{1067}-\x{106d}\x{1071}-\x{1074}\x{1082}-\x{108d}\x{108f}\x{109a}-\x{109d}]|[\x{1036}\x{103a}][\x{102d}-\x{1030}\x{1032}]|[\x{1025}\x{100a}]\x{1039}|[\x{108e}-\x{108f}][\x{1050}-\x{108d}]|\x{102d}-\x{1030}\x{1032}\x{1036}-\x{1037}]\x{1039}]|[\x{1000}-\x{102a}\x{103f}\x{104e}]\x{1037}\x{1039}|[\x{1000}-\x{102a}\x{103f}\x{104e}]\x{102c}\x{1039}[\x{1000}-\x{102a}\x{103f}\x{104e}]|[\x{102b}-\x{1030}\x{1032}][\x{103b}-\x{103e}]|\x{1032}[\x{103b}-\x{103e}]|\x{101b}\x{103c}|[\x{1000}-\x{102a}\x{103f}\x{104e}]\x{1039}[\x{1000}-\x{102a}\x{103f}\x{104e}]\x{1039}[\x{1000}-\x{102a}\x{103f}\x{104e}]|[\x{1000}-\x{102a}\x{103f}\x{104e}]\x{1039}[\x{1000}-\x{102a}\x{103f}\x{104e}][\x{102b}\x{1032}\x{103d}]|[\x{1000}\x{1005}\x{100f}\x{1010}\x{1012}\x{1014}\x{1015}\x{1019}\x{101a}]\x{1039}\x{1021}|[\x{1000}\x{1010}]\x{1039}\x{1019}|\x{1004}\x{1039}\x{1000}|\x{1015}\x{1039}[\x{101a}\x{101e}]|\x{1000}\x{1039}\x{1001}\x{1036}|\x{1039}\x{1011}\x{1032}|\x{1037}\x{1032}|\x{1036}\x{103b}|\x{102f}\x{102f}/u";

            if (preg_match($zgPattern, $text)) {
                return "zawgyi";
            }else {
                return "unicode";
            }
        }


    }
}
