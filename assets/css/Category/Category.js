let idDelete;

const searchBox = document.getElementById("search");
const btnSearch = document.querySelector(".search-button");

function checkInputSearch(event) {
  if (event.keyCode === 13 || event.type === "click") {
    if (searchBox.value.trim() === "") {
      window.location.href =
      "/Project_WebBanHang/Template-Views/Admin/Category/Index.php";
    } else {
      window.location.href =
        "/Project_WebBanHang/Action-Controller/CategoryController/SearchGroup_action.php";
    }
  }
}
btnSearch.addEventListener("click", checkInputSearch);
searchBox.addEventListener("keypress", checkInputSearch);

const openEditModal = (id, value) => {
  const form = document.querySelector("#add_cate");
  const input = document.querySelector("#CatName");
  const title = document.querySelector("#title-model");
  const button = document.querySelector("#Button-form");

  input.value = value;
  title.innerHTML = "Chỉnh sửa danh mục";
  button.innerHTML = "Sửa";
  form.action = `/Project_WebBanHang/Action-Controller/CategoryController/EditGroup_action.php?id=${id}`;

  showBuyTicket();
};

function openModal(id) {
  var modal = document.getElementById("myModal");
  modal.classList.add("show");

  idDelete = id;
}

function closeModal() {
  var modal = document.getElementById("myModal");
  modal.classList.remove("show");

  idDelete = null;
}

function deleteItem() {
  if (idDelete) {
    window.location.href = `/Project_WebBanHang/Action-Controller/CategoryController/DeleteGroup_action.php?id=${idDelete}`;
  }
}

// modal
const addGroupButton = document.querySelectorAll(".add-product-js");
const modal = document.querySelector(".modal-addGroup");
const modalClose = document.querySelector(".js-modal-close");
const modalContainer = document.querySelector(".js-modal-container");

function showBuyTicket() {
  modal.classList.add("open");
}

function hideBuyTicket() {
  modal.classList.remove("open");

  const form = document.querySelector("#add_cate");
  const input = document.querySelector("#CatName");
  const title = document.querySelector("#title-model");
  const button = document.querySelector("#Button-form");

  input.value = "";
  title.innerHTML = "Tên danh mục";
  button.innerHTML = "Thêm";
  form.action = `/Project_WebBanHang/Action-Controller/CategoryController/CreateGroup_action.php`;
  console.log(1);
}

addGroupButton[0].addEventListener("click", showBuyTicket);

modalClose.addEventListener("click", hideBuyTicket);

modal.addEventListener("click", hideBuyTicket);

modalContainer.addEventListener("click", (event) => {
  event.stopPropagation();
});
