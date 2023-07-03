let idDelete;

function checkInputSearch(event) {
  if (event.keyCode === 13 || event.type === "click") {
    if (searchBox.value.trim() === "") {
      console.log(1);
      event.preventDefault();
      toast({
        title: "Thất bại!",
        message: "Vui lòng điền đầy đủ thông tin trước khi tìm kiếm",
        type: "error",
        duration: 5000,
      });
    } else {
      window.location.href =
        "/Project_WebBanHang/Action-Controller/UserController/SearchUser_action.php";
    }
  }
}

const searchBox = document.getElementById("search");
const btnSearch = document.querySelector(".search-button");
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
