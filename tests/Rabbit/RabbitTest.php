<?php

namespace Tintnaingwin\MyanFont\Tests\RegularExpression;

use Rabbit;
use Tintnaingwin\MyanFont\Tests\TestCase;

class RabbitTest extends TestCase
{
    /** @test */
    public function convert_zg2uni()
    {
        $this->assertSame($this->unicodeData(), Rabbit::zg2uni($this->zawgyiData()));
    }

    /** @test */
    public function convert_uni2zg()
    {
        $this->assertSame($this->zawgyiData(), Rabbit::uni2zg($this->unicodeData()));
    }

    /** @test */
    public function parseline()
    {
        $string = $this->unicodeData();
        $object = new Rabbit();
        $method = $this->getPrivateMethod('Rabbit', 'parseline');

        $result = $method->invokeArgs($object, [$string]);

        $this->assertFalse(strpos($result, chr(13)));
    }
}
