<?php
namespace Advent\Day4;

class PassPhrase {

    protected $passphrase;

    public function __construct($passphrase)
    {
        $this->passphrase = $passphrase;
    }

    public function validate()
    {
        $trimmed = trim($this->passphrase);
        $words = \explode(' ', $trimmed);
        sort($words);
        $words = \array_map(function($word) {
            $word = trim($word);
            $word = str_split($word);
            natsort($word);
            return \implode('', $word);
        }, $words);
        if (count($words) == count(array_unique($words))) {
            return true;
        }
        return false;
    }
}