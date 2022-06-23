// PROCEDURE DIVISION.
function makeDark() {
  // what's on the menu?
  const lightSwitch = document.getElementById('darkmodecheck');
  const body = document.querySelector('body');
  const header = document.querySelector('header');
  const bgcaption = document.getElementById('bgcaption');
  // who turned off the lights?
  darkHeaderGet = new XMLHttpRequest(); // ensure that the new header image gets loaded; browsers might ditch
  darkHeaderGet.open('GET', 'images/paisano.jpg');
  darkHeaderGet.send();
  lightSwitch.checked = true; // if it's dark, the switch should be the moon
  localStorage.setItem("brightness", "dark"); // for persistence
  body.setAttribute('class', 'dark');
  header.setAttribute('class', 'darkheader');
  bgcaption.textContent = 'The bright red neon sign of the Hotel Paisano, built in 1929 to plans by Henry Trost, in Marfa, Texas';
}

function makeLight() {
  const lightSwitch = document.getElementById('darkmodecheck');
  const body = document.querySelector('body');
  const header = document.querySelector('header');
  const bgcaption = document.getElementById('bgcaption');
  lightHeaderGet = new XMLHttpRequest();
  lightHeaderGet.open('GET', 'images/bonneville.jpg');
  lightHeaderGet.send();
  lightSwitch.checked = false;
  localStorage.setItem("brightness", "light"); // and He saw that it was good
  body.removeAttribute('class');
  header.setAttribute('class', 'header');
  bgcaption.textContent = 'The Bridge of the Gods over the Columbia River between North Bonneville, Washington, and Cascade Locks, Oregon';
}

function initBrightness() {
  // does the user have a preference?
  let userBrightness = localStorage.brightness;
  // if it's dark,
  if (userBrightness == "dark") {
    makeDark(); // then make it so
  }
  else { // if not, just default to light; or if the local storage object is unreadable for some reason
    makeLight();
  }
}

function changeBrightness() {
  let userBrightness = localStorage.brightness;
  if (userBrightness == "dark") {
    makeLight(); // the inverse; if the button is one thing and gets clicked, it should toggle
  }
  else {
    makeDark();
  }
}

// add listeners on page load
document.addEventListener('DOMContentLoaded', () => {
  initBrightness(); // set the user's preferred brightness right away
  const nightTime = document.getElementById('darkmodecheck');
  nightTime.addEventListener('click', changeBrightness); // and listen in on the sun and moon
});
