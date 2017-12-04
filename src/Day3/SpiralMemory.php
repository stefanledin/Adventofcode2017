<?php
namespace Advent\Day3;

class SpiralMemory {

    public $squares;    
    protected $x = 0;
    protected $y = 0;

    public function __construct($squares)
    {
        $this->squares = [];
        $this->squares[1] = [0,0];

        $stepsPerLap = 1;
        $stepsToGo = $stepsPerLap;

        $directions = ['right', 'up', 'left', 'down'];
        $currentDirection = 0;
        
        while (count($this->squares) < $squares) {
            // Räkna ut antalet steg?
            $stepsToGo = 
            $this->stepsInDirection($directions[$currentDirection], $stepsPerLap);
            // Byt riktning
            var_dump($currentDirection % 2);
            $currentDirection += 1;
        }
    }

    public function stepsInDirection($direction, $steps)
    {
        while ($steps > 0) {
            if ($direction == 'right') {
                $this->x += 1;
            }
            if ($direction == 'up') {
                $this->y += 1;
            }
            if ($direction == 'left') {
                $this->x -= 1;
            }
            $this->squares[] = [$this->x,$this->y];
            $steps--;
        }
    }

    /* $numbers[1] = [0,0];
    $x = 0;
    $y = 0;
    $steps = 1;
    $directions = ['r', 'u', 'l', 'd'];
    $currentDirection = 0;
    while (count($numbers) < $squares) {
        $i = count($numbers) + 1;
        if ($i % 2 == 1 ) {
            $steps += 1;
        }
        $stepsToTake = $steps;
        while ($stepsToTake > 0) {
            switch ($currentDirection) {
                case 0:
                    $x += 1;
                    break;
                case 1:
                    $y += 1;
                    break;  
                case 2:
                    $x -= 1;
                    break;
                case 3:
                    $y -= 1;
                    break;
            }
            var_dump($currentDirection);
            $numbers[$i] = [$x,$y];
            $stepsToTake--;
        }
        if ($currentDirection == 3) {
            $currentDirection = 0;
        } else {
            $currentDirection++;
        }
    }
    $this->squares = $numbers; */
    // 1 (0,0) Move Right
    // 2 (1,0) Turn Up
    // 3 (1,1) Turn Left
    // 4 (0, 1) Move Left
    // 5 (-1, 1) Turn Down
    // 6 (-1, 0) Move Down
    // 7 (-1, -1) Turn Right
    // 8 (0, -1) Move Right
    // 9 (1, -1) Move Right
    // 10 (2, -1) Turn Up
    // 11 (2, 0) Move Up
    // 12 (2, 1) Move up
    // 13 (2, 2) Turn Left
    // 14 (1, 2) Move Left
    // 15 (0, 2) Move Left
    // 16 (-1, 2) Move Left
    // 17 (-2, 2) Turn Down
    // 18 (-2, 1) Turn Down
    // 19 (-2, 0) Move Down
    // 20 (-2, -1) Move Down
    // 21 (-2, -2) Turn Right

}