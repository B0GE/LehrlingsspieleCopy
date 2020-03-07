<?php
  $page = "teams";
include '../fnc/header.php';
  include '../fnc/nav.php';

  include '../fnc/errors_output.php';
  include '../fnc/login_check.php';

  error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form class="register_teams" method="POST">
    <div class="input-container">
      <input name="teamname" class="ci_teamname" placeholder="Teamname" required />
      <input name="member_1" class="ci_member memberOne" placeholder="Teilnehmer 1" required />
      <input name="member_2" class="ci_member memberTwo" placeholder="Teilnehmer 2" required />
      <input name="member_3" class="ci_member memberThree" placeholder="Teilnehmer 3" required />
      <input name="member_4" class="ci_member memberFour" placeholder="Teilnehmer 4" required />
      </div>
      <div class="ci_submit">
        <button type="submit" name="submit">Absenden</button>
        <div class="ci_error_handler">
        </div>
          <?php
            include '../svg/succes.php';
            include '../svg/error.php';
          ?>
      </div>
  </form>


<?php include '../fnc/scripts.php'; ?>
<script src="../js/registerTeams.js"></script>
</body>
</html>
