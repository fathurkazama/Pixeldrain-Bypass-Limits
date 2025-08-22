const themeToggle = document.getElementById('themeToggle');
const body = document.body;
const currentTheme = localStorage.getItem('theme');
if (currentTheme) {body.setAttribute('data-theme', currentTheme); updateToggleIcon();}
themeToggle.addEventListener('click', () => {
    if(body.getAttribute('data-theme')==='dark'){body.removeAttribute('data-theme'); localStorage.setItem('theme','light');} 
    else {body.setAttribute('data-theme','dark'); localStorage.setItem('theme','dark');}
    updateToggleIcon();
});
function updateToggleIcon(){
    const icon = themeToggle.querySelector('i');
    if(body.getAttribute('data-theme')==='dark'){icon.classList.replace('fa-moon','fa-sun');} 
    else {icon.classList.replace('fa-sun','fa-moon');}
}

async function loadVisitors(){
    try{
        const res = await fetch('get_visitors.php');
        const data = await res.json();
        document.getElementById('counter').textContent = `${data.length.toLocaleString()} visitors`;
        const now = new Date();
        const onlineUsers = data.filter(v=> (now - new Date(v.time))<5*60*1000).length;
        document.getElementById('onlineVisitors').textContent = onlineUsers;
    } catch(e){console.error('Failed to load visitors:',e);}
}
loadVisitors();
setInterval(loadVisitors,10000);

function downloadFile(){
    const input=document.getElementById('inputUrl').value.trim();
    const match=input.match(/pixeldrain\.com\/u\/(\w+)/);
    if(!match){alert('Please enter a valid PixelDrain URL!\nExample: https://pixeldrain.com/u/abc123'); return;}
    const fileId=match[1];
    const bypassUrl=`fungsi.php/${fileId}`;
    const a=document.createElement('a'); a.href=bypassUrl; a.target='_blank'; a.rel='noopener noreferrer'; document.body.appendChild(a); a.click(); document.body.removeChild(a);
    const btn=document.querySelector('.btn'); const originalHtml=btn.innerHTML;
    btn.innerHTML='<i class="fas fa-spinner fa-spin"></i> Downloading...'; btn.disabled=true;
    setTimeout(()=>{btn.innerHTML=originalHtml; btn.disabled=false;},3000);
}

function setViewportHeight(){document.documentElement.style.setProperty('--vh',`${window.innerHeight*0.01}px`);}
window.addEventListener('load',setViewportHeight); window.addEventListener('resize',setViewportHeight);
