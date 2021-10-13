<?php

class Solution {

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        if ($n < 0) {
            return 1.0 / $this->helper($x, abs($n));
        }
        return $this->helper($x, $n);
    }

    function helper($x, $n) {
        $n = (int) $n;
        if ($n == 0) { return 1; }
        if ($n == 1) { return $x; }
        
        if ($n % 2 == 0) {
            $result = $this->myPow($x * $x, $n / 2);
        } else {
            $result = $x * $this->myPow($x * $x, $n / 2);
        }
        return $result;   
    }
}