const intro = document.getElementById("intro");
const introCromagnon = document.getElementById("introCromagnon");
const introFleche = document.getElementById("introFleche");
const introDev = document.getElementById("introDev");

const imageWidth = introCromagnon.offsetWidth;

const animIntro = gsap.timeline();
animIntro.from(introCromagnon, {
  x: -imageWidth,
  duration: 2,
  autoAlpha: 0,
  ease: "power4.out",
  delay: 0.5,
});
animIntro.from(
  introFleche,
  {
    x: -imageWidth * 0.75,
    duration: 1.5,
    autoAlpha: 0,
    ease: "power4.out",
  },
  "-=1.5"
);
animIntro.from(
  introDev,
  {
    x: -imageWidth * 0.75,
    duration: 1.5,
    autoAlpha: 0,
    ease: "power4.out",
  },
  "-=1"
);


