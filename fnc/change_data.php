<?php
include 'pass.php';
include 'php_console_log.php';
$username = $_POST['form_username'];
$userpass = $_POST;
$adminname = "" ;

$adminpass = "" ;
$fp = fopen('pass.php', 'w');
if (empty($username)) {
    debug_to_console( "Username nicht gesetzt" );
}
if (empty($userpass)) {
    debug_to_console( "User-Passwort nicht gesetzt" );
}
if (empty($adminname)) {
    debug_to_console( "Adminname nicht gesetzt" );
}
if (empty($adminpass)) {
    debug_to_console( "Admin-Passwort nicht gesetzt" );
}

 ?>
