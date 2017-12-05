<?php
require('vendor/autoload.php');

$examples = [
    'aa bb cc dd ee',
    'aa bb cc dd aa',
    'aa bb cc dd aaa'
];

$input = file(__DIR__.'/input.txt');
//$str = file_get_contents(__DIR__.'/input.txt');

/* echo count(array_filter(explode("\n", $str), function ($v) {
    $v = explode(' ', trim($v));
    return count(array_unique($v)) === count($v);
}));
die(); */

$valid = 0;
foreach ($input as $passPhrase) {
    if ((new Advent\Day4\PassPhrase($passPhrase))->validate()) {
        $valid += 1;
    }
}
echo $valid;