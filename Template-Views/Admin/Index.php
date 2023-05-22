<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/layout/sidebar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/main.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/category.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/Popup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Trang chủ Admin</title>
</head>
<body>
<div class="container_flex">
<div class="side-nav">
            <div class="side-nav-inner">
                <ul class="side-nav-menu scrollable">
                    <?php
                    echo sidebar();
                    ?>
                </ul>
            </div>
        </div>
        <div class="content_Admin">
            <h1>Chào mừng Admin</h1>
        </div>
</div>
<script>
    //    $(document).ready(function () {
    //         $(".nav-link").click(function () {
    //             var page = $(this).data('page');
    //             $(".content_Admin").load(page);
    //         });
    //     });
    // $(document).ready(function() {
    //   $('.nav-link').click(function(e) {
    //     e.preventDefault();
    //     var page = $(this).data('page');
    //     $.ajax({
    //       url: page,
    //       success: function(data) {
    //         $('.content_Admin').html(data);
    //         history.pushState(null, '', page);
    //       },
    //       error: function() {
    //         alert('Đã xảy ra lỗi khi tải trang.');
    //       }
    //     });
    //   });
    // });
  </script>
</body>
</html>

