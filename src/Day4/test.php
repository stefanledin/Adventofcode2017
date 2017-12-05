<?php
use PHPUnit\Framework\TestCase;
use Advent\Day4\PassPhrase;

class TestPassPhrase extends TestCase {
    
    public function test_example()
    {
        /* $this->assertTrue( (new PassPhrase('aa bb cc dd ee'))->validate());
        $this->assertFalse( (new PassPhrase('aa bb cc dd aa'))->validate());
        $this->assertFalse( (new PassPhrase('abcde xyz ecdab'))->validate());
        $this->assertTrue( (new PassPhrase('aa bb cc dd aaa'))->validate());
        $this->assertTrue( (new PassPhrase('a ab abc abd abf abj'))->validate());
        $this->assertTrue( (new PassPhrase('iiii oiii ooii oooi oooo'))->validate());
        $this->assertFalse( (new PassPhrase('oiii ioii iioi iiio'))->validate()); */
        $this->assertTrue( (new PassPhrase('abcde fghij'))->validate());
        $this->assertTrue( (new PassPhrase('a ab abc abd abf abj'))->validate());
        $this->assertTrue( (new PassPhrase('iiii oiii ooii oooi oooo'))->validate());
        $this->assertFalse( (new PassPhrase('abcde xyz ecdab'))->validate());
        $this->assertFalse( (new PassPhrase('oiii ioii iioi iiio'))->validate());
    }

}