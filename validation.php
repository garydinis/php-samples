<?php

var_dump(filter_var('bob@example.com', FILTER_VALIDATE_EMAIL));
var_dump(filter_var('http://example.com', FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED));


//regex
$email = "my@email.com";
$regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

if (preg_match($regex, $email)) {
    print "valid" . PHP_EOL;
} else {
    print "not valid" . PHP_EOL;
}