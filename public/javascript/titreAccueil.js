const lb1 = document.querySelector(".lb1");
const lb2 = document.querySelector(".lb2");
const lb3 = document.querySelector(".lb3");
const lb4 = document.querySelector(".lb4");
const lb5 = document.querySelector(".lb5");
const lb6 = document.querySelector(".lb6");
const lb7 = document.querySelector(".lb7");
const lb8 = document.querySelector(".lb8");
const lb9 = document.querySelector(".lb9");
const lb10 = document.querySelector(".lb10");
const lb11 = document.querySelector(".lb11");
const lb12 = document.querySelector(".lb12");
const lb13 = document.querySelector(".lb13");
const portable = document.querySelector('#portable')
const livre = document.querySelector('#livre')

const isDarkModeStored2 = localStorage.getItem("darkMode");

const lb_1 = document.querySelectorAll(".lb_1");
const lb_2 = document.querySelectorAll(".lb_2");
const titre1 = document.querySelector(".titrePart1");
const titre2 = document.querySelector(".titrePart2");

const tlTitre1 = gsap.timeline();
tlTitre1.fromTo(
  lb_1,
  { y: -200, autoAlpha: 0 },
  { y: -100, autoAlpha: 0.1, duration: 0.5, stagger: 0.1, ease: "none" }
);
tlTitre1.to(
  lb_1,
  { y: 0, autoAlpha: 1, duration: 0.5, stagger: 0.1, ease: "none" },
  0.5
);
tlTitre1.to(
  lb_1,
  { y: 50, autoAlpha: 1, duration: 0.25, stagger: 0.05, ease: "none" },
  1
);
tlTitre1.from(
  titre2,
  {
    x: -500,
    autoAlpha: 0,
    duration: 2,
    stagger: 0.1,
    ease: "elastic.out(3, 0.75)",
    onComplete: effetNeon,
  },
  1
);

tlTitre1.to(
  lb_1,
  { y: 0, autoAlpha: 1, duration: 0.15, stagger: -0.15, ease: "none" },
  1.5
);
tlTitre1.to(
  lb_1,
  { y: 0, autoAlpha: 1, duration: 0.15, stagger: -0.15, ease: "none" },
  3.25
);
tlTitre1.from(
  portable,
  { x: -250, autoAlpha: 0, duration: 1, ease: "elastic.out(2, 0.4)"},
  2.5
);


function effetNeon() {
  lb_1.forEach((element) => {
    element.classList.toggle("effetNeonDarkMode", isDarkModeStored2 === "true");
    element.classList.toggle("effetNeon", isDarkModeStored2 !== "true");
  });

  setTimeout(() => {
    lb_2.forEach((element2) => {
      element2.classList.toggle("effetNeonDarkMode", isDarkModeStored2 === "true");
      element2.classList.toggle("effetNeon", isDarkModeStored2 !== "true");
    });
  }, 250);
}

  