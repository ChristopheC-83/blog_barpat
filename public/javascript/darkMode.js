const darkModeBtn = document.querySelector("#darkMode");
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


function toggleDarkMode() {
  document.body.classList.toggle("darkMode");
  stateDarkMode = !stateDarkMode;
  localStorage.setItem("darkMode", stateDarkMode);
  darkModeBtn.checked = stateDarkMode;
  darkBurger.forEach((burg) => {
    burg.classList.toggle("darkBurger");
  });
}

darkModeBtn.addEventListener("change", toggleDarkMode);
