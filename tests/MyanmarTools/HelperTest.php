<?php

namespace Tintnaingwin\MyanFont\Tests\MyanmarTools;

use Tintnaingwin\MyanFont\Tests\TestCase;

class HelperTest extends TestCase
{
    /** @test */
    public function check_font()
    {
        $font = isZgOrUni($this->zawgyiData(), true);
        $this->assertEquals($font, self::ZAWGYI);

        $font = isZgOrUni($this->unicodeData(), true);
        $this->assertEquals($font, self::UNICODE);
    }

    /** @test */
    public function english_text()
    {
        $font = isZgOrUni($this->englishUnicodeData(), true);
        $this->assertEquals($font, self::UNICODE);

        $font = isZgOrUni($this->englishZawgyiData(), true);
        $this->assertEquals($font, self::ZAWGYI);
    }

    /** @test */
    public function convert_zg2uni()
    {
        $convert = zg2uni($this->zawgyiData(), true);
        $font = isZgOrUni($convert, true);
        $this->assertEquals($font, self::UNICODE);
    }

    /** @test */
    public function convert_uni2zg()
    {
        $convert = uni2zg($this->unicodeData(), true);
        $font = isZgOrUni($convert, true);
        $this->assertEquals($font, self::ZAWGYI);
    }

    /** @test */
    public function null_convert()
    {
        $zg = uni2zg(null, true);
        $this->assertNull($zg);

        $uni = zg2uni(null, true);
        $this->assertNull($uni);

        $font = isZgOrUni(null, true);
        $this->assertEquals($font, self::UNICODE);
    }

    /** @test */
    public function empty_string_convert()
    {
        $zg = uni2zg('', true);
        $this->assertEmpty($zg);

        $uni = zg2uni('', true);
        $this->assertEmpty($uni);

        $font = isZgOrUni('', true);
        $this->assertEquals($font, self::UNICODE);
    }
}
