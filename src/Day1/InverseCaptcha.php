<?php
namespace Advent\Day1;

class InverseCaptcha {
    
    public function getSum($captcha)
    {
        $captcha = str_split($captcha);
        $sum = 0;
        for ($i=0; $i < \count($captcha); $i++) { 

            $next = ( !empty($captcha[$i+1])) ? $captcha[$i+1] : $captcha[0];
            if ($captcha[$i] == $next) {
                $sum += (int) $captcha[$i];
            }
        }
        return $sum;
    }

    public function getSum2($captcha)
    {
        $captcha = str_split($captcha);
        $sum = 0;

        // [1,2,1,2]
        // 2

        for ($i=0; $i < \count($captcha); $i++) {
            $steps = \count($captcha) / 2;
            
            // $i = 0
            // $captcha[0] = 1
            // $pointer = 0
            $pointer = $i;
            while ($steps > 0) {
                if (isset($captcha[$pointer + 1])) {
                    $pointer += 1;
                } else {
                    $pointer = 0;
                }
                $steps--;
            }
            $next = $captcha[$pointer];

            if ($captcha[$i] == $next) {
                $sum += (int)$captcha[$i];
            }
        }
        return $sum;
    }

}
