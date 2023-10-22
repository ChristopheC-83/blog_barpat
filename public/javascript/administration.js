const writeList = document.querySelector(".writeList");
const addPhotoList = document.querySelector(".addPhotoList");
const updateTextList = document.querySelector(".updateTextList");
const updateCardList = document.querySelector(".updateCardList");
const btnAddTxt = document.getElementById("btnAddTxt");
const btnAddMedia = document.getElementById("btnAddMedia");
const btnUpdateText = document.getElementById("btnUpdateText");
const btnUpdateCard = document.getElementById("btnUpdateCard");

let listButtonSet = [
  { btn: btnAddTxt, list: writeList },
  { btn: btnAddMedia, list: addPhotoList },
  { btn: btnUpdateText, list: updateTextList },
  { btn: btnUpdateCard, list: updateCardList },
];

function hideList() {
  listButtonSet.forEach((item) => {
    if (item.list) {
      item.list.classList.add("dnone");
    }
  });
}

function showList(pair) {
  pair.forEach((item) => {
    let btn = item.btn;
    let list = item.list;

    if (btn) {
      btn.addEventListener("click", () => {
        hideList();
        list.classList.remove("dnone");
      });
    }
  });
}

showList(listButtonSet);

const btnDeleteArticle = document.querySelectorAll(".btnDelete");
if (btnDeleteArticle) {
  btnDeleteArticle.forEach((btn) => {
    btn.addEventListener("click", () => {
      confirm("Voulez-vous vraiment effacer cet article ?");
      console.log("clic delete");
    });
  });
}
