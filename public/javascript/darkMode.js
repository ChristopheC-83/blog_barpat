const darkModeBtn = document.querySelector("#darkMode");
const darkBurger = document.querySelectorAll(".hamburger span");

const partArticle = document.querySelectorAll(".part");

const overlay2 = document.querySelector(".overlay");
const btn_menu_responsive = document.querySelector(".btn_menu_responsive");
const flecheSliderBox = document.querySelector(".flecheSliderBox");

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
  bool
    ? btn_menu_responsive.classList.add("btn_menu_responsive_dark")
    : btn_menu_responsive.classList.remove("btn_menu_responsive_dark");
  // bool
  //   ? arrow_btn.classList.add("arrow_btn_dark")
  //   : arrow_btn.classList.remove("arrow_btn_dark");
  if (flecheSliderBox) {
    bool
      ? flecheSliderBox.classList.add("flecheSliderBox_darkMode")
      : flecheSliderBox.classList.remove("flecheSliderBox_darkMode");
  }

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
  btn_menu_responsive.classList.toggle("btn_menu_responsive_dark");
  arrow_btn.classList.toggle("arrow_btn_dark");
  if (flecheSliderBox) {
    flecheSliderBox.classList.toggle("flecheSliderBox_darkMode");
  }
}

darkModeBtn.addEventListener("change", toggleDarkMode);
