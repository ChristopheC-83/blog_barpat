const writeList = document.querySelector(".writeList");
const addPhotoList = document.querySelector(".addPhotoList");
const updateTextList = document.querySelector(".updateTextList");
const btnAddTxt = document.getElementById("btnAddTxt");
const btnAddMedia = document.getElementById("btnAddMedia");
const btnUpdateText = document.getElementById("btnUpdateText");

if (btnAddTxt) {
  btnAddTxt.addEventListener("click", () => {
    if (writeList) {
      writeList.classList.add("dnone");
    }
    if (addPhotoList) {
      addPhotoList.classList.add("dnone");
    }
    if (updateTextList) {
      updateTextList.classList.add("dnone");
    }

    writeList.classList.remove("dnone");
  });
}

if (btnAddMedia) {
  btnAddMedia.addEventListener("click", () => {
    if (writeList) {
      writeList.classList.add("dnone");
    }
    if (addPhotoList) {
      addPhotoList.classList.add("dnone");
    }
    if (updateTextList) {
      updateTextList.classList.add("dnone");
    }
    addPhotoList.classList.remove("dnone");
  });
}
if (btnUpdateText) {
  btnUpdateText.addEventListener("click", () => {
    if (writeList) {
      writeList.classList.add("dnone");
    }
    if (addPhotoList) {
      addPhotoList.classList.add("dnone");
    }
    if (updateTextList) {
      updateTextList.classList.add("dnone");
    }
    updateTextList.classList.remove("dnone");
  });
}

const btnDelete = document.querySelectorAll(".btnDelete");
if (btnDelete) {
  btnDelete.forEach((btn) => {
    btn.addEventListener("click", () => {
      confirm("Voulez-vous vraiment effacer cet article ?");
      console.log("clic delete");
    });
  });
}
