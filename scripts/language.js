function getElements() {
  headerHome = document.getElementById('home');
  headerAbout = document.getElementById('about');
  headerContact = document.getElementById('contact');
  sidebarBrightness = document.getElementById('brightness');
  sidebarLanguages = document.getElementById('sidebarlanguages');
  sidebarTags = document.getElementById('sidebartags');
  sidebarArchives = document.getElementById('archives');
}

function inEnglish() {
  getElements();
  // in the Queen's English, please
  headerHome.textContent = "Home";
  headerAbout.textContent = "About";
  headerContact.textContent = "Contact";
  sidebarBrightness.textContent = "Brightness";
  sidebarLanguages.textContent = "Languages";
  sidebarTags.textContent = "Tags";
  sidebarArchives.textContent = "Archives";
  // and don't you forget it!
  localStorage.setItem("language", "English");
}

function inGerman() {
  getElements();
  // Mit Gott spreche ich spanisch, mit Frauen, italienisch, mit Männer, französisch, und mit meinem Pferd, deutsch
  headerHome.textContent = "Startseite";
  headerAbout.textContent = "Über";
  headerContact.textContent = "Kontakt";
  sidebarBrightness.textContent = "Helligkeit";
  sidebarLanguages.textContent = "Sprache";
  sidebarTags.textContent = "Tags";
  sidebarArchives.textContent = "Archiv";
  // vergessen Sie das einfach nicht!
  localStorage.setItem("language", "German");
}

function inHungarian() {
  getElements();
  // Hiába beszélt Ferdinánd hat nyelvet ha a magyar ember nem értett csak egyet
  headerHome.textContent = "Főoldal";
  headerAbout.textContent = "Erről";
  headerContact.textContent = "Kapcsolat";
  sidebarBrightness.textContent = "Napsütés";
  sidebarLanguages.textContent = "Nyelvek";
  sidebarTags.textContent = "Témák";
  sidebarArchives.textContent = "Archivum";
  // és soha ne felejtsd el!
  localStorage.setItem("language", "Hungarian");
}

function initLang() {
  // check for a preference
  let userLang = localStorage.language;
  switch(userLang) {
    case "English":
    inEnglish(); break;
    case "German":
    inGerman(); break;
    case "Hungarian":
    inHungarian(); break;
    default: // if no/unreadable local storage use English
    inEnglish();
  }
}

document.addEventListener('DOMContentLoaded', () => {
  initLang();
  const langEn = document.getElementById('en');
  langEn.addEventListener('click', inEnglish);
  const langDe = document.getElementById('de');
  langDe.addEventListener('click', inGerman);
  const langHu = document.getElementById('hu');
  langHu.addEventListener('click', inHungarian);
});
