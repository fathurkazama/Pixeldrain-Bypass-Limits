<?php
// Fathur ID
date_default_timezone_set('Asia/Jakarta');
$workers = [
    "pd1.sriflix.my",
    "pd2.sriflix.my",
    "pd3.sriflix.my",
    "pd4.sriflix.my",
    "pd5.sriflix.my",
    "pd6.sriflix.my",
    "pd7.sriflix.my",
    "pd8.sriflix.my",
    "pd9.sriflix.my",
    "pd10.sriflix.my"
];
$corsHeaders = [
    'Access-Control-Allow-Origin' => '*',
    'Access-Control-Allow-Methods' => 'GET,HEAD,POST,OPTIONS',
    'Access-Control-Allow-Headers' => 'Content-Type',
    'Access-Control-Max-Age' => '86400'
];
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    foreach ($corsHeaders as $key => $value) {
        header("$key: $value");
    }
    exit;
}
foreach ($corsHeaders as $key => $value) {
    header("$key: $value");
}
$logFile = __DIR__ . '/logs.txt';
$ip = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'UNKNOWN';
$page = $_SERVER['REQUEST_URI'] ?? 'UNKNOWN';
$time = date('c');
$logLine = "$time | $ip | $userAgent | $page\n";
file_put_contents($logFile, $logLine, FILE_APPEND | LOCK_EX);
$fileId = '';
if (!empty($_SERVER['PATH_INFO'])) {
    $parts = explode('/', trim($_SERVER['PATH_INFO'], '/'));
    $fileId = $parts[0] ?? '';
}
if (!$fileId && !empty($_GET['fileId'])) {
    $fileId = trim($_GET['fileId']);
}
if (!$fileId) {
    http_response_code(400);
    header("Content-Type: text/plain");
    echo "Missing fileId. Contoh URL: fungsi.php/e75isJ7y atau fungsi.php?fileId=e75isJ7y";
    exit;
}
$randomWorker = $workers[array_rand($workers)];
header("Location: https://{$randomWorker}/api/file/{$fileId}?download", true, 302);
exit;
?>
