<?php

use PHPUnit\Framework\TestCase;

class TestInverseCaptcha extends TestCase {

    public function test_examples()
    {
        $inverseCaptcha = new Advent\Day1\InverseCaptcha;

        $this->assertEquals(3, $inverseCaptcha->getSum(1122));
        $this->assertEquals(4, $inverseCaptcha->getSum(1111));
        $this->assertEquals(0, $inverseCaptcha->getSum(1234));
        $this->assertEquals(9, $inverseCaptcha->getSum(91212129));
    }

    public function test_examples_part2()
    {
        $inverseCaptcha = new Advent\Day1\InverseCaptcha;

        $this->assertEquals(6, $inverseCaptcha->getSum2('1212'));
        $this->assertEquals(0, $inverseCaptcha->getSum2('1221'));
        $this->assertEquals(4, $inverseCaptcha->getSum2('123425'));
        $this->assertEquals(12, $inverseCaptcha->getSum2('123123'));
        $this->assertEquals(4, $inverseCaptcha->getSum2('12131415'));
    }

}