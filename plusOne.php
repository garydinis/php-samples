<?php

//You are given a large integer represented as an integer array digits, 
//where each digits[i] is the ith digit of the integer.
//The digits are ordered from most significant to least significant in left-to-right order
class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
        
        for($x = count($digits)-1; $x >= 0; $x--) {
            if ($digits[$x] < 9) {
                $digits[$x]++;
                return $digits;
            }
            $digits[$x] = 0;
        }
        
        
        $result = array_fill(0,count($digits)+1,0);
        $result[0] = 1;
        return $result;
    }
}