<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/Project_WebBanHang/assets/css/login.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>  
<h2>Đăng nhập với ADMIN</h2>
<?php
             if (empty($_SESSION["login-err"])) {
                echo "";
            } else {
                echo "<span style= 'color:red;font-szie:14px;'>" . $_SESSION["login-err"] . "</span><br>";
            } ?>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Đăng nhập</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/Project_WebBanHang/Action-Controller/LoginController/Login_action.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="/luongdbqr.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Tên tài khoản</b></label>
      <input type="text" placeholder="Nhập vào tên tài khoản..." name="uname" required>

      <label for="psw"><b>Mật khẩu</b></label>
      <input type="password" placeholder="Nhập vào mật khẩu..." name="psw" required>

      <button type="submit">Đăng nhập</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>

var modal = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
