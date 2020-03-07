<?php
/**
    *Written by Boge "Max Bogatec"
    *Slowly but truely getting anoyed by this bullshit
    *Note for my self -- Never offer your help again
    *ToDo -- Kill my self
 */
 global $value;
 global $teamname;
$value = $_POST['value'];
$teamname = $_POST['teamname'];


    include 'database_connect.php';
    $winnerteam = $_POST['winnerteam'];
    $looserteam = $_POST['looser_team'];
    echo $winnerteam;
    echo $looserteam;

if(empty($value) && empty($teamname)) {
  echo "Du hast niemanden ausgewählt";
}
if (!empty($value) && !empty($teamname)){
if ($teamname != "Niemand" ) {
  # code...

    if ($value == "winnerteam") {
      # code...

    $sql = "INSERT INTO  hurensohn (Punkte, Notiz, Teamname) VALUES ('10','Torschuss','$teamname')";

    if ($conn->query($sql) === TRUE) {
    echo "Aktion erfolgreich!";
    } else {
    echo "Fehler beim schreiben in der Datenbank!";
    }
}

if ($value == "looser_team") {

      $sql = "INSERT INTO  hurensohn (Punkte, Notiz, Teamname) VALUES ('-10','Stock fallen gelassen','$teamname')";

      if ($conn->query($sql) === TRUE) {
          echo "Aktion erfolgreich!";
      } else {
          echo "Fehler beim schreiben in der Datenbank!";
      }


}
}else {
  echo "Du hast niemanden ausgewählt";
}
}else {
  echo "Bitte kontaktieren Sie den Support!";
}
