<?php
include 'pass.php';
error_reporting(0);
session_start();
$randomid = "";
$r_pass = $_POST['password'];
$r_user = $_POST['user'];
$error = false;
$admin=false;


if(isset($_GET['continue'])) {


    if ($r_user != $adminname){

        //Überprüft das Passwort
        if ($r_pass != $userpass){
            $error = true;
            die('<meta http-equiv="refresh" content="0; url=?login_error=1" />');

        }
        //Überprüft den Nutzernamen
        if ($r_user != $username){
            $error = true;
            die('<meta http-equiv="refresh" content="0; url=?login_error=2" />');
        }

    }


if ($r_user == $adminname){
    //Überprüft den Adminnamen
    if ($r_user != $adminname){
        $admin = false;
        $error = true;
        die('<meta http-equiv="refresh" content="0; url=?login_error=2" />');
    }
    //Abfrage ob das Admin Passwort richtig ist
    if ($r_pass != $adminpass){
        $Admin = false;
        $error = true;
        die('<meta http-equiv="refresh" content="0; url=?login_error=1" />');

    }
    elseif ($r_user == $adminname and $r_pass == $adminpass){
        $admin= true;
    }
}


    //Wenn keine Fehler erstellt Session und leitet weiter.
    if ($error == false and $admin == false){


        //Erstellt random base64 number für die session id
        $length = 16;
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $str = "";

        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[mt_rand(0, strlen($chars) - 1)];
        }

        //login erfolgreich
        $_SESSION['sessionid'] = $str;
        $_SESSION['isadmin'] = 'false';
        die('<meta http-equiv="refresh" content="0; url=../" />');

    }

    //Wenn keine Fehler erstellt Session und leitet weiter.
    if ($error == false and $admin == true){


        //Erstellt random base64 number für die session id
        $length = 16;
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $str = "";

        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[mt_rand(0, strlen($chars) - 1)];
        }

        //login erfolgreich
        $_SESSION['sessionid'] = $str;
        $_SESSION['isadmin'] = 'true';
        die('<meta http-equiv="refresh" content="0; url=../" />');

    }

}

?>
