<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['sessionid'])) {
    die('<meta http-equiv="refresh" content="0; url=http://results.itlabs.at/login" />');
}
$adminval = $_SESSION['isadmin'];
$ssid = $_SESSION['sessionid'];

 ?>
 <script>
  var adminSuccess = "<?php echo $adminval;?>";

  if(adminSuccess === 'true') {
    console.log("Als Admin eingeloggt");
    $(".setting_container").css({"visibility": "visible", "opacity": "1"});
  }
 </script>
