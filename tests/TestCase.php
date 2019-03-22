<?php

namespace Tintnaingwin\MyanFont\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use DataTestHelper;

    const
        ZAWGYI = 'zawgyi',
        UNICODE = 'unicode';

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
            \Tintnaingwin\MyanFont\MyanFontServiceProvider::class,
        ];
    }


    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('myanfont.myanmartools', [
            'enabled' => false,
            'zawgyi_score' => 0.95,
            'unicode_score' => 0.05,
        ]);
    }

}

?>
