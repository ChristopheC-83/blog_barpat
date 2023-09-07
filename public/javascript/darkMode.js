const darkModeBtn = document.querySelector("#darkMode");

const isDarkModeStored = localStorage.getItem("darkMode");

let test = isDarkModeStored;

if (isDarkModeStored != null || isDarkModeStored != undefined ) {
  if (isDarkModeStored === "true") {
    document.body.classList.add("darkMode");
    test = true;
    darkModeBtn.checked = false;
    console.log("btn : " + darkModeBtn.checked);
  } else {
    document.body.classList.remove("darkMode");
    test = false;
    darkModeBtn.checked = true;
    console.log("btn : " + darkModeBtn.checked);
  }
} else {
  localStorage.setItem("darkMode", false);
  document.body.classList.remove("darkMode");
  test = false;
  darkModeBtn.checked = true;
  console.log("btn : " + darkModeBtn.checked);
}

function toggleDarkMode() {
  document.body.classList.toggle("darkMode");
  test = !test;
  localStorage.setItem("darkMode", test);
  darkModeBtn.checked = !test;
  console.log("isDarkModeStored : " + isDarkModeStored);
  console.log("btn : " + darkModeBtn.checked);
}

darkModeBtn.addEventListener("change", toggleDarkMode);
