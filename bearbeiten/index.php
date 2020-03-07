<?php
include '../fnc/logout.php';
$page = "edit";
include '../fnc/header.php';
include '../fnc/nav.php';
if ($_SESSION['isadmin'] == false){
?>

<html>
<head>

</head>
<body>
  <div class="input-container">
    <form class="login_form">
      <input type="text" name="usr_input_username" placeholder="Nutzername"/>
      <input type="password" name="usr_input_password" placeholder="Passwort"/>
      <button type="submit">Nutzerdaten ändern</button>
    </form>
    <form class="login_form">
      <input type="text" name="admn_input_username" placeholder="Admin Nutzername"/>
      <input type="password" name="admn_input_password" placeholder="Admin Passwort"/>
      <button type="submit">Admindaten ändern</button>
    </form>
  </div>



<?php include '../fnc/scripts.php'; ?>

</body>
</html>

<?php
}
?>