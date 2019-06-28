<?php

namespace Tintnaingwin\MyanFont\Tests\Facades;

use Tintnaingwin\MyanFont\MyanFont;
use GrahamCampbell\TestBenchCore\FacadeTrait;
use Tintnaingwin\MyanFont\Tests\AbstractTestCase;
use Tintnaingwin\MyanFont\Facades\MyanFont as Facade;

class MyanFontTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'Tintnaingwin\MyanFont\MyanFont';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return Facade::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return MyanFont::class;
    }
}
