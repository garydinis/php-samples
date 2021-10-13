<?php

//Given a non-empty array of integers nums, every element appears twice except for one. Find that single one
//XOR bit manipulation
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        $result = 0;
        for($x = 0; $x < count($nums); $x++) {
            $result ^= $nums[$x]; 
        }
        return $result;
    }
}

$nums = [4,1,2,1,2];
$s = new Solution();
$result = $s->singleNumber($nums);

print "Answer to " . implode(",", $nums) . " is $result" . PHP_EOL;