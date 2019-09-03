<?php

namespace Tintnaingwin\MyanFont\Facades;

use Illuminate\Support\Facades\Facade;

class MyanFont extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Tintnaingwin\MyanFont\MyanFont';
    }
}
