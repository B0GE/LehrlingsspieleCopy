<?php
  $page = "settings";
  include '../fnc/nav.php';
  include '../fnc/header.php';
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<div class="setting_container">

  <div class="delete_popup" data-target=".pl_stage_1">
    <button class="delete_buttons">Punkte l&ouml;schen</button>
    <div class="pl_stage_1 p_stage">
      <p>Wollen Sie wirklich alle Punkte l&ouml;schen?</p>
      <button class="popup_button" data-target=".pl_stage_2">Ja</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="pl_stage_2 p_stage">
      <p>Wirkliich?</p>
      <button class="popup_button" data-target=".pl_stage_3">Ja ich will</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="pl_stage_3 p_stage">
      <p>Sind Sie sich ganz sicher?</p>
      <button class="popup_button" data-target=".pl_stage_4">Ja verdammt</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="pl_stage_4 p_stage">
      <p>Wirklich wirklich sicher?</p>
      <button class="popup_button" data-target=".pl_stage_5">Ja Ja Ja Ja</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="pl_stage_5 p_stage" data-target='Bitte geben Sie den oben angegebenen Text genau ein!'>
      <p>Bitte geben Sie Folgenden Text in die Textbox ein: "Ja ich bin mir wirklich sicher verdammt!"</p>
      <input class="custom_white" type="text" />
      <button class="ajax_button" data-target="reset_points" data-success="Punkte">Best&auml;tigen</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
  </div>

  <div class="delete_popup" data-target=".tl_stage_1">
    <button class="delete_buttons">Teams l&ouml;schen</button>
    <div class="tl_stage_1 p_stage">
      <p>Wollen Sie wirklich alle Teams l&ouml;schen?</p>
      <button class="popup_button" data-target=".tl_stage_2">Ja</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="tl_stage_2 p_stage">
      <p>Wirkliich?</p>
      <button class="popup_button" data-target=".tl_stage_3">Ja ich will</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="tl_stage_3 p_stage">
      <p>Sind Sie sich ganz sicher?</p>
      <button class="popup_button" data-target=".tl_stage_4">Ja verdammt</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="tl_stage_4 p_stage">
      <p>Wirklich wirklich sicher?</p>
      <button class="popup_button" data-target=".tl_stage_5">Ja Ja Ja Ja</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="tl_stage_5 p_stage" data-target='Bitte geben Sie den oben angegebenen Text genau ein!'>
      <p>Bitte geben Sie Folgenden Text in die Textbox ein: "Ja ich bin mir wirklich sicher verdammt!"</p>
      <input class="custom_white" type="text" />
      <button class="ajax_button" data-target="reset_teams" data-success="Teams">Best&auml;tigen</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
  </div>

  <div class="delete_popup" data-target=".tel_stage_1">
    <button class="delete_buttons">Teilnehmer l&ouml;schen</button>
    <div class="tel_stage_1 p_stage">
      <p>Wollen Sie wirklich alle Teilnehmer l&ouml;schen?</p>
      <button class="popup_button" data-target=".tel_stage_2">Ja</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="tel_stage_2 p_stage">
      <p>Wirkliich?</p>
      <button class="popup_button" data-target=".tel_stage_3">Ja ich will</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="tel_stage_3 p_stage">
      <p>Sind Sie sich ganz sicher?</p>
      <button class="popup_button" data-target=".tel_stage_4">Ja verdammt</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="tel_stage_4 p_stage">
      <p>Wirklich wirklich sicher?</p>
      <button class="popup_button" data-target=".tel_stage_5">Ja Ja Ja Ja</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="tel_stage_5 p_stage" data-target='Bitte geben Sie den oben angegebenen Text genau ein!'>
      <p>Bitte geben Sie Folgenden Text in die Textbox ein: "Ja ich bin mir wirklich sicher verdammt!"</p>
      <input class="custom_white" type="text" />
      <button class="ajax_button" data-target="reset_teilnehmer" data-success="Teilnehmer">Best&auml;tigen</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
  </div>

  <div class="delete_popup" data-target=".dl_stage_1">
    <button class="delete_buttons">Datenbank l&ouml;schen</button>
    <div class="dl_stage_1 p_stage">
      <p>Wollen Sie wirklich alle Datenbank l&ouml;schen?</p>
      <button class="popup_button" data-target=".dl_stage_2">Ja</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="dl_stage_2 p_stage">
      <p>Wirkliich?</p>
      <button class="popup_button" data-target=".dl_stage_3">Ja ich will</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="dl_stage_3 p_stage">
      <p>Sind Sie sich ganz sicher?</p>
      <button class="popup_button" data-target=".dl_stage_4">Ja verdammt</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="dl_stage_4 p_stage">
      <p>Wirklich wirklich sicher?</p>
      <button class="popup_button" data-target=".dl_stage_5">Ja Ja Ja Ja</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
    <div class="dl_stage_5 p_stage" data-target='Bitte geben Sie den oben angegebenen Text genau ein!'>
      <p>Bitte geben Sie Folgenden Text in die Textbox ein: "Ja ich bin mir wirklich sicher verdammt!"</p>
      <input class="custom_white" type="text" />
      <button class="ajax_button" data-target="reset_everything" data-success="Datenbank">Best&auml;tigen</button>
      <button class="popup_button" data-target="">Nein</button>
    </div>
  </div>
  <div class="ci_submit backup_container">
    <button class="backup_button">Save Database</button>
    <div class="ci_error_handler">
    </div>
  </div>
</div>



<div class="dump_div_container">
  <p><span></span> erfolgreich gel&ouml;scht!</p>
  <?php include '../svg/succes.php'; ?>
  <div class="dump_div"></div>
</div>

<?php include '../fnc/scripts.php'; ?>
<script src="../js/popup.js"></script>
</body>
</html>
