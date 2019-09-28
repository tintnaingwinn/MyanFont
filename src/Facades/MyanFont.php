<?php

namespace Tintnaingwin\MyanFont\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method string zg2uni(string $text = '')
 * @method string uni2zg(string $text = '')
 * @method string checkFont(string $text = '')
 * @method string isZgOrUni(string $text = '')
 *
 * @see \Tintnaingwin\MyanFont\MyanFont
 */
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
