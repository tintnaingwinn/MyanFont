<?php

namespace Tintnaingwin\MyanFont\Tests\MyanmarTools;

use Tintnaingwin\MyanFont\Tests\TestCase;

class HelperTest extends TestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('myanfont.myanmartools', [
            'enabled'       => true,
            'zawgyi_score'  => 0.95,
            'unicode_score' => 0.05,
        ]);
    }

    /**
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
     * @throws \Exception
     */
    public function test_english_text()
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
        echo "$zg\n";
        $this->assertNotNull($zg);

        $uni = zg2uni(null);
        echo "$uni\n";
        $this->assertNotNull($uni);

        $font = isZgOrUni(null);
        echo "$font\n";
        $this->assertNotNull($font);
    }
}
