<?php

it('check the font', function () {
    $font = isZgOrUni($this->zawgyiData());
    $this->assertEquals(self::ZAWGYI, $font);

    $font = isZgOrUni($this->unicodeData());
    $this->assertEquals(self::UNICODE, $font);

    $isZawgyi = isZawgyi($this->zawgyiData());
    $this->assertTrue($isZawgyi);

    $isZawgyi = isZawgyi($this->unicodeData());
    $this->assertFalse($isZawgyi);

    $isUnicode = isUnicode($this->unicodeData());
    $this->assertTrue($isUnicode);

    $isUnicode = isUnicode($this->zawgyiData());
    $this->assertFalse($isUnicode);
});

it('convert english text', function () {
    $font = isZgOrUni($this->englishUnicodeData());
    $this->assertEquals(self::UNICODE, $font);

    $font = isZgOrUni($this->englishZawgyiData());
    $this->assertEquals(self::ZAWGYI, $font);
});

it('convert zawgyi to unicode', function () {
    $convert = zg2uni($this->zawgyiData());
    $font = isZgOrUni($convert);
    $this->assertEquals(self::UNICODE, $font);
});

it('convert unicode to zawgyi', function () {
    $convert = uni2zg($this->unicodeData());
    $font = isZgOrUni($convert);
    $this->assertEquals(self::ZAWGYI, $font);
});

it('convert null', function () {
    $zg = uni2zg(null);
    $this->assertNull($zg);

    $uni = zg2uni(null);
    $this->assertNull($uni);

    $font = isZgOrUni(null);
    $this->assertEquals(self::UNICODE, $font);
});

it('convert empty text', function () {
    $zg = uni2zg('');
    $this->assertEmpty($zg);

    $uni = zg2uni('');
    $this->assertEmpty($uni);

    $font = isZgOrUni('');
    $this->assertEquals(self::UNICODE, $font);
});
