document.addEventListener('DOMContentLoaded', () => {
  // check for preference
  let userBrightness = localStorage.brightness;
  // function variables
  const nightTime = document.getElementById('darkmode');
  const lightSwitch = document.getElementById('darkmodecheck');
  const body = document.querySelector('body');
  const header = document.querySelector('header');
  const bgcaption = document.getElementById('bgcaption');
  // use stored preference
  if (userBrightness == "dark") {
    lightSwitch.checked = true;
    body.setAttribute('class', 'dark');
    header.setAttribute('class', 'darkheader');
    bgcaption.textContent = 'The bright red neon sign of the Hotel Paisano, built in 1929 to plans by Henry Trost, in Marfa, Texas';
  }
  else {
    lightSwitch.checked = false;
    body.removeAttribute('class');
    header.setAttribute('class', 'header');
    bgcaption.textContent = 'The Bridge of the Gods over the Columbia River between North Bonneville, Washington, and Cascade Locks, Oregon';
  }
  // lightswitch event listener
  nightTime.addEventListener('click', () => {
    if (lightSwitch.checked == false) { // make sure we don't fall out of sync
      darkHeaderGet = new XMLHttpRequest();
      darkHeaderGet.open('GET', 'images/paisano.jpg');
      darkHeaderGet.send();
      lightSwitch.checked = true;
      localStorage.setItem("brightness", "dark");
      body.setAttribute('class', 'dark');
      header.setAttribute('class', 'darkheader');
      bgcaption.textContent = 'The bright red neon sign of the Hotel Paisano, built in 1929 to plans by Henry Trost, in Marfa, Texas';
    }
    else {
      lightHeaderGet = new XMLHttpRequest();
      lightHeaderGet.open('GET', 'images/bonneville.jpg');
      lightHeaderGet.send();
      lightSwitch.checked = false;
      localStorage.setItem("brightness", "light");
      body.removeAttribute('class');
      header.setAttribute('class', 'header');
      bgcaption.textContent = 'The Bridge of the Gods over the Columbia River between North Bonneville, Washington, and Cascade Locks, Oregon';
    }
  });
});
