<?php

namespace Tintnaingwin\MyanFont;

class MyanFont
{
    const ZAWGYI = 'ZawGyi';

    const UNICODE = 'Unicode';

    const MYANMAR = 'Myanmar';

    const NOT_MYANMAR = 'NotMyanmar';

    /**
     * @param string $text
     *
     * @return string
     */
    public static function zg2uni($text = '')
    {
        if (self::isEmptyString($text)) {
            return $text;
        }

        $font = self::ZgOrUni($text);

        if ($font === self::ZAWGYI || $font === self::MYANMAR) {
            $rule = json_decode(file_get_contents(__DIR__.'/json/zg2uni.json'), true);

            return self::replaceWithRule($rule, $text);
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
            return $text;
        }

        $font = self::ZgOrUni($text);

        if ($font === self::UNICODE) {
            $rule = json_decode("[ { \"from\": \"\u1004\u103a\u1039\", \"to\": \"\u1064\" }, { \"from\": \"\u1039\u1010\u103d\", \"to\": \"\u1096\" }, { \"from\": \"\u102b\u103a\", \"to\": \"\u105a\" }, { \"from\": \"\u100b\u1039\u100c\", \"to\": \"\u1092\" }, { \"from\": \"\u102d\u1036\", \"to\": \"\u108e\" }, { \"from\": \"\u104e\u1004\u103a\u1038\", \"to\": \"\u104e\" }, { \"from\": \"[\u1025\u1009](?=[\u1039\u102f\u1030])\", \"to\": \"\u106a\" }, { \"from\": \"[\u1025\u1009](?=[\u1037]?[\u103a])\", \"to\": \"\u1025\" }, { \"from\": \"\u100a(?=[\u1039\u103d])\", \"to\": \"\u106b\" }, { \"from\": \"(\u1039[\u1000-\u1021])(\u102D){0,1}\u102f\", \"to\": \"$1$2\u1033\" }, { \"from\": \"(\u1039[\u1000-\u1021])\u1030\", \"to\": \"$1\u1034\" }, { \"from\": \"\u1014(?=[\u102d\u102e]?[\u1030\u103d\u103e\u102f\u1039])\", \"to\": \"\u108f\" }, { \"from\" : \"\u1014\u103c\", \"to\" : \"\u108f\u103c\" }, { \"from\": \"\u1039\u1000\", \"to\": \"\u1060\" }, { \"from\": \"\u1039\u1001\", \"to\": \"\u1061\" }, { \"from\": \"\u1039\u1002\", \"to\": \"\u1062\" }, { \"from\": \"\u1039\u1003\", \"to\": \"\u1063\" }, { \"from\": \"\u1039\u1005\", \"to\": \"\u1065\" }, { \"from\": \"\u1039\u1006\", \"to\": \"\u1066\" }, { \"from\": \"\u1039\u1007\", \"to\": \"\u1068\" }, { \"from\": \"\u1039\u1008\", \"to\": \"\u1069\" }, { \"from\": \"\u1039\u100b\", \"to\": \"\u106c\" }, { \"from\": \"\u1039\u100c\", \"to\": \"\u106d\" }, { \"from\": \"\u100d\u1039\u100d\", \"to\": \"\u106e\" }, { \"from\": \"\u100e\u1039\u100d\", \"to\": \"\u106f\" }, { \"from\": \"\u1039\u100f\", \"to\": \"\u1070\" }, { \"from\": \"\u1039\u1010\", \"to\": \"\u1071\" }, { \"from\": \"\u1039\u1011\", \"to\": \"\u1073\" }, { \"from\": \"\u1039\u1012\", \"to\": \"\u1075\" }, { \"from\": \"\u1039\u1013\", \"to\": \"\u1076\" }, { \"from\": \"\u1039[\u1014\u108f]\", \"to\": \"\u1077\" }, { \"from\": \"\u1039\u1015\", \"to\": \"\u1078\" }, { \"from\": \"\u1039\u1016\", \"to\": \"\u1079\" }, { \"from\": \"\u1039\u1017\", \"to\": \"\u107a\" }, { \"from\": \"\u1039\u1018\", \"to\": \"\u107b\" }, { \"from\": \"\u1039\u1019\", \"to\": \"\u107c\" }, { \"from\": \"\u1039\u101c\", \"to\": \"\u1085\" }, { \"from\": \"\u103f\", \"to\": \"\u1086\" }, { \"from\": \"\u103d\u103e\", \"to\": \"\u108a\" }, { \"from\": \"(\u1064)([\u1000-\u1021])([\u103b\u103c]?)\u102d\", \"to\": \"$2$3\u108b\" }, { \"from\": \"(\u1064)([\u1000-\u1021])([\u103b\u103c]?)\u102e\", \"to\": \"$2$3\u108c\" }, { \"from\": \"(\u1064)([\u1000-\u1021])([\u103b\u103c]?)\u1036\", \"to\": \"$2$3\u108d\" }, { \"from\": \"(\u1064)([\u1000-\u1021])([\u103b\u103c]?)([\u1031]?)\", \"to\": \"$2$3$4$1\" }, { \"from\": \"\u101b(?=([\u102d\u102e]?)[\u102f\u1030\u103d\u108a])\", \"to\": \"\u1090\" }, { \"from\": \"\u100f\u1039\u100d\", \"to\": \"\u1091\" }, { \"from\": \"\u100b\u1039\u100b\", \"to\": \"\u1097\" }, { \"from\": \"([\u1000-\u1021\u108f\u1029\u1090])([\u1060-\u1069\u106c\u106d\u1070-\u107c\u1085\u108a])?([\u103b-\u103e]*)?\u1031\", \"to\": \"\u1031$1$2$3\" }, { \"from\": \"\u103c\u103e\", \"to\": \"\u103c\u1087\" }, { \"from\": \"([\u1000-\u1021\u108f\u1029])([\u1060-\u1069\u106c\u106d\u1070-\u107c\u1085])?(\u103c)\", \"to\": \"$3$1$2\" }, { \"from\": \"\u103a\", \"to\": \"\u1039\" }, { \"from\": \"\u103b\", \"to\": \"\u103a\" }, { \"from\": \"\u103c\", \"to\": \"\u103b\" }, { \"from\": \"\u103d\", \"to\": \"\u103c\" }, { \"from\": \"\u103e\", \"to\": \"\u103d\" }, { \"from\": \"([^\u103a\u100a])\u103d([\u102d\u102e]?)\u102f\", \"to\": \"$1\u1088$2\" }, { \"from\": \"([\u101b\u103a\u103c\u108a\u1088\u1090])([\u1030\u103d])?([\u1032\u1036\u1039\u102d\u102e\u108b\u108c\u108d\u108e]?)(\u102f)?\u1037\", \"to\": \"$1$2$3$4\u1095\" }, { \"from\": \"([\u102f\u1014\u1030\u103d])([\u1032\u1036\u1039\u102d\u102e\u108b\u108c\u108d\u108e]?)\u1037\", \"to\": \"$1$2\u1094\" }, { \"from\": \"([\u103b])([\u1000-\u1021])([\u1087]?)([\u1036\u102d\u102e\u108b\u108c\u108d\u108e]?)\u102f\", \"to\": \"$1$2$3$4\u1033\" }, { \"from\": \"([\u103b])([\u1000-\u1021])([\u1087]?)([\u1036\u102d\u102e\u108b\u108c\u108d\u108e]?)\u1030\", \"to\": \"$1$2$3$4\u1034\" }, { \"from\": \"([\u103a\u103c\u100a\u1020\u1025])([\u103d]?)([\u1036\u102d\u102e\u108b\u108c\u108d\u108e]?)\u102f\", \"to\": \"$1$2$3\u1033\" }, { \"from\": \"([\u103a\u103c\u100a\u101b])(\u103d?)([\u1036\u102d\u102e\u108b\u108c\u108d\u108e]?)\u1030\", \"to\": \"$1$2$3\u1034\" }, { \"from\": \"\u100a\u103d\", \"to\": \"\u100a\u1087\" }, { \"from\": \"\u103d\u1030\", \"to\": \"\u1089\" }, { \"from\": \"\u103b([\u1000\u1003\u1006\u100f\u1010\u1011\u1018\u101a\u101c\u101a\u101e\u101f])\", \"to\": \"\u107e$1\" }, { \"from\": \"\u107e([\u1000\u1003\u1006\u100f\u1010\u1011\u1018\u101a\u101c\u101a\u101e\u101f])([\u103c\u108a])([\u1032\u1036\u102d\u102e\u108b\u108c\u108d\u108e])\", \"to\": \"\u1084$1$2$3\" }, { \"from\": \"\u107e([\u1000\u1003\u1006\u100f\u1010\u1011\u1018\u101a\u101c\u101a\u101e\u101f])([\u103c\u108a])\", \"to\": \"\u1082$1$2\" }, { \"from\": \"\u107e([\u1000\u1003\u1006\u100f\u1010\u1011\u1018\u101a\u101c\u101a\u101e\u101f])([\u1033\u1034]?)([\u1032\u1036\u102d\u102e\u108b\u108c\u108d\u108e])\", \"to\": \"\u1080$1$2$3\" }, { \"from\": \"\u103b([\u1000-\u1021])([\u103c\u108a])([\u1032\u1036\u102d\u102e\u108b\u108c\u108d\u108e])\", \"to\": \"\u1083$1$2$3\" }, { \"from\": \"\u103b([\u1000-\u1021])([\u103c\u108a])\", \"to\": \"\u1081$1$2\" }, { \"from\": \"\u103b([\u1000-\u1021])([\u1033\u1034]?)([\u1032\u1036\u102d\u102e\u108b\u108c\u108d\u108e])\", \"to\": \"\u107f$1$2$3\" }, { \"from\": \"\u103a\u103d\", \"to\": \"\u103d\u103a\" }, { \"from\": \"\u103a([\u103c\u108a])\", \"to\": \"$1\u107d\" }, { \"from\": \"([\u1033\u1034])\u1094\", \"to\": \"$1\u1095\" }, { \"from\": \"\u108F\u1071\", \"to\" : \"\u108F\u1072\" }, { \"from\": \"([\u1000-\u1021])([\u107B\u1066])\u102C\", \"to\": \"$1\u102C$2\" }, { \"from\": \"\u102C([\u107B\u1066])\u1037\", \"to\": \"\u102C$1\u1094\" }]", true);

            return self::replaceWithRule($rule, $text);
        }

        return $text;
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public static function checkFont($text = '')
    {
        if (self::isEmptyString($text)) {
            return self::UNICODE;
        }

        return self::ZgOrUni($text);
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public static function isZgOrUni($text = '')
    {
        if (self::isEmptyString($text)) {
            return self::UNICODE;
        }

        return self::ZgOrUni($text);
    }

    /**
     * Determine the font zawgyi or unicode.
     *
     * @param $text
     *
     * @return string
     */
    protected static function ZgOrUni($text)
    {
        $zgPattern = '/ေျ|^ေ|^ျ|[ဢ-ူဲ-္ျ-ွ၀-၏]ျ|္$|ွြ|ျြ|[က-အ]္[ယရဝဟဢ-ဪေ့-္ျ၀-၏]|ီ[ိှဲ]|ဲ[ိီ]|[႐-႙][ါ-ူဲ့ြ-ှ]|[က-ဪ]်[ာ-ီဲ-ံ]|[ဣ-ူဲ-္၀-၏]ေ|[ၾ-ႄ][ခဃစ-ဏဒ-နဖ-ဘဟ]|ဥ္|[ႁႃ]ႏ|ႏ[ၠ-ႍ]|[ိ-ူဲံ့]္|ာ္|ရြ|[^၀-၉]၀ိ|ေ?၀[ါၚီ-ူဲံ-း]|ေ?၇[ာ-ူဲံ-း]|[ုူဲ]႔|္[ၾ-ႄ]/u';

        $uniPattern = '/[ဃငဆဇဈဉညဋဌဍဎဏဒဓနဘရဝဟဠအ]်|ျ[က-အ]ါ|ျ[ါ-း]|\x{103e}|\x{103f}|\x{1031}[^\x{1000}-\x{1021}\x{103b}\x{1040}\x{106a}\x{106b}\x{107e}-\x{1084}\x{108f}\x{1090}]|\x{1031}$|\x{1031}[က-အ]\x{1032}|\x{1025}\x{102f}|\x{103c}\x{103d}[\x{1000}-\x{1001}]|ည်း|ျင်း|င်|န်း|ျာ|င့်/u';

        $regexMM = '/[\x{1000}-\x{109f}\x{aa60}-\x{aa7f}]+/u';

        if (preg_match($uniPattern, $text)) {
            return self::UNICODE;
        } elseif (preg_match($zgPattern, $text)) {
            return self::ZAWGYI;
        } elseif (preg_match($regexMM, $text)) {
            return self::MYANMAR;
        } else {
            return self::NOT_MYANMAR;
        }
    }

    /**
     * Replace the string with rules.
     *
     * @param array  $rule
     * @param string $output
     *
     * @return string
     */
    protected static function replaceWithRule($rule, $output)
    {
        foreach ($rule as $data) {
            $from = '~'.json_decode('"'.$data['from'].'"').'~u';
            $to = json_decode('"'.$data['to'].'"');
            $output = preg_replace($from, $to, $output);
        }

        return $output;
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
