<?php

namespace Tintnaingwin\MyanFont\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Tintnaingwin\MyanFont\MyanFontServiceProvider;

abstract class TestCase extends Orchestra
{
    use DataTestHelper;

    const ZAWGYI = 'zawgyi';

    const UNICODE = 'unicode';

    /**
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getPackageProviders($app): array
    {
        return [
            MyanFontServiceProvider::class,
        ];
    }
}
