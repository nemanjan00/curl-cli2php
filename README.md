# curl-cli2php

```php
╭─nemanjan00@nemanjan00-laptop  ~/curl-bash2php  ‹master› 
╰─$ php cli2php.php curl 'https://github.com/nemanjan00/curl-cli2php/blob/master/cli2php.php' -H 'Accept-Encoding: gzip, deflate, sdch' -H 'Accept-Language: en-US,en;q=0.8' -H 'Upgrade-Insecure-Requests: 1' -H 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8' -H 'Referer: https://github.com/new' -H 'Connection: keep-alive' -H 'Cache-Control: max-age=0' --compressed
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://github.com/nemanjan00/curl-cli2php/blob/master/cli2php.php");

$headers = [
	"Accept-Encoding: gzip, deflate, sdch",
	"Accept-Language: en-US,en;q=0.8",
	"Upgrade-Insecure-Requests: 1",
	"User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36",
	"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
	"Referer: https://github.com/new",
	"Connection: keep-alive",
	"Cache-Control: max-age=0",
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_ENCODING, '');curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);
curl_close($ch);

echo $server_output; 

```
