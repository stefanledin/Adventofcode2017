<?php

use PHPUnit\Framework\TestCase;
use Advent\Day3\SpiralMemory;

class TestSpiralMemory extends TestCase {
    
    function test_basic() {
        $spiral = new SpiralMemory(23);
        $this->assertCount(23, $spiral->squares);
        $this->assertEquals([0,0], $spiral->squares[1]);
        $this->assertEquals([1,0], $spiral->squares[2]);

    }

}