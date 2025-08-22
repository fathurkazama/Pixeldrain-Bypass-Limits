<?php
$adminPass = 'rahasia123';
$auth = $_GET['key'] ?? '';
if ($auth !== $adminPass) {
    http_response_code(403);
    echo "Forbidden!";
    exit;
}

$logFile = 'logs.txt';
if(file_exists($logFile)) file_put_contents($logFile, '');
echo "Logs cleared!";