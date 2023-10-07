//3d cards

const card3D = document.querySelectorAll(".link_card");

card3D.forEach((el) => {
  el.addEventListener("mousemove", (e) => {
    let elRect = el.getBoundingClientRect();
    // console.log(elRect);
    let x = e.clientX - elRect.x;
    let y = e.clientY - elRect.y;

    let midCardWidth = elRect.width / 4;
    let midCardHeight = elRect.height / 4;

    let angleY = -(x - midCardWidth) / 5;
    let angleX = (y - midCardHeight) / 5;

    el.children[0].style.transform = `rotateX(${angleX}deg) rotateY(${angleY}deg) `;
  });

  el.addEventListener("mouseleave", () => {
    el.children[0].style.transition = "transform 0.75s";
    el.children[0].style.transform = `rotateX(0) rotateY(0)`;
  });
});
