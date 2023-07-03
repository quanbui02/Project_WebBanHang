<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../assets/css/Login/login.css">
  <title>Đăng nhập</title>
</head>

<?php
if (empty($_SESSION["login-err"])) {
  echo "";
} else {
  echo "<span style= 'color:red;font-szie:14px;'>" . $_SESSION["login-err"] . "</span><br>";
} ?>

<body>
  <div class="wrapper">
    <div class="container">
      <h1>Admin manager</h1>
      <form class="form" action="/Project_WebBanHang/Action-Controller/LoginController/Login_action.php" method="post">
        <input type="text" placeholder="Username" name="uname">
        <input type="password" placeholder="Password" name="psw">
        <button type="submit" id="login-button">Login</button>
        <button><a href="/Project_WebBanHang/GhepCode/Template-View/trangchu.php?search=" style='text-decoration:none;color:#53e3a6'>Guest</a></button>
      </form>
    </div>
    <ul class="bg-bubbles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
</body>

</html>

<script>

  $("#login-button").click(function (event) {
    event.preventDefault();

    $('form').fadeOut(500);
    $('.wrapper').addClass('form-success');
  });

</script>
