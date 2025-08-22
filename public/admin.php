<?php
date_default_timezone_set('Asia/Jakarta');
$logFile = 'logs.txt';
$adminPass = 'rahasia123';
$auth = $_GET['key'] ?? '';
if ($auth !== $adminPass) {
    http_response_code(403);
    echo "Forbidden! Wrong key.";
    exit;
}
$lines = file_exists($logFile) ? file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
$lines = array_reverse($lines);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard - Visitor Logs</title>
<style>
    body { font-family: Arial, sans-serif; background:#f0f2f5; margin:0; padding:20px; }
    h1 { text-align:center; color:#333; }
    table { width:100%; border-collapse: collapse; margin-top:20px; }
    th, td { padding:10px; border:1px solid #ccc; text-align:left; font-size:0.9rem; }
    th { background:#5e72e4; color:white; }
    tr:nth-child(even) { background:#f7f7f7; }
    button { padding:10px 20px; background:#ff6b9e; color:white; border:none; border-radius:5px; cursor:pointer; margin-bottom:20px;}
    button:hover { background:#ff85b3; }
</style>
<script>
setInterval(() => {
    fetch(location.href)
        .then(res => res.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            document.getElementById('logsTable').innerHTML = doc.getElementById('logsTable').innerHTML;
        });
}, 5000);
function clearLogs() {
    if(confirm("Are you sure you want to clear all logs?")) {
        fetch('clear_logs.php?key=<?php echo $auth; ?>')
            .then(() => location.reload());
    }
}
</script>
</head>
<body>
<h1>Visitor Dashboard</h1>
<button onclick="clearLogs()">Clear Logs</button>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Waktu</th>
            <th>IP</th>
            <th>User Agent</th>
            <th>Halaman</th>
        </tr>
    </thead>
    <tbody id="logsTable">
        <?php foreach($lines as $index => $line): 
            $parts = explode('|', $line);
        ?>
        <tr>
            <td><?php echo $index+1; ?></td>
            <td><?php echo trim($parts[0]); ?></td>
            <td><?php echo trim($parts[1]); ?></td>
            <td><?php echo trim($parts[2]); ?></td>
            <td><?php echo trim($parts[3]); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
