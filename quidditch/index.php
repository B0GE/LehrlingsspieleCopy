<?php
$page = "quidditch";
include '../fnc/header.php';
include '../fnc/nav.php';
include '../fnc/scripts.php';
include '../fnc/login_check.php';
include '../fnc/mysqli_connector.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Irgendwos</title>
</head>
<body>
  <div class="quidditch_container">
    <div class="all_teams flex">
      <h3>Team Punkte</h3>
      <div class="teams_heading flex">
        <div>Punkte</div>
        <div>Teamname</div>
      </div>
        <div class="flex gesamtpunkte">
          <?php
            include 'selectpoints.php';
          ?>
        </div>
    </div>
    <div class="form_container flex">
      <form class="form">
        <input type="hidden" value="post_form" name="form"/>
        <h3>Team A</h3>
        <select class="teams" name="teamname">
          <option name="Niemand" value="" >Niemand</option>
          <?php
          include 'dropdown.php';
           ?>
         </select>
         <div class="button_container">
           <button type="button" class="add_points_button" data-value="winnerteam">+ 10</button>
           <button type="button" class="add_points_button" data-value="looser_team">- 10</button>
         </div>
      </form>
      <form class="form">
        <h3>Team B</h3>
        <select class="teams" name="teamname">
            <option name="Niemand" value="">Niemand</option>
            <?php
              include 'dropdown.php';
             ?>
         </select>
         <div class="button_container">
           <button type="button" class="add_points_button" data-value="winnerteam">+ 10</button>
           <button type="button" class="add_points_button" data-value="looser_team">- 10</button>
         </div>
      </form>
      <div class="success_error"></div>
    </div>

    <div class="einträge_gesamt_container">
      <h3>Letzen 20 einträge</h3>
        <div class="heading">
            <div>Punkte</div>
            <div>Teamname</div>
            <div>Notiz</div>
        </div>
        <div class="einträge_container">
          <?php
            include 'selectnotes.php';
          ?>
        </div>
    </div>
  </div>


<script>
    $(function () {
        $('.add_points_button').click(function() {
          var value = $(this).data('value');
          var teamname = $(this).parent().prev().find('option:selected').text();
          console.log(teamname);
          $('.success_error').load('postintodb', {
            value: value,
            teamname: teamname

          }, function () {
            $('.success_error').addClass('animate');
            console.log("hi");
            setTimeout(function () {
              $('.success_error').removeClass('animate');
            }, 3000)
          })
          /*  $.ajax({
                type: 'post',
                url: 'postintodb.php',
                data: $('form').serialize(),
                success: function () {
                    alert('form was submitted' + msg);
                }
            });*/
            $('.einträge_container').load('selectnotes.php');
            $('.gesamtpunkte').load('selectpoints.php');
        });

    });
</script>
</body>
</html>
