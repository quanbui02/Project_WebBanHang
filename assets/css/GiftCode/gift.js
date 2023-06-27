let active;
let idDelete;

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
        window.location.href =
            `/Project_WebBanHang/Action-Controller/GiftCodeController/EditGift_action.php?active=${idDelete}`
    } else {
        window.location.href =
            `/Project_WebBanHang/Action-Controller/GiftCodeController/DeleteGift_action.php?id=${idDelete}`
    }
}

const openEditModal = (id, value, quantity) => {
    console.log(id, value, quantity);
        const form = document.querySelector("#add_gift");
        const inputValue = document.querySelector("#GiftValue");
        const inputQuantity = document.querySelector("#GiftQuantity");
        const button = document.querySelector("#Button-form")

        inputValue.value = value;
        inputQuantity.value = quantity;
        button.innerHTML = "Sửa"
        form.action = `/Project_WebBanHang/Action-Controller/GiftCodeController/EditGift_action.php?id=${id}`

        showBuyTicket()
    }


// open model add gift
const addGroupButton = document.querySelectorAll('.add-product-js')
const modal = document.querySelector('.modal-addGroup')
const modalClose = document.querySelector('.js-modal-close')
const modalContainer = document.querySelector('.js-modal-container')

function showBuyTicket() {
    modal.classList.add('open')
}

function hideBuyTicket() {
    modal.classList.remove('open')


    const form = document.querySelector("#add_gift");
    const inputValue = document.querySelector("#GiftValue");
    const inputQuantity = document.querySelector("#GiftQuantity");
    const button = document.querySelector("#Button-form")

    inputValue.value = "";
    inputQuantity.value = "";
    button.innerHTML = "Thêm"
    form.action = '/Project_WebBanHang/Action-Controller/GiftCodeController/CreateGift_action.php'
}


addGroupButton[0].addEventListener('click', showBuyTicket)


modalClose.addEventListener('click', hideBuyTicket)

modal.addEventListener('click', hideBuyTicket)

modalContainer.addEventListener('click', (event) => {
    event.stopPropagation()
})


var properties = [
    'ID',
    'account',
    'name',
    'address',
];

$.each(properties, function(i, val) {

    var orderClass = '';

    $("#" + val).click(function(e) {
        e.preventDefault();
        $('.filter__link.filter__link--active').not(this).removeClass('filter__link--active');
        $(this).toggleClass('filter__link--active');
        $('.filter__link').removeClass('asc desc');

        if (orderClass == 'desc' || orderClass == '') {
            $(this).addClass('asc');
            orderClass = 'asc';
        } else {
            $(this).addClass('desc');
            orderClass = 'desc';
        }

        var parent = $(this).closest('.header__item');
        var index = $(".header__item").index(parent);
        var $table = $('.table-content');
        var rows = $table.find('.table-row').get();
        var isSelected = $(this).hasClass('filter__link--active');
        var isNumber = $(this).hasClass('filter__link--number');

        rows.sort(function(a, b) {

            var x = $(a).find('.table-data').eq(index).text();
            var y = $(b).find('.table-data').eq(index).text();

            if (isNumber == true) {

                if (isSelected) {
                    return x - y;
                } else {
                    return y - x;
                }

            } else {

                if (isSelected) {
                    if (x < y) return -1;
                    if (x > y) return 1;
                    return 0;
                } else {
                    if (x > y) return -1;
                    if (x < y) return 1;
                    return 0;
                }
            }
        });

        $.each(rows, function(index, row) {
            $table.append(row);
        });

        return false;
    });

});