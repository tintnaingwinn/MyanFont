<?php

namespace Tintnaingwin\MyanFont\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    use DataTestHelper;

    const ZAWGYI = 'ZawGyi';

    const UNICODE = 'Unicode';

    const MYANMAR = 'Myanmar';
}
