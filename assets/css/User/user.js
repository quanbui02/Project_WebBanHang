let idDelete;
const searchBox = document.getElementById("search");
const btnSearch = document.querySelector(".search-button");

function checkInputSearch(event) {
  if (event.keyCode === 13 || event.type === "click") {
    if (searchBox.value.trim() === "") {
      event.preventDefault();
      window.location.href =
      "/Project_WebBanHang/Template-Views/Admin/User/Index.php";
    } else {
      window.location.href =
        "/Project_WebBanHang/Action-Controller/UserController/SearchUser_action.php";
    }
  }
}
btnSearch.addEventListener("click", checkInputSearch);
searchBox.addEventListener("keypress", checkInputSearch);

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
    window.location.href = `/Project_WebBanHang/Action-Controller/UserController/DeleteUser_action.php?id=${idDelete}`;
  }
}
