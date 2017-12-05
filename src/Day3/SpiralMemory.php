<?php
namespace Advent\Day3;

class SpiralMemory {

    public $squares;    
    protected $squareValues;
    protected $squaresToCreate;
    protected $x = 0;
    protected $y = 0;

    public function __construct($squares)
    {
        $this->squaresToCreate = $squares;
        $this->squares = [];
        $this->squares[1] = [0,0];

        $stepsPerLap = 1;

        $directions = ['right', 'up', 'left', 'down'];
        $currentDirection = 0;
        
        while (count($this->squares) < $this->squaresToCreate) {
            // Byt riktning
            if ($directions[$currentDirection] == 'left') {
                $stepsPerLap += 1;
            }
            if ($directions[$currentDirection] == 'right') {
                if (\count($this->squares) > 1) {
                    $stepsPerLap += 1;
                }
            }

            $this->stepsInDirection($directions[$currentDirection], $stepsPerLap);
            
            if ($currentDirection == 3) {
                $currentDirection = 0;
            } else {
                $currentDirection += 1;
            }
        }

        $this->squareValues = $this->squares;
        $this->squareValues[1]['value'] = 1;
        for ($i=2; $i <= count($this->squareValues); $i++) { 
            if (isset($this->squareValues[$i]['value']));
            $neighbours = $this->adjacentOf($i);
            $value = 0;
            foreach ($neighbours as $square => $data) {
                $value += $data['value'];
            } 
            if ($value > $this->squaresToCreate) {
                \var_dump($i);
                die(var_dump($this->squareValues[$i]));
            }
            $this->squareValues[$i]['value'] = $value;
        }
    }

    public function stepsInDirection($direction, $steps)
    {
        while (($steps > 0) && (count($this->squares) < $this->squaresToCreate)) {
            if ($direction == 'right') {
                $this->x += 1;
            }
            if ($direction == 'up') {
                $this->y += 1;
            }
            if ($direction == 'left') {
                $this->x -= 1;
            }
            if ($direction == 'down') {
                $this->y -= 1;
            }
            $this->squares[] = [$this->x,$this->y];
            $steps--;
        }
    }

    public function stepsFor($square)
    {
        // $x1 = 0, $y1 = 0
        $center = [0,0];
        // $x2 = 0, $y2 = 1
        $from = $this->squares[$square];
        return abs( ( abs($center[0]) - abs($from[0]) ) + ( abs($center[1]) - abs($from[1]) ) );
    }

    public function adjacentOf($square)
    {
        $neighbours = $this->adjacentCoordinates($square);
        $adjacent = array_filter($this->squares, function ($square) use ($neighbours) {
            foreach ($neighbours as $neighbour) {
                if ($neighbour == $square) {
                    return $square;
                }
            }
        });
        $adjacentWithValues = [];
        foreach ($adjacent as $key => $value) {
            if (isset($this->squareValues[$key]['value'])) {
                $adjacentWithValues[$key] = $this->squareValues[$key];
            }
        }        
        return $adjacentWithValues;
    }

    public function adjacentCoordinates($square)
    {
        $centerSquare = $this->squares[$square];
        // $centerSquare = [1, 0] 
        $x = $centerSquare[0];
        $y = $centerSquare[1];

        $neighbours = [
            // Höger
            [$x+1, $y],
            // Vänster
            [$x-1, $y],
            // Över
            [$x, $y+1],
            // Under
            [$x, $y-1],
            // Snett upp till vänster
            [$x-1, $y+1],
            // Snett upp till höger
            [$x+1, $y+1],
            // Snett ned till vänster
            [$x-1, $y-1],
            // Snett ned till höger
            [$x+1, $y-1]
        ];
        return $neighbours;
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