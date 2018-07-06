<?php

namespace test;

use Tintnaingwin\MyanFont\MyanFont;

class MyanFontTest extends \PHPUnit\Framework\TestCase
{
    use DataTestHelper;

    const
        ZAWGYI = 'ZawGyi',
        UNICODE = 'Unicode',
        MYANMAR = 'Myanmar';

    /**
     * @throws \Exception
     *
     */
    public function test_check_font()
    {
        $font = MyanFont::checkFont($this->zawgyiData());
        print ($font);

        $this->assertEquals($font, self::ZAWGYI);

        $font = MyanFont::checkFont($this->unicodeData());
        print ($font);
        $this->assertEquals($font, self::UNICODE);
    }

    /**
     * @throws \Exception
     *
     */
    public function test_convert_zg2uni()
    {
        $convert = MyanFont::zg2uni($this->zawgyiData());
        $font = MyanFont::checkFont($convert);
        $this->assertEquals($font, self::UNICODE);
    }

    /**
     * @throws \Exception
     *
     */
    public function test_convert_uni2zg()
    {
        $convert = MyanFont::uni2zg($this->unicodeData());
        $font = MyanFont::checkFont($convert);
        $this->assertEquals($font, self::ZAWGYI);
    }

    /**
     * @throws \Exception
     *
     */
    public function test_null_convert()
    {
        $zg = MyanFont::uni2zg(null);
        print($zg);
        $this->assertNotNull($zg);

        $uni = MyanFont::zg2uni(null);
        print($uni);
        $this->assertNotNull($uni);

        $font = MyanFont::checkFont(null);
        print($font);
        $this->assertNotNull($font);
    }

}