<?php
include 'mysqli_connector.php';
include 'login_check.php';

$target = $_POST['target'];
$flushTableSuccess = false;

if ($adminval === 'true') {
    if ($target === 'reset_points') {
        mysqli_query($conn, 'TRUNCATE TABLE Punkte');
        $flushTableSuccess = true;
    }
    if ($target === 'reset_teams') {
        mysqli_query($conn, 'TRUNCATE TABLE Teams');
        $flushTableSuccess = true;
    }
    if ($target === 'reset_teilnehmer') {
        mysqli_query($conn, 'TRUNCATE TABLE Teilnehmer');
        $flushTableSuccess = true;
    }
    if ($target === 'reset_everything') {
        mysqli_query($conn, 'TRUNCATE TABLE Teams');
        mysqli_query($conn, 'TRUNCATE TABLE Teilnehmer');
        mysqli_query($conn, 'TRUNCATE TABLE Punkte');
        $flushTableSuccess = true;
    }
}
?>
<script>
  var success = "<?php echo $flushTableSuccess; ?>"

  if (success) {
    $(".dump_div_container").addClass("show");
    setTimeout(function () {
      $(".dump_div_container").removeClass("show");
    }, 5000);

  }
</script>
