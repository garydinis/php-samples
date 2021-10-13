<?php

$string = "my string";
$len = strlen($string);
$rev = strrev($string);

$str_array = explode(" ", $string);
$str_array = array_reverse($str_array);

$first_char = substr($string, 0, 1); //first element of string array limit of 1
$first_char1 = $string[0];

print "$first_char vs $first_char1" . PHP_EOL;

print "length = $len" . PHP_EOL;
print "backwards = $rev" . PHP_EOL;
print "reverse = " . implode(" ", $str_array) . PHP_EOL;
print $string[$len - 1] . PHP_EOL;