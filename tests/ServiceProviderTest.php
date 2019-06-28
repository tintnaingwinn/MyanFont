<?php

namespace Tintnaingwin\MyanFont\Tests;
;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use Tintnaingwin\MyanFont\MyanFont;

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
