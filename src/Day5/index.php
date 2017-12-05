<?php
require('vendor/autoload.php');

$input = file(__DIR__.'/input.txt');
$maze = new Advent\Day5\Maze($input);
while (!$maze->outside()) {
    $maze->jump2();
    if ($maze->outside()) {
        #echo $maze->stepsTaken();
        #die(var_dump($maze->stepsTaken()));
    }
}
echo $maze->stepsTaken();