const card3D = document.querySelectorAll(".link_card");

card3D.forEach((el) => {
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
// animation acrtes seulement accueil

const articleCard = document.querySelectorAll(".articleCard");
const currentUrl = window.location.href;

const isHomepage = "http://localhost:8090/kiki/barpat_blog/";
const isAccueil = "http://localhost:8090/kiki/barpat_blog/accueil";

articleCard.forEach((element) => {
  if (currentUrl === isHomepage || currentUrl === isAccueil) {
    element.classList.add("apparitionCard");
  }
});
