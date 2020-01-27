<?php

declare(strict_types=1);

namespace Datashaman\Tongs\Plugins\Tests;

use Datashaman\Tongs\Tongs;
use Datashaman\Tongs\Plugins\SassPlugin;

class SassPluginTest extends TestCase
{
    public function testHandle()
    {
        $tongs = new Tongs($this->fixture('basic'));
        $tongs->use(new SassPlugin());
        $tongs->build();
        $this->assertDirEquals($this->fixture('basic/expected'), $this->fixture('basic/build'));
    }
}
