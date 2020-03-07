<?php
error_reporting(0);
if($_GET['success'] == 1){
echo "Erfolgreich hinzugefügt";
}

if($_GET['error'] == 1){
    echo "Dieser Teamname ist bereits vergeben!";
}
if($_GET['error'] == 2){
    echo "Dieser Name ist bereits registriert";
}

if($_GET['login_error'] == 1){
    echo "Das eingegebenen Passwort war Falsch!";
}
if($_GET['login_error'] == 2){
    echo "Der eingegebene Benutzername war falsch!";
}
?>