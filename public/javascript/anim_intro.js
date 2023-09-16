
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
});
animIntro.from(introFleche, {
  x: -imageWidth * 0.5,
  duration: 1.25,
  autoAlpha: 0,
}, "-=0.5");
animIntro.from(introDev, {
  x: -imageWidth * 0.5,
  duration: 1.25,
  autoAlpha: 0,
}, "-=0.5");



