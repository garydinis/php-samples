<?php
/*
* You are in charge of a display advertising program. Your ads are displayed on websites all over the internet. 
* You have some CSV input data that counts how many times that users have clicked on an ad on each individual domain. 
* Every line consists of a click count and a domain name, like this: 
* counts = [ 
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

     "1,google.co.uk"] 
     Write a function that takes this input as a parameter and returns a data structure containing the number of clicks that were recorded on each domain AND each subdomain under it. For example, a click on "mail.yahoo.com" counts toward the totals for "mail.yahoo.com", "yahoo.com", and "com". (Subdomains are added to the left of their parent domain. So "mail" and "mail.yahoo" are not valid domains. Note that "mobile.sports" appears as a separate domain near the bottom of the input.)

*/

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