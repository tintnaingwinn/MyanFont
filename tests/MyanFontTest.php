<?php

namespace Tintnaingwin\MyanFont\Tests;

use Tintnaingwin\MyanFont\Facades\MyanFont;

class MyanFontTest extends TestCase
{
    use DataTestHelper;

    /** @test */
    public function check_font()
    {
        $font = MyanFont::checkFont($this->zawgyiData());
        $this->assertEquals($font, self::ZAWGYI);

        $font = MyanFont::checkFont($this->unicodeData());
        $this->assertEquals($font, self::UNICODE);
    }

    /** @test */
    public function english_text()
    {
        $font = MyanFont::checkFont($this->englishUnicodeData());
        $this->assertEquals($font, self::UNICODE);

        $font = MyanFont::checkFont($this->englishZawgyiData());
        $this->assertEquals($font, self::ZAWGYI);
    }

    /** @test */
    public function convert_zg2uni()
    {
        $convert = MyanFont::zg2uni($this->zawgyiData());
        $font = MyanFont::checkFont($convert);
        $this->assertEquals($font, self::UNICODE);
    }

    /** @test */
    public function convert_uni2zg()
    {
        $convert = MyanFont::uni2zg($this->unicodeData());
        $font = MyanFont::checkFont($convert);
        $this->assertEquals($font, self::ZAWGYI);
    }

    /** @test */
    public function null_convert()
    {
        $zg = MyanFont::uni2zg(null);
        $this->assertNotNull($zg);

        $uni = MyanFont::zg2uni(null);
        $this->assertNotNull($uni);

        $font = MyanFont::checkFont(null);
        $this->assertNotNull($font);
    }

}
