<?php
$logFile = __DIR__ . '/logs.txt';
$visitors = [];

if(file_exists($logFile)){
    $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach($lines as $line){
        $parts = explode(' | ', $line);
        if(count($parts) === 4){
            $visitors[] = [
                'time' => $parts[0],
                'ip' => $parts[1],
                'user_agent' => $parts[2],
                'page' => $parts[3]
            ];
        }
    }
}

header('Content-Type: application/json');
echo json_encode($visitors);
?>