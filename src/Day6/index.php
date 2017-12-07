<?php
require('vendor/autoload.php');

$input = file_get_contents(__DIR__.'/input.txt');

function run_the_code($input)
{
    $steps = 0;
    $seen = [];
    $memory = explode("\t", $input);

    while (!in_array($memory, $seen)) {
        $seen[] = $memory;

        // choose largest
        $max = max($memory);
        $maxI = array_keys(array_filter($memory, function ($i) use ($max) {
            return $i == $max;
        }))[0];

        // redistribute
        $memory[$maxI] = 0;
        while ($max) {
            $maxI = ($maxI + 1) % count($memory);
            $memory[$maxI]++;
            $max--;
        }

        $steps++;
    }

    $seenI = array_keys(array_filter($seen, function ($i) use ($memory) {
        return $i == $memory;
    }))[0];

    return count($seen) - $seenI;
}

die(var_dump($input));
die(var_dump(run_the_code($input)));

#$input = '0 2 7 0';
$memory = new Advent\Day6\Memory($input);
while (!in_array($memory->getBanksAsString(), $memory->previousBanks)) {
    if (count(array_unique($memory->allBanks)) != count($memory->allBanks)) {
        die(var_dump(count($memory->previousBanks)));
    }
    $memory->moveBlock($memory->largestBlockIndex());
}
#echo count($memory->previousBanks);
#echo count($memory->allBanks) - count(array_unique($memory->allBanks));
/* while (count(array_unique($memory->allBanks)) == count($memory->allBanks)) {
    $memory->moveBlock($memory->largestBlockIndex());
} */