<?php

use Tintnaingwin\MyanFont\Rabbit;

it('convert zawgyi to unicode', function () {
    $this->assertSame($this->unicodeData(), Rabbit::zg2uni($this->zawgyiData()));
});

it('convert unicode to zawgyi', function () {
    $this->assertSame($this->zawgyiData(), Rabbit::uni2zg($this->unicodeData()));
});

it('parse line', function () {
    $string = $this->unicodeData();
    $object = new Rabbit();
    $method = getPrivateMethod('Tintnaingwin\MyanFont\Rabbit', 'parseline');

    $result = $method->invokeArgs($object, [$string]);

    $this->assertFalse(strpos($result, chr(13)));
});

function getPrivateMethod($className, $methodName)
{
    try {
        $reflector = new ReflectionClass($className);
        $method = $reflector->getMethod($methodName);
        $method->setAccessible(true);

        return $method;
    } catch (ReflectionException $e) {
    }
}
