<?php
require('vendor/autoload.php');

$input = file_get_contents(__DIR__.'/input.txt');
#$input = '0 2 7 0';
$memory = new Advent\Day6\Memory($input);
while (!in_array($memory->getBanksAsString(), $memory->previousBanks)) {
    $memory->moveBlock($memory->largestBlockIndex());
}
echo count($memory->previousBanks);