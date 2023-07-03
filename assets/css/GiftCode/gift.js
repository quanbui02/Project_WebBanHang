let active;
let idDelete;

// open model add gift
const addGroupButton = document.querySelectorAll(".add-product-js");
const modal = document.querySelector(".modal-addGroup");
const modalClose = document.querySelector(".js-modal-close");
const modalContainer = document.querySelector(".js-modal-container");

console.log(addGroupButton);

function openModal(id, active) {
  var modal = document.getElementById("myModal");
  modal.classList.add("show");
  idDelete = id;
  state = active;
}

function closeModal() {
  var modal = document.getElementById("myModal");
  modal.classList.remove("show");
  idDelete = null;
  state = null;
}

function deleteItem() {
  if (idDelete && state == 0) {
    window.location.href = `/Project_WebBanHang/Action-Controller/GiftCodeController/EditGift_action.php?active=${idDelete}`;
  } else {
    window.location.href = `/Project_WebBanHang/Action-Controller/GiftCodeController/DeleteGift_action.php?id=${idDelete}`;
  }
}

const openEditModal = (id, value, quantity) => {
  const form = document.querySelector("#add_gift");
  const inputValue = document.querySelector("#GiftValue");
  const inputQuantity = document.querySelector("#GiftQuantity");
  const button = document.querySelector("#Button-form");

  inputValue.value = value;
  inputQuantity.value = quantity;
  button.innerHTML = "Sửa";
  form.action = `/Project_WebBanHang/Action-Controller/GiftCodeController/EditGift_action.php?id=${id}`;

  showBuyTicket();
};

function showBuyTicket() {
  modal.classList.add("open");
}

function hideBuyTicket() {
  modal.classList.remove("open");

  const form = document.querySelector("#add_gift");
  const inputValue = document.querySelector("#GiftValue");
  const inputQuantity = document.querySelector("#GiftQuantity");
  const button = document.querySelector("#Button-form");

  inputValue.value = "";
  inputQuantity.value = "";
  button.innerHTML = "Thêm";
  form.action =
    "/Project_WebBanHang/Action-Controller/GiftCodeController/CreateGift_action.php";
}

addGroupButton[0].addEventListener("click", showBuyTicket);

modalClose.addEventListener("click", hideBuyTicket);

modal.addEventListener("click", hideBuyTicket);

modalContainer.addEventListener("click", (event) => {
  event.stopPropagation();
});
