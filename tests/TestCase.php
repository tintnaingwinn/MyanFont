<?php

namespace Tintnaingwin\MyanFont\Tests;

use ReflectionClass;
use ReflectionException;
use Tintnaingwin\MyanFont\MyanFontServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    use DataTestHelper;

    const ZAWGYI = 'zawgyi';

    const UNICODE = 'unicode';

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            MyanFontServiceProvider::class,
        ];
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
