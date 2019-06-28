<?php

namespace Tintnaingwin\MyanFont\Tests\RegularExpression;

use Tintnaingwin\MyanFont\Tests\AbstractTestCase;

class HelperTest extends AbstractTestCase
{
    /**
     * @test
     * @throws \Exception
     */
    public function test_check_font()
    {
        $font = isZgOrUni($this->zawgyiData());
        $this->assertEquals($font, self::ZAWGYI);

        $font = isZgOrUni($this->unicodeData());
        $this->assertEquals($font, self::UNICODE);
    }

    /**
     * @test
     * @throws \Exception
     */
    public function english_text()
    {
        $font = isZgOrUni($this->englishUnicodeData());
        $this->assertEquals($font, self::UNICODE);

        $font = isZgOrUni($this->englishZawgyiData());
        $this->assertEquals($font, self::ZAWGYI);
    }

    /**
     * @throws \Exception
     */
    public function test_convert_zg2uni()
    {
        $convert = zg2uni($this->zawgyiData());
        $font = isZgOrUni($convert);
        $this->assertEquals($font, self::UNICODE);
    }

    /**
     * @throws \Exception
     */
    public function test_convert_uni2zg()
    {
        $convert = uni2zg($this->unicodeData());
        $font = isZgOrUni($convert);
        $this->assertEquals($font, self::ZAWGYI);
    }

    /**
     * @throws \Exception
     */
    public function test_null_convert()
    {
        $zg = uni2zg(null);
        $this->assertNotNull($zg);

        $uni = zg2uni(null);
        $this->assertNotNull($uni);

        $font = isZgOrUni(null);
        $this->assertNotNull($font);
    }
}
