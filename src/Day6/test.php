<?php 

use PHPUnit\Framework\TestCase;
use Advent\Day6\Memory;

class TestMemoryReallocation extends TestCase {

    public function test_example()
    {
        $banks = '0 2 7 0';
        $memory = new Memory($banks);
        $this->assertTrue(is_array($memory->banks));
        
        $this->assertCount(4, $memory->banks);
        $this->assertEquals(2, $memory->largestBlockIndex());
        $this->assertEquals(7, $memory->largestBlockValue());
        
        $memory->moveBlock($memory->largestBlockIndex());
        
        $this->assertEquals(2, $memory->banks[0]);
        $this->assertEquals(4, $memory->banks[1]);
        $this->assertEquals(1, $memory->banks[2]);
        $this->assertEquals(2, $memory->banks[3]);
        $this->assertEquals('2 4 1 2', $memory->getBanksAsString());

        $this->assertEquals(1, $memory->largestBlockIndex());
        $this->assertEquals(4, $memory->largestBlockValue());

        $memory->moveBlock($memory->largestBlockIndex());

        $this->assertEquals('3 1 2 3', $memory->getBanksAsString());

        $memory->moveBlock($memory->largestBlockIndex());
        $this->assertEquals('0 2 3 4', $memory->getBanksAsString());

        $memory->moveBlock($memory->largestBlockIndex());
        $this->assertEquals('1 3 4 1', $memory->getBanksAsString());

        $this->assertFalse(in_array($memory->getBanksAsString(), $memory->previousBanks));

        $memory->moveBlock($memory->largestBlockIndex());
        $this->assertEquals('2 4 1 2', $memory->getBanksAsString()); $this->assertTrue(in_array($memory->getBanksAsString(), $memory->previousBanks));
        $this->assertTrue(in_array($memory->getBanksAsString(), $memory->previousBanks));

        $this->assertCount(5, $memory->previousBanks);
    }

    public function test_as_real()
    {
        $banks = '0 2 7 0';
        $memory = new Memory($banks);
        while (!in_array($memory->getBanksAsString(), $memory->previousBanks)) {
            $memory->moveBlock($memory->largestBlockIndex());
        }
        $this->assertCount(5, $memory->previousBanks);
    }

    public function test2_as_real()
    {
        $banks = '0 2 7 0';
        $memory = new Memory($banks);
        #while (count(array_unique($memory->allBanks)) == count($memory->allBanks)) {
        while (!in_array($memory->getBanksAsString(), $memory->previousBanks)) {
            if (count($memory->allBanks) - count(array_unique($memory->allBanks)) == 2) {
                die(var_dump(count($memory->banks)));
            }
            $memory->moveBlock($memory->largestBlockIndex());
        }
        #die(var_dump($memory->allBanks));
        $this->assertEquals(4, $i);
        #$this->assertCount(4, $memory->banks);
    }

    public function test_real_input()
    {
        $input = '11 11 13 7 0 15 5 5 4 4 1 1 7 1 15 11';
        $memory = new Memory($input);
        $this->assertEquals(5, $memory->largestBlockIndex());
        $this->assertEquals(15, $memory->largestBlockValue());
        $this->assertEquals(11, $memory->banks[0]);
        $this->assertEquals(11, $memory->banks[1]);
        $this->assertEquals(13, $memory->banks[2]);
        $this->assertEquals(7, $memory->banks[3]);
        $this->assertEquals(0, $memory->banks[4]);
        $this->assertEquals(15, $memory->banks[5]);
        $this->assertEquals(5, $memory->banks[6]);
        $this->assertEquals(5, $memory->banks[7]);
        $this->assertEquals(4, $memory->banks[8]);
        $this->assertEquals(4, $memory->banks[9]);
        $this->assertEquals(1, $memory->banks[10]);
        $this->assertEquals(1, $memory->banks[11]);
        $this->assertEquals(7, $memory->banks[12]);
        $this->assertEquals(1, $memory->banks[13]);
        $this->assertEquals(15, $memory->banks[14]);
        $this->assertEquals(11, $memory->banks[15]);


        $memory->moveBlock($memory->largestBlockIndex());

        #$input = '11 11 13 7 0 15 5 5 4 4 1 1 7 1 15 11';
        #$this->assertEquals(5, $memory->largestBlockIndex());
        #$this->assertEquals(15, $memory->largestBlockValue());
        /*$this->assertEquals(11, $memory->banks[0]);
        $this->assertEquals(11, $memory->banks[1]);
        $this->assertEquals(13, $memory->banks[2]);
        $this->assertEquals(7, $memory->banks[3]);
        $this->assertEquals(0, $memory->banks[4]);
        $this->assertEquals(15, $memory->banks[5]);
        $this->assertEquals(5, $memory->banks[6]);
        $this->assertEquals(5, $memory->banks[7]);
        $this->assertEquals(4, $memory->banks[8]);
        $this->assertEquals(4, $memory->banks[9]);
        $this->assertEquals(1, $memory->banks[10]);
        $this->assertEquals(1, $memory->banks[11]);
        $this->assertEquals(7, $memory->banks[12]);
        $this->assertEquals(1, $memory->banks[13]);
        $this->assertEquals(15, $memory->banks[14]);
        $this->assertEquals(11, $memory->banks[15]);*/

    }
}