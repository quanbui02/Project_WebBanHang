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
                    duration: 5000
                });
            } else {
                window.location.href = "/Project_WebBanHang/Action-Controller/UserController/SearchUser_action.php";
            }
        }
    }

    const searchBox = document.getElementById("search");
    const btnSearch = document.querySelector('.search-button');
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

        idDelete = null
    }

    function deleteItem() {
        if (idDelete) {
            window.location.href =
                `/Project_WebBanHang/Action-Controller/UserController/DeleteUser_action.php?id=${idDelete}`
        }
    }

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