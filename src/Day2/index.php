<?php
require('vendor/autoload.php');

use Advent\Day2\Checksum;

$input = file(__DIR__.'/input.txt');
$checksum = new Checksum();
$count = 0;
foreach ($input as $row) {
    $count += $checksum->calculate2($row);
}
echo $count;