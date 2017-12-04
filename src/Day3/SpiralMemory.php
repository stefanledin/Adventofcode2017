<?php
namespace Advent\Day3;

class SpiralMemory {

    public $squares;    

    public function __construct($squares)
    {
        $numbers = [];
        $x = 0;
        $y = 0;
        $directions = [
            'right',
            'up',
            'left',
            'down'
        ];

        $steps = 1;
        while (count($numbers) < $squares) {
            $i = count($numbers);
            
            if ($i % 2 == 1 ) {
                $steps += 1;
                var_dump($steps);
            }
            $numbers[$i] = [$x,$y];
        }
        $this->squares = $numbers;
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

}