<?php

namespace Tintnaingwin\MyanFont\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static null|string zg2uni(?string $text = '')
 * @method static null|string uni2zg(?string $text = '')
 * @method static string isZgOrUni(?string $text = '')
 * @method static bool isUnicode(?string $text = '')
 * @method static bool isZawgyi(?string $text = '')
 *
 * @see \Tintnaingwin\MyanFont\MyanFont
 */
class MyanFont extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'myanfont';
    }
}
