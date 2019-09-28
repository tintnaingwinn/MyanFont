<?php

namespace Tintnaingwin\MyanFont\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method string zg2uni(string $text = '', bool $myanmar_tools = false)
 * @method string uni2zg(string $text = '', bool $myanmar_tools = false)
 * @method string isZgOrUni(string $text = '', bool $myanmar_tools = false)
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
        return 'myanfont';
    }
}
