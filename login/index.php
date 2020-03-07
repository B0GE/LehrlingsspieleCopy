<?php
error_reporting(1);
include '../fnc/login.php';
include '../fnc/errors_output.php';
include '../fnc/header.php';
?>

<html>
<head></head>
<body>
<div class="input-container">
  <form class="login_form" action="?continue=1" method="post">
    <input name="user" placeholder="Benutzername" type="text">
    <input type="password" placeholder="Passwort" name="password">
    <button type="submit">Einloggen</button>
  </form>
</div>
</body>
</html>
