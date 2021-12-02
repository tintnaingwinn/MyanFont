<?php

namespace Tintnaingwin\MyanFont\Tests\RegularExpression;

use Tintnaingwin\MyanFont\Facades\MyanFont;
use Tintnaingwin\MyanFont\Tests\TestCase;

class MyanFontTest extends TestCase
{
    /** @test */
    public function check_font()
    {
        $font = MyanFont::isZgOrUni($this->zawgyiData());
        $this->assertEquals($font, self::ZAWGYI);

        $font = MyanFont::isZgOrUni($this->unicodeData());
        $this->assertEquals($font, self::UNICODE);
    }

    /** @test */
    public function english_text()
    {
        $font = MyanFont::isZgOrUni($this->englishUnicodeData());
        $this->assertEquals($font, self::UNICODE);

        $font = MyanFont::isZgOrUni($this->englishZawgyiData());
        $this->assertEquals($font, self::ZAWGYI);
    }

    /** @test */
    public function convert_zg2uni()
    {
        $convert = MyanFont::zg2uni($this->zawgyiData());
        $font = MyanFont::isZgOrUni($convert);
        $this->assertEquals($font, self::UNICODE);
    }

    /** @test */
    public function convert_uni2zg()
    {
        $convert = MyanFont::uni2zg($this->unicodeData());
        $font = MyanFont::isZgOrUni($convert);
        $this->assertEquals($font, self::ZAWGYI);
    }

    /** @test */
    public function null_convert()
    {
        $zg = MyanFont::uni2zg(null);
        $this->assertNull($zg);

        $uni = MyanFont::zg2uni(null);
        $this->assertNull($uni);

        $font = MyanFont::isZgOrUni(null);
        $this->assertEquals($font, self::UNICODE);
    }

    /** @test */
    public function empty_string_convert()
    {
        $zg = MyanFont::uni2zg('');
        $this->assertEmpty($zg);

        $uni = MyanFont::zg2uni('');
        $this->assertEmpty($uni);

        $font = MyanFont::isZgOrUni('');
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
