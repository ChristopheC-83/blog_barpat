const card3D = document.querySelectorAll(".link_card");

card3D.forEach((el) => {
  el.addEventListener("onmouseover", () => {
    console.log("je suis over!!!");
  });

  el.addEventListener("mousemove", (e) => {
    let elRect = el.getBoundingClientRect();
    let x = e.clientX - elRect.left;
    let y = e.clientY - elRect.top;

    let midCardWidth = elRect.width / 2;
    let midCardHeight = elRect.height / 2;

    let angleY = -(x - midCardWidth) / 5;
    let angleX = (y - midCardHeight) / 5;

    el.children[0].style.transition = "none";
    el.children[0].style.transform = `rotateX(${angleX}deg) rotateY(${angleY}deg)`;
  });

  el.addEventListener("mouseleave", () => {
    el.children[0].style.transition = "transform 0.75s";
    el.children[0].style.transform = `rotateX(0deg) rotateY(0deg)`;
  });

  
});

// ############################
// animation cartes seulement accueil

const currentUrl = window.location.href;
const delay = 50;

const isHomepage = "http://localhost:8090/kiki/barpat_blog/";
const isAccueil = "http://localhost:8090/kiki/barpat_blog/accueil";

card3D.forEach((element) => {
  if (currentUrl === isHomepage || currentUrl === isAccueil) {
    element.classList.add("dnone");
    element.classList.remove("dnone");

    element.classList.add("apparitionCard");
  }
});
