<?php

namespace Tintnaingwin\MyanFont\Tests\MyanmarTools;

use Tintnaingwin\MyanFont\MyanFont;
use Tintnaingwin\MyanFont\Tests\TestCase;

class MyanFontTest extends TestCase
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
        $font = MyanFont::isZgOrUni($this->zawgyiData());
        $this->assertEquals($font, self::ZAWGYI);

        $font = MyanFont::isZgOrUni($this->unicodeData());
        $this->assertEquals($font, self::UNICODE);
    }

    /**
     * @throws \Exception
     */
    public function test_english_text()
    {
        $font = MyanFont::isZgOrUni($this->englishUnicodeData());
        $this->assertEquals($font, self::UNICODE);

        $font = MyanFont::isZgOrUni($this->englishZawgyiData());
        $this->assertEquals($font, self::ZAWGYI);
    }

    /**
     * @throws \Exception
     */
    public function test_convert_zg2uni()
    {
        $convert = MyanFont::zg2uni($this->zawgyiData());
        $font = MyanFont::isZgOrUni($convert);
        $this->assertEquals($font, self::UNICODE);
    }

    /**
     * @throws \Exception
     */
    public function test_convert_uni2zg()
    {
        $convert = MyanFont::uni2zg($this->unicodeData());
        $font = MyanFont::isZgOrUni($convert);
        $this->assertEquals($font, self::ZAWGYI);
    }

    /**
     * @throws \Exception
     */
    public function test_null_convert()
    {
        $zg = MyanFont::uni2zg(null);
        echo "$zg\n";
        $this->assertNotNull($zg);

        $uni = MyanFont::zg2uni(null);
        echo "$uni\n";
        $this->assertNotNull($uni);

        $font = MyanFont::isZgOrUni(null);
        echo "$font\n";
        $this->assertNotNull($font);
    }
}
