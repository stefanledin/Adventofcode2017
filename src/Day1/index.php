<?php
require('vendor/autoload.php');
use Advent\Day1\InverseCaptcha;

$input = file_get_contents(__DIR__.'/input.txt');

$inverseCaptcha = new InverseCaptcha();

echo $inverseCaptcha->getSum($input);
echo "=======\n";
echo $inverseCaptcha->getSum2(($input));