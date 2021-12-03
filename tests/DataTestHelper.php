<?php

namespace Tintnaingwin\MyanFont\Tests;

trait DataTestHelper
{
    protected function zawgyiData(): string
    {
        return 'သီဟိုဠ္မွ ဉာဏ္ႀကီးရွင္သည္ အာယုဝၯနေဆးၫႊန္းစာကို ဇလြန္ေဈးေဘး ဗာဒံပင္ထက္ အဓိ႒ာန္လ်က္ ဂဃနဏဖတ္ခဲ့သည္။';
    }

    protected function unicodeData(): string
    {
        return 'သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။';
    }

    protected function englishZawgyiData(): string
    {
        return 'English 00 \n\n Cashew အာယု genius ဝဍ္ n prescription ဇလြန္ price pledge of almond trees and read the line.';
    }

    protected function englishUnicodeData(): string
    {
        return 'English 00 \n\n Cashew အာယု genius ဝဍ် n prescription ဇလွန် price pledge of almond trees and read the line.';
    }

    protected function englishData(): string
    {
        return 'Difficulty on insensible reasonable in. From as went he they.';
    }
}
