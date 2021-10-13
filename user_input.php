<?php

$get_input = true;
while($get_input) {
    print "First Number: ";
    $num1 = trim(fgets(STDIN));
    if (is_numeric($num1)) {
        $get_input = false;
    } else {
        print "Error: not a number" . PHP_EOL;
    }
}

while(true) {
    print "Second Number: ";
    $num2 = trim(fgets(STDIN));
    if (is_numeric($num2)) {
        break;
    } else {
        print "Error: not a number" . PHP_EOL;
    }
}

while(true) {
    print "Select Operator (+ - / *): ";
    $operator = trim(fgets(STDIN));
    switch($operator) {
        case "+":
            print "Total: ($num1 + $num2) " . $num1 + $num2 . PHP_EOL;
            break 2;
        case "-":
            print "Total: ($num1 - $num2) " . $num1 - $num2 . PHP_EOL;
            break 2;
        case "/":
            print "Total: ($num1 / $num2) " . $num1 / $num2 . PHP_EOL;
            break 2;
        case "*":
            print "Total: ($num1 * $num2) " . $num1 * $num2 . PHP_EOL;
            break 2;
        default:
            print "ERROR: select an operator from the following (+ - / *)" . PHP_EOL;
            break;
    }
}

