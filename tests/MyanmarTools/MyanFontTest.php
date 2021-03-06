<?php

namespace Tintnaingwin\MyanFont\Tests\MyanmarTools;

use Tintnaingwin\MyanFont\Tests\TestCase;
use Tintnaingwin\MyanFont\Facades\MyanFont;

class MyanFontTest extends TestCase
{
    /** @test */
    public function check_font()
    {
        $font = MyanFont::isZgOrUni($this->englishData(), true);
        $this->assertEquals($font, self::UNICODE);

        $font = MyanFont::isZgOrUni($this->zawgyiData(), true);
        $this->assertEquals($font, self::ZAWGYI);

        $font = MyanFont::isZgOrUni($this->unicodeData(), true);
        $this->assertEquals($font, self::UNICODE);
    }

    /** @test */
    public function english_text()
    {
        $font = MyanFont::isZgOrUni($this->englishUnicodeData(), true);
        $this->assertEquals($font, self::UNICODE);

        $font = MyanFont::isZgOrUni($this->englishZawgyiData(), true);
        $this->assertEquals($font, self::ZAWGYI);
    }

    /** @test */
    public function convert_zg2uni()
    {
        $convert = MyanFont::zg2uni($this->zawgyiData(), true);
        $font = MyanFont::isZgOrUni($convert);
        $this->assertEquals($font, self::UNICODE);
    }

    /** @test */
    public function convert_uni2zg()
    {
        $convert = MyanFont::uni2zg($this->unicodeData(), true);
        $font = MyanFont::isZgOrUni($convert);
        $this->assertEquals($font, self::ZAWGYI);
    }

    /** @test */
    public function null_convert()
    {
        $zg = MyanFont::uni2zg(null, true);
        $this->assertNull($zg);

        $uni = MyanFont::zg2uni(null, true);
        $this->assertNull($uni);

        $font = MyanFont::isZgOrUni(null, true);
        $this->assertEquals($font, self::UNICODE);
    }

    /** @test */
    public function empty_string_convert()
    {
        $zg = MyanFont::uni2zg('', true);
        $this->assertEmpty($zg);

        $uni = MyanFont::zg2uni('', true);
        $this->assertEmpty($uni);

        $font = MyanFont::isZgOrUni('', true);
        $this->assertEquals($font, self::UNICODE);
    }

    /** @test */
    public function convert_same_font()
    {
        $zg = MyanFont::uni2zg($this->zawgyiData());
        $this->assertSame($this->zawgyiData(), $zg);

        $uni = MyanFont::zg2uni($this->unicodeData());
        $this->assertSame($this->unicodeData(), $uni);
    }
}
