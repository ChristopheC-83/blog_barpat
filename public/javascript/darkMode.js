const darkModeBtn = document.querySelector("#darkMode");
const darkBurger = document.querySelectorAll(".hamburger span");

const partArticle = document.querySelectorAll(".part");


const overlay2 = document.querySelector(".overlay");
const isDarkModeStored = localStorage.getItem("darkMode");

let stateDarkMode = isDarkModeStored;

function setUpDarkMode(bool) {
  bool
    ? document.body.classList.add("darkMode")
    : document.body.classList.remove("darkMode");
  bool
    ? overlay2.classList.add("darkOverlay")
    : overlay2.classList.remove("darkOverlay");
  bool
    ? partArticle.forEach((element) => {
      element.classList.add("darkPart");
    })
    : partArticle.forEach((element) => {
      element.classList.remove("darkPart");
    });
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
  overlay2.classList.toggle("darkOverlay");
  stateDarkMode = !stateDarkMode;
  localStorage.setItem("darkMode", stateDarkMode);
  darkModeBtn.checked = stateDarkMode;
  darkBurger.forEach((burg) => {
    burg.classList.toggle("darkBurger");
  });
  partArticle.forEach((element) => {
    element.classList.toggle("darkPart");
  });
}

darkModeBtn.addEventListener("change", toggleDarkMode);
