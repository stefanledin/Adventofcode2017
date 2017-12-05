<?php

use PHPUnit\Framework\TestCase;
use Advent\Day5\Maze;

class TestMaze extends TestCase {

    public function test_example()
    {
        $instructions = [
            0,
            3,
            0,
            1,
            -3
        ];
        $maze = new Maze($instructions);
        /* $this->assertEquals(0, $maze->stepsTaken());
        $this->assertEquals(0, $maze->currentLocationIndex());
        $this->assertEquals(0, $maze->stepInstructions());
        $maze->jump();
        $this->assertEquals(1, $maze->stepsTaken());
        $this->assertEquals(0, $maze->currentLocationIndex());
        $this->assertEquals(1, $maze->stepInstructions());
        $maze->jump();
        $this->assertEquals(1, $maze->currentLocationIndex());
        $this->assertEquals(3, $maze->stepInstructions());
        $maze->jump();
        $this->assertEquals(4, $maze->currentLocationIndex());
        $this->assertEquals(-3, $maze->stepInstructions());
        $maze->jump();
        $this->assertEquals(1, $maze->currentLocationIndex());
        $this->assertEquals(4, $maze->stepInstructions());
        $maze->jump();
        $this->assertTrue($maze->outside());
        $this->assertEquals(5, $maze->stepsTaken()); */
        $maze->jump2();
        $maze->jump2();
        $maze->jump2();
        $maze->jump2();
        $maze->jump2();
        $maze->jump2();
        $maze->jump2();
        $maze->jump2();
        $maze->jump2();
        $maze->jump2();
        $this->assertEquals(2, $maze->instructions[0]);
        $this->assertEquals(3, $maze->instructions[1]);
        $this->assertEquals(2, $maze->instructions[2]);
        $this->assertEquals(3, $maze->instructions[3]);
        $this->assertEquals(-1, $maze->instructions[4]);
        #$this->assertTrue($maze->outside());
        #$this->assertEquals(10, $maze->stepsTaken());
    }
}