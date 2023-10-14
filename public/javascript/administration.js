const writeList = document.querySelector(".writeList");
const addPhotoList = document.querySelector(".addPhotoList");
const btnAddTxt = document.getElementById("btnAddTxt");
const btnAddMedia = document.getElementById("btnAddMedia");

btnAddTxt.addEventListener("click", () => {
  if (writeList) {
    writeList.classList.add("dnone");
  }
  if (addPhotoList) {
    addPhotoList.classList.add("dnone");
  }

  writeList.classList.remove("dnone");
});
btnAddMedia.addEventListener("click", () => {
  if (writeList) {
    writeList.classList.add("dnone");
  }
  if (addPhotoList) {
    addPhotoList.classList.add("dnone");
  }
  addPhotoList.classList.remove("dnone");
});
