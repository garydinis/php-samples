<?php

//sorted array
function removeDuplicates($nums) {
    $index = 1;
    for ($i = 0; $i < count($nums)-1; $i++) {
        if ($nums[$i] != $nums[$i + 1]) {
            $nums[$index++] = $nums[$i + 1];
        }
    }
    return $index;
}