<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pixeldrain Downloader | Direct Link Generator</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body>
<button class="theme-toggle" id="themeToggle" aria-label="Toggle dark mode">
    <i class="fas fa-moon"></i>
</button>
<a href="https://wa.me/6281234567890" class="live-chat" aria-label="Live Chat via WhatsApp" target="_blank">
    <i class="fab fa-whatsapp" style="font-size: 1.5rem;"></i>
</a>
<div class="container">
    <div class="card">
        <div class="logo-container">
            <img src="/logo.png" alt="Pixeldrain Downloader Logo" class="logo">
            <h1 class="logo-text">Pixeldrain Downloader</h1>
            <p class="logo-subtext">Convert and Bypass limits Pixeldrain to direct downloads</p>
        </div>
        <div class="input-group">
            <input type="text" id="inputUrl" placeholder="https://pixeldrain.com/u/xxxxxx" aria-label="Pixeldrain URL">
        </div>
        <button class="btn" onclick="downloadFile()">
            <i class="fas fa-download"></i>
            <span>Download Now</span>
        </button>
        <div class="input-group" style="margin-top:1.5rem;">
            <a href="about.php" style="text-decoration:none;">
                <textarea readonly rows="4" style="cursor:pointer;">
Hi, I’m Fathur. Click here to learn more about me!
                </textarea>
            </a>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="footer-content">
        <div>Special made with <span class="heart"><i class="fas fa-heart"></i></span> by <a href="https://facebook.com/fathur.yt.7" target="_blank">Fathur ID</a></div>
        <div class="real-time-visitors">
            <span class="online-dot"></span>
            <span id="onlineVisitors">0</span> users online now
        </div>
        <div class="visitor-counter">
            <i class="fas fa-users"></i>
            <span id="counter">0 visitors telah menggunakan</span>
        </div>
    </div>
</footer>

<script src="script.js"></script>
</body>
</html>
