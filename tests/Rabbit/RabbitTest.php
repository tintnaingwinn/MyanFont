<?php

namespace Tintnaingwin\MyanFont\Tests\RegularExpression;

use Tintnaingwin\MyanFont\Tests\AbstractTestCase;
use Rabbit;

class RabbitTest extends AbstractTestCase
{
    /**
     * @test
     * @throws \Exception
     */
    public function convert_zg2uni()
    {
        $this->assertSame($this->unicodeData(), Rabbit::zg2uni($this->zawgyiData()));
    }

    /**
     * @test
     * @throws \Exception
     */
    public function convert_uni2zg()
    {
        $this->assertSame($this->zawgyiData(), Rabbit::uni2zg($this->unicodeData()));
    }

    /**
     * @test
     * @throws \Exception
     */
    public function parseline() {
        $string = $this->unicodeData();
        $object = new Rabbit();
        $method = $this->getPrivateMethod( 'Rabbit', 'parseline' );

        $result = $method->invokeArgs( $object, array( $string ) );

        $this->assertFalse(strpos($result, chr(13)));

    }

}
