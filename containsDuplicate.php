<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums) {
        sort($nums);
        
        for($i = 0; $i < count($nums); $i++) {
            if (!isset($nums[$i+1])) {
                return false;
            }
            if ($nums[$i] == $nums[$i + 1]) {
                return true;
            }
        }
        return false;
    }
}