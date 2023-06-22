const searchBox = document.getElementById("search");
const btnSearch = document.querySelector('.search-button');

function checkInputSearch(event) {
    if (event.keyCode === 13 || event.type === "click") {
        if (searchBox.value.trim() === "") {
            console.log(1);
            event.preventDefault();
            toast({
                title: "Thất bại!",
                message: "Vui lòng điền đầy đủ thông tin trước khi tìm kiếm",
                type: "error",
                duration: 5000
            });
        } else {
            window.location.href = "/Project_WebBanHang/Action-Controller/ProductController/SearchProduct_action.php";
        }
    }
}


btnSearch.addEventListener("click", checkInputSearch);
searchBox.addEventListener("keypress", checkInputSearch);

function checkInputSearch(event) {
    if (event.keyCode === 13 || event.type === "click") {
        if (searchBox.value.trim() === "") {
            console.log(1);
            event.preventDefault();
            toast({
                title: "Thất bại!",
                message: "Vui lòng điền đầy đủ thông tin trước khi tìm kiếm",
                type: "error",
                duration: 5000
            });
        } else {
            window.location.href = "/Project_WebBanHang/Action-Controller/ProductController/SearchProduct_action.php";
        }
    }
}

function openModal(id) {
    var modal = document.getElementById("myModal");
    modal.classList.add("show");
    idDelete = id;
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.classList.remove("show");

    idDelete = null
}

function deleteItem() {
    if (idDelete) {
        window.location.href =
            `/Project_WebBanHang/Action-Controller/ProductController/DeleteProduct_action.php?id=${idDelete}`
    }
}

// popup add product
const addGroupButton = document.querySelectorAll('.add-product-js')
const modal = document.querySelector('.modal-addGroup')
const modalClose = document.querySelector('.js-modal-close')
const modalContainer = document.querySelector('.js-modal-container')

function showModel() {
    modal.classList.add('open')
}

function hideModel() {
    modal.classList.remove('open')
}


addGroupButton[0].addEventListener('click', showModel)


modalClose.addEventListener('click', hideModel)

modal.addEventListener('click', hideModel)

modalContainer.addEventListener('click', (event) => {
    event.stopPropagation()
})

// handle show img
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src)
    }
};

var processFiles = (input) => {
    var $input = document.getElementById("input");
    // If has files in this input.
    if (input.files) {
        for (var file in input.files) {
            if (isNaN(file)) return;
            var reader = new FileReader();
            let $img = document.createElement("img");
            $img.setAttribute("class", "review");
            reader.onload = function(e) {
                console.log(e);
                $img.setAttribute("src", e.target.result);
            }
            console.log(file)
            reader.readAsDataURL(input.files[file]);
            $input.appendChild($img);
        }
    }
}

var $input = document.getElementById("images");
$input.addEventListener("change", function() {
    processFiles(this)
});