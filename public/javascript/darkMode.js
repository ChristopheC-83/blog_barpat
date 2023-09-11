const darkModeBtn = document.querySelector("#darkMode");
const darkOverlay = document.querySelector(".overlay");
const darkBurger = document.querySelectorAll(".hamburger span");

const isDarkModeStored = localStorage.getItem("darkMode");

let stateDarkMode = isDarkModeStored;

function setUpDarkMode(bool) {
  bool
    ? document.body.classList.add("darkMode")
    : document.body.classList.remove("darkMode");
  stateDarkMode = bool;
  darkModeBtn.checked = bool;
}

if (isDarkModeStored != null) {
  if (isDarkModeStored === "true") {
    setUpDarkMode(true);
    darkBurger.forEach((element) => {
      element.classList.add("darkBurger");
    });
  } else {
    setUpDarkMode(false);
  }
} else {
  localStorage.setItem("darkMode", false);
  setUpDarkMode(false);
}

const lb = document.querySelectorAll(".lb");

function toggleDarkMode() {
  document.body.classList.toggle("darkMode");
  stateDarkMode = !stateDarkMode;
  localStorage.setItem("darkMode", stateDarkMode);
  darkModeBtn.checked = stateDarkMode;
  lb.forEach((element) => {
    element.classList.toggle("effetNeonDarkMode");
    element.classList.toggle("effetNeon");
  });
  darkBurger.forEach((burg) => {
    burg.classList.toggle("darkBurger");
  });
}

darkModeBtn.addEventListener("change", toggleDarkMode);
