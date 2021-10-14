<?php

$count = [
    "900,google.com",
    "60,mail.yahoo.com",
    "10,mobile.sports.yahoo.com",
    "40,sports.yahoo.com",
    "300,yahoo.com",
    "10,stackoverflow.com",
    "20,overflow.com",
    "5,com.com",
    "2,en.wikipedia.org",
    "1,m.wikipedia.org",
    "1,mobile.sports",
    "1,google.co.uk"
];

function getSubdomainCount($count) {
    $result = [];
    foreach ($count as $raw) {
        $domain_info = explode(",", $raw);
        $domain_count = $domain_info[0];
        $domain_data = $domain_info[1];

        if (empty($result[$domain_data])) {
            $result[$domain_data] = $domain_count;
        } else {
            $result[$domain_data] += $domain_count;
        }
        
        while (true) {
            $pos = strpos($domain_data, ".");
            if (!$pos) {
                break;
            }
            $domain_data = substr($domain_data, $pos+1);
            if (isset($result[$domain_data])) {
                $result[$domain_data] += $domain_count;
            } else {
                $result[$domain_data] = $domain_count;
            }
        }
    }
    return $result;
}

print_r(getSubdomainCount($count));

?>
