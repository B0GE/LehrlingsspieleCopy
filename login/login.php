<?php
error_reporting(0);
include '../../fnc/login.php';
include '../../fnc/errors_output.php';
include '../../fnc/header.php';
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="login-container">
    <form action="?continue=1" method="post">
        <input name="user" type="text">
        <input type="password" name="password">
        <button type="submit">Einloggen</button>
    </form>
  </div>
</body>
</html>
