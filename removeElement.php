<?php

//return the position of the element to remove
function removeElement($nums, $val) {
    $j = 0;
    for ($i = 0; $i < count($nums); $i++) {
        if ($nums[$i] != $val) {
            $nums[$j] = $nums[$i];
            $j++;
        }
    }
    return $j;
}

print removeElement([1,3,4,5,9,2], 2);
