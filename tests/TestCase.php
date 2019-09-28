<?php

namespace Tintnaingwin\MyanFont\Tests;

use ReflectionClass;
use ReflectionException;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    use DataTestHelper;

    const ZAWGYI = 'ZawGyi';

    const UNICODE = 'Unicode';

    const MYANMAR = 'Myanmar';

    public function setUp()
    {
        parent::setUp();
    }

    public function getPrivateMethod($className, $methodName)
    {
        try {
            $reflector = new ReflectionClass($className);
            $method = $reflector->getMethod($methodName);
            $method->setAccessible(true);

            return $method;
        } catch (ReflectionException $e) {
        }
    }
}
