<?php
namespace Advent\Day5;

class Maze {

    protected $steps = 0;
    protected $outside = false;
    public $instructions;
    protected $locationIndex = 0;

    public function __construct(array $instructions)
    {
        $this->instructions = $instructions;
        $this->instructions = \array_map(function($instruction) {
            return (int) $instruction;
        }, $this->instructions);
    }

    public function currentLocationIndex()
    {
        return $this->locationIndex;
    }

    public function stepInstructions()
    {
        return $this->instructions[$this->locationIndex];
    }

    public function jump()
    {
        $this->steps += 1;
        $indexBeforeJump = $this->currentLocationIndex();
        $instruction = $this->stepInstructions();
        if ($instruction > 0) {
            // Gå framåt
            $this->locationIndex += $instruction;
        }
        if ($instruction < 0) {
            // Backa
            $this->locationIndex -= abs($instruction);
        }
        if ($instruction == 0) {
            // Stå kvar!
        }
        if ($this->locationIndex > (count($this->instructions) - 1)) {
            $this->outside = true;
        }

        // Öka den man stod på
        $this->instructions[$indexBeforeJump] += 1;
    }

    public function jump2()
    {
        $this->steps += 1;
        $indexBeforeJump = $this->currentLocationIndex();
        $instruction = $this->stepInstructions();
        if ($instruction > 0) {
            // Gå framåt
            $this->locationIndex += $instruction;
        }
        if ($instruction < 0) {
            // Backa
            $this->locationIndex -= abs($instruction);
        }
        if ($instruction == 0) {
            // Stå kvar!
        }
        if ($this->locationIndex > (count($this->instructions) - 1)) {
            $this->outside = true;
        }

        if ($instruction >= 3) {
            $this->instructions[$indexBeforeJump] -= 1;
        } else {
            $this->instructions[$indexBeforeJump] += 1;
        }
    }

    public function stepsTaken()
    {
        return $this->steps;
    }

    public function outside()
    {
        return $this->outside;
    }
}
