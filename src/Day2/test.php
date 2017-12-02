<?php

use PHPUnit\Framework\TestCase;
use Advent\Day2\Checksum;

class Checksum_Test extends TestCase {

    public function test_examples()
    {
        $checksum = new Checksum();
        $this->assertEquals(8, $checksum->calculate('5 1 9 5'));
        $this->assertEquals(4, $checksum->calculate('7 5 3 '));
        $this->assertEquals(6, $checksum->calculate('2 4 6 8'));
    }

    public function test_p2_examples()
    {
        $checksum = new Checksum();
        $this->assertEquals(4, $checksum->calculate2('5 9 2 8'));
        $this->assertEquals(3, $checksum->calculate2('9 4 7 3'));
        $this->assertEquals(2, $checksum->calculate2('3 8 6 5'));
    }

}