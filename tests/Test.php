<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    /** @test */
    public function it_expects()
    {
        $this->assertEquals(1, 1);
    }

    /** @test */
    public function it_does_not_expect()
    {
        $this->assertEquals(0, 0);
    }
}
