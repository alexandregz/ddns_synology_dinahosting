#!/usr/bin/php -d open_basedir=/usr/syno/bin/ddns
<?php

if ($argc !== 5) {
    echo 'badparam';
    exit();
}

$account = (string)$argv[1];
$pwd = (string)$argv[2];
list($hostname, $domain) = explode(".", $argv[3], 2);   // we have only one field to hostname+domain
$ip = (string)$argv[4];


// only for IPv4 format
if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
    echo "badparam";
    exit();
}

$url = "https://dinahosting.com/special/api.php?AUTH_USER=$account&AUTH_PWD=$pwd&responseType=Json&domain=$domain&hostname=$hostname&ip=$ip&command=Domain_Zone_UpdateTypeA";

$req = curl_init();
curl_setopt($req, CURLOPT_URL, $url);
curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($req);
curl_close($req);

// modified by alexandregz
$data = json_decode($res, true);
if($data['responseCode'] == 1000) {
	echo "good";
}
else{
	echo "badresolv";
}
exit;
