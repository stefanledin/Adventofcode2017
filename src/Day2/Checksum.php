<?php
namespace Advent\Day2;

class Checksum {

    public function calculate($row)
    {
        $row = explode(' ', $row);
        asort($row);
        $row = array_filter($row);
        $row = array_values($row);
        return (int) $row[count($row)-1] - (int) $row[0];
    }

    public function calculate2($row)
    {
        $row = explode(' ', $row);
        asort($row);
        $row = array_filter($row);
        $row = array_values($row);

        $even = [];
        for ($i=0; $i < count($row); $i++) { 
            foreach ($row as $number) {
                if ($row[$i] == $number) continue;
                if ($row[$i] % $number == 0) {
                    $even[] = array($row[$i], $number);
                }
            }
        }
        $even = $even[0];
        asort($even);
        $even = array_values($even);

        return (int) $even[1] / (int) $even[0];
    }

}