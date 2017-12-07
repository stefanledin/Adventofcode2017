<?php
namespace Advent\Day6;

class Memory {
    public $banks;
    public $previousBanks = [];
    public $allBanks = [];

    public function __construct($banks)
    {
        $this->banks = array_map(function($bank) {
            return (int) $bank;
        }, explode(' ', trim($banks)));
    }

    public function moveBlock($fromIndex)
    {
        $this->previousBanks[] = $this->getBanksAsString();
        $blocksToShare = $this->banks[$fromIndex];
        $this->banks[$fromIndex] = 0;
        $i = $fromIndex;
        while ($blocksToShare > 0) {
            $this->allBanks[] = implode(' ', $this->banks);
            $i++;
            if ($i == count($this->banks)) {
                $i = 0;
            }
            if ( ($i == $fromIndex) && ($blocksToShare > 1) ) {
                continue;
            } else {
                $this->banks[$i] += 1;   
                $blocksToShare--;
            }
        }
        $this->allBanks[] = implode(' ', $this->banks);
    }

    public function largestBlockValue() {
        return $this->banks[$this->largestBlockIndex()];
    }

    public function largestBlockIndex()
    {
        $banks = $this->banks;
        $banks = array_unique($banks);
        arsort($banks);
        return key($banks);
    }

    public function getBanksAsString()
    {
        return implode(' ', $this->banks);
    }
}