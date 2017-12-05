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
    
    public function test_example_steps()
    {
        $spiral = new SpiralMemory(41);
        $this->assertCount(41, $spiral->squares);
        $this->assertEquals([0,0], $spiral->squares[1]);
        $this->assertEquals([1,0], $spiral->squares[2]);
        $this->assertEquals([1,1], $spiral->squares[3]);
        $this->assertEquals([0,1], $spiral->squares[4]);
        $this->assertEquals([-1,1], $spiral->squares[5]);
        $this->assertEquals([-1,0], $spiral->squares[6]);
        $this->assertEquals([-1,-1], $spiral->squares[7]);
        $this->assertEquals([0,-1], $spiral->squares[8]);
        $this->assertEquals([1,-1], $spiral->squares[9]);
        $this->assertEquals([2,-1], $spiral->squares[10]);
        $this->assertEquals([2,0], $spiral->squares[11]);
        $this->assertEquals([2,1], $spiral->squares[12]);
        $this->assertEquals([2,2], $spiral->squares[13]);
        $this->assertEquals([1,2], $spiral->squares[14]);
        $this->assertEquals([0,2], $spiral->squares[15]);
        $this->assertEquals([-1,2], $spiral->squares[16]);
        $this->assertEquals([-2,2], $spiral->squares[17]);
        $this->assertEquals([-2,1], $spiral->squares[18]);
        $this->assertEquals([-2,0], $spiral->squares[19]);
        $this->assertEquals([-2,-1], $spiral->squares[20]);
        $this->assertEquals([-2,-2], $spiral->squares[21]);
        $this->assertEquals([-1,-2], $spiral->squares[22]);
        $this->assertEquals([0,-2], $spiral->squares[23]);
        $this->assertEquals([1,-2], $spiral->squares[24]);
        $this->assertEquals([2,-2], $spiral->squares[25]);
        $this->assertEquals([3,-2], $spiral->squares[26]);
        $this->assertEquals([3,-1], $spiral->squares[27]);
        $this->assertEquals([3,0], $spiral->squares[28]);
        $this->assertEquals([3,1], $spiral->squares[29]);
        $this->assertEquals([3,2], $spiral->squares[30]);
        $this->assertEquals([3,3], $spiral->squares[31]);
        $this->assertEquals([2,3], $spiral->squares[32]);
        $this->assertEquals([1,3], $spiral->squares[33]);
        $this->assertEquals([0,3], $spiral->squares[34]);
        $this->assertEquals([-1,3], $spiral->squares[35]);
        $this->assertEquals([-2,3], $spiral->squares[36]);
        $this->assertEquals([-3,3], $spiral->squares[37]);
        $this->assertEquals([-3,2], $spiral->squares[38]);
        $this->assertEquals([-3,1], $spiral->squares[39]);
        $this->assertEquals([-3,0], $spiral->squares[40]);
        $this->assertEquals([-3,-1], $spiral->squares[41]);
    }

    public function test_distance()
    {
        $spiral = new SpiralMemory(1024);
        $this->assertCount(1024, $spiral->squares);
        $this->assertEquals([3,-2], $spiral->squares[26]);
        $this->assertEquals(0, $spiral->stepsFor(1));
        $this->assertEquals(3, $spiral->stepsFor(12));
        $this->assertEquals(2, $spiral->stepsFor(23));
        $this->assertEquals(3, $spiral->stepsFor(28));
        $this->assertEquals(4, $spiral->stepsFor(41));
        $this->assertEquals(31, $spiral->stepsFor(1024));
    }

    public function test_get_adjacent_coordinates()
    {
        $spiral = new SpiralMemory(23);
        $this->assertCount(8, $spiral->adjacentCoordinates(2));
        $this->assertEquals([2, 0], $spiral->adjacentCoordinates(2)[0]);
        $this->assertEquals([2, -1], $spiral->adjacentCoordinates(2)[7]);
    }

    public function test_get_adjacent()
    {
        $spiral = new SpiralMemory(23);
        $this->assertCount(1, $spiral->adjacentOf(2));
        $this->assertCount(2, $spiral->adjacentOf(3));
    }

}