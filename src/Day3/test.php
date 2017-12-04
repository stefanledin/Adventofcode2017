<?php

use PHPUnit\Framework\TestCase;
use Advent\Day3\SpiralMemory;

class TestSpiralMemory extends TestCase {
    
    public function test_one_step()
    {
        $spiral = new SpiralMemory(1);
        $this->assertCount(1, $spiral->squares);
        $this->assertEquals([0,0], $spiral->squares[1]);
    }
    
    public function test_two_steps()
    {
        $spiral = new SpiralMemory(5);
        $this->assertCount(5, $spiral->squares);
        $this->assertEquals([0,0], $spiral->squares[1]);
        $this->assertEquals([1,0], $spiral->squares[2]);
        $this->assertEquals([1,1], $spiral->squares[3]);
        $this->assertEquals([0,1], $spiral->squares[4]);
        #$this->assertEquals([-1,1], $spiral->squares[5]);
    }

    /* function test_basic() {
        $spiral = new SpiralMemory(23);
        $this->assertCount(23, $spiral->squares);
        $this->assertEquals(0, $spiral->squares[1][0]);
        $this->assertEquals(0, $spiral->squares[1][1]);
        $this->assertEquals([1,0], $spiral->squares[2]);
        $this->assertEquals([1,1], $spiral->squares[3]);
    } */

}