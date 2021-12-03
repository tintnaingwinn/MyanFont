<?php

use Tintnaingwin\MyanFont\Facades\MyanFont;

it('check the font', function () {
    $font = MyanFont::isZgOrUni($this->zawgyiData());
    $this->assertEquals(self::ZAWGYI, $font);

    $font = MyanFont::isZgOrUni($this->unicodeData());
    $this->assertEquals(self::UNICODE, $font);

    $isZawgyi = MyanFont::isZawgyi($this->zawgyiData());
    $this->assertTrue($isZawgyi);

    $isZawgyi = MyanFont::isZawgyi($this->unicodeData());
    $this->assertFalse($isZawgyi);

    $isUnicode = MyanFont::isUnicode($this->unicodeData());
    $this->assertTrue($isUnicode);

    $isUnicode = MyanFont::isUnicode($this->zawgyiData());
    $this->assertFalse($isUnicode);
});

it('convert english text', function () {
    $font = MyanFont::isZgOrUni($this->englishUnicodeData());
    $this->assertEquals(self::UNICODE, $font);

    $font = MyanFont::isZgOrUni($this->englishZawgyiData());
    $this->assertEquals(self::ZAWGYI, $font);
});

it('convert zawgyi to unicode', function () {
    $convert = MyanFont::zg2uni($this->zawgyiData());
    $font = MyanFont::isZgOrUni($convert);
    $this->assertEquals(self::UNICODE, $font);
});

it('convert unicode to zawgyi', function () {
    $convert = MyanFont::uni2zg($this->unicodeData());
    $font = MyanFont::isZgOrUni($convert);
    $this->assertEquals(self::ZAWGYI, $font);
});

it('convert null', function () {
    $zg = MyanFont::uni2zg(null);
    $this->assertNull($zg);

    $uni = MyanFont::zg2uni(null);
    $this->assertNull($uni);

    $font = MyanFont::isZgOrUni(null);
    $this->assertEquals(self::UNICODE, $font);
});

it('convert empty text', function () {
    $zg = MyanFont::uni2zg('');
    $this->assertEmpty($zg);

    $uni = MyanFont::zg2uni('');
    $this->assertEmpty($uni);

    $font = MyanFont::isZgOrUni('');
    $this->assertEquals(self::UNICODE, $font);
});

it('convert same font', function () {
    $zg = MyanFont::uni2zg($this->zawgyiData());
    $this->assertSame($this->zawgyiData(), $zg);

    $uni = MyanFont::zg2uni($this->unicodeData());
    $this->assertSame($this->unicodeData(), $uni);
});
