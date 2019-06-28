<?php

namespace Tintnaingwin\MyanFont\Tests;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use ReflectionClass;
use Tintnaingwin\MyanFont\MyanFontServiceProvider;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    use DataTestHelper;

    const
        ZAWGYI = 'zawgyi';
    const UNICODE = 'unicode';

    public function getPrivateMethod( $className, $methodName ) {
        $reflector = new ReflectionClass( $className );
        $method = $reflector->getMethod( $methodName );
        $method->setAccessible( true );
        return $method;
    }

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass($app)
    {
        return MyanFontServiceProvider::class;
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('myanfont.myanmartools', [
            'enabled'       => false,
            'zawgyi_score'  => 0.95,
            'unicode_score' => 0.05,
        ]);
    }
}
