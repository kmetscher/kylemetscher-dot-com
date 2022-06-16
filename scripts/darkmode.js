document.addEventListener('DOMContentLoaded', () => {
  // check for preference
  let userBrightness = localStorage.brightness;
  // function variables
  const nightTime = document.getElementById('darkmode');
  const lightSwitch = document.getElementById('darkmodecheck');
  const body = document.querySelector('body');
  const header = document.querySelector('header');
  // use stored preference
  if (userBrightness == "dark") {
    lightSwitch.checked = true;
    body.setAttribute('class', 'dark');
    header.setAttribute('class', 'darkheader');
  } // there's no need to define light specifically as it is the default
  // lightswitch event listener
  nightTime.addEventListener('click', () => {
    if (lightSwitch.checked == false) { // make sure we don't fall out of sync
      lightSwitch.checked = true;
      localStorage.setItem("brightness", "dark");
      body.setAttribute('class', 'dark');
      header.setAttribute('class', 'darkheader');
    }
    else {
      lightSwitch.checked = false;
      localStorage.setItem("brightness", "light");
      body.removeAttribute('class');
      header.setAttribute('class', 'header');
    }
  });
});
