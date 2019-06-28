<?php

namespace Tintnaingwin\MyanFont\Tests;

use Tintnaingwin\MyanFont\MyanFont;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;

class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    /*
     * @test
     */
    public function myan_font_is_injectable()
    {
        $this->assertIsInjectable(MyanFont::class);
    }
}
