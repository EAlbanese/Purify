function CookieAccepted() {
  document.getElementById("cookie-consent-banner").remove();
  localStorage.setItem('cookie-banner-jg', 1);
}

function CookieRefused() {
  document.body.innerHTML = " <section class='wrapper style5'><div class='inner''><p>Bitte akzepieren Sie unsere Cookies, damit wir Ihnen die bestmögliche Unterstützung bieten können.</p><br /> <a href='index.html' class='button'>Zurück</a><div></section>";
}

if (!localStorage.getItem('cookie-banner-jg')) {
  document.getElementById("cookie-consent-banner").style.display = 'block';
}